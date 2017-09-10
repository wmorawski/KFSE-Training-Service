var express = require('express'),

    http = require('http'),
    https = require('https');
var fs = require( 'fs' );
var process = require('process');
var app = express();
// var server = https.createServer({
//     key: fs.readFileSync('/usr/home/ratten/cert.key'),
//     cert: fs.readFileSync('/usr/home/ratten/aceleague_pl.crt'),
//     ca: fs.readFileSync('/usr/home/ratten/aceleague_pl.ca-bundle'),
//     requestCert: false,
//     rejectUnauthorized: false
// },app);

var server = http.createServer(app);
const io = require('socket.io').listen(server, {'pingInterval': 2000, 'pingTimeout': 5000});
var banTimeout = [];
var timestamp = Math.floor(Date.now() / 1000);
const apikey = 'df0009-3f78bf-dc3980-26bf01-cc02c0';



function banTiemoutFN(hash){

    banTimeout[hash] = setTimeout(function () {
        var options = {
            host: 'aceleague.pl',
            port: 443,
            path: '/lobby/autoban/' + hash,
            method: 'GET',
            headers: {
                'Content-Type': 'application/json'
            }
        };
        var req = https.request(options, function (res) {
            res.setEncoding('utf8');
            res.on('data', function (chunk) {
                console.log('BODY: ' + chunk);
            });
        });
        req.on('error', function (e) {
            console.log('problem with request: ' + e.message);
        });
        req.end();
    }, 45000);
}
function getFreeServer(options, callback){
    var response = '';
    var options2 = {
        host: 'aceleague.pl',
        port: 443,
        path: '/lobby/getserver/' + options.lobby,
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'Api-Key' : apikey
        }
    };
    var req = https.request(options2, function(res) {
        res.setEncoding('utf8');
        res.on('data', function (chunk) {
            response += chunk;
        });
        res.on('end', function(){
            callback(null, JSON.parse(response));
        })
    });
    req.on('error', function(e) {
    }); req.end();
}
function getFreeServerLoop(lobby, callback){
    getFreeServer({'lobby' : lobby}, function (err,data) {
        if(data.status == 'failure') {
            console.log("SZUKAM DALEJ!");
            getFreeServerLoop(lobby,callback);
        }
        else{
            console.log("ZNALAZLEM! connect " + data.server.ip + ":" + data.server.port);
            callback(null, data);
            return;
        }
        if(err){
            console.log(err);
        }
    });
}
var rejectTimer;
const port =  process.env.PORT || 3000;
server.listen(port, function(){
    console.log('SERVER LISTENING AT PORT ' + port);
});
process.env.NODE_TLS_REJECT_UNAUTHORIZED = "0";

// Let Node know that you want to use Redis

const sm = 'Server > ';

io.on('connection', function(socket){
    console.log(sm +'a user connected');
    socket.on('disconnect', function(d){
        console.log(d);
        console.log(sm +'user disconnected');
    });
    socket.on('user_connected', (u) => {
        console.log(sm + u.username + " połączył się!");
        io.sockets.in(u.username + "_friend").emit('friend_connected', { username : u.username });
    });
    socket.on('user_disconnected', (u) => {
       console.log(sm + u.username + " rozłączył się!");
        io.sockets.in(u.username + "_friend").emit('friend_disconnected', { username : u.username });
    });
    socket.on('queue_join', function(e){
        console.log(sm +'[' + e.timestamp +'] user joined queue');
    });
    socket.on('room', function(r){
        socket.join(r);
        console.log("Server > [ROOM] created room: " + r);
    });
    socket.on('search_ready', function(s){
        console.log(sm + s);
        io.sockets.in(s.user).emit('search_start', { 'status' : 'success'});
    });
    socket.on('play_click', function(p){
        io.sockets.in(p.user).emit('queue_start', { 'status' : 'success'});
    });
    socket.on('send_message',(msg) => {
        var querystring = require("querystring");
        var qs = querystring.stringify(msg);
        var qslength = qs.length;
        var request = require('request');
        console.log(qs);
        request.post({
            headers: {'content-type' : 'application/x-www-form-urlencoded'},
            url:     'http://localhost/api/newmessage',
            body:    qs
        }, function(error, response, body){
            console.log(body);
        });
    });
    socket.on('new_message',(msg)=>{
        io.sockets.in(msg.room).emit('message_received',msg.post);

    })
    socket.on('get_items', function(g){
        // api.getSteamInventory(opts, (err, items) => {
        //     if(err){
        //         //error handling
        //         console.log(err);
        //     } else {
        //         //process your result here...
        //         //each item contains CItem
        //
        //         io.sockets.in(g.user).emit('csgo_items', {'items' : items});
        //     }
        // });

    });
    socket.on('match_confirmation', function(m){
        var qid = m.id.split("_");
        qid = qid[1];
        rejectTimer = setTimeout(function(){
            require('ssl-root-cas').inject();
            var options = {
                host: 'aceleague.pl',
                port: 443,
                path: '/game/rejectqueue/' + qid,
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json'
                }
            };
            var req = https.request(options, function(res) {
                res.setEncoding('utf8');
                res.on('data', function (chunk) {
                    console.log('BODY: ' + chunk);
                });
            });
            req.on('error', function(e) {
                console.log('problem with request: ' + e.message);
            }); req.end();}, 20000);
        console.log(sm + " Sending match confirmation for queue " + m.id);
        io.sockets.in(m.id).emit('show_confirm', {'queue_id' : m.id, timestamp : Math.floor(Date.now() / 1000)});
    });

    socket.on('accepting_player', function(a){

        console.log(sm + "Akceptowanie gracza " + a.username + " do kolejki " + a.queue_id);

    });

    socket.on('reject_queue', function(r){
        console.log(sm + " players who not accepted queue " + r.queue_id + ": " + r.players);
        io.sockets.in(r.queue_id).emit('show_rejected_players', {'players' : r.players});
    });

    socket.on('lobby_creating', function(r){
        clearTimeout(rejectTimer);
        console.log(sm + "anulowano timeout");
        console.log(sm + "Creating lobby with hash " + r.hash + ' for queue' + r.queue_id);

    });

    socket.on('accepted_player', function(a){
        console.log(sm +"accepted player in queue " + a.queue_id);
        io.sockets.in(a.queue_id).emit('update_accepted_players', a.response);
    });

    socket.on('goto_lobby', function(lobby) {

        io.sockets.in(lobby.queue_id).emit('lobby_created', lobby);
        console.log(sm + "Team1: %j", lobby.teams.team1);
        console.log(sm + "Team2: %j", lobby.teams.team2);
        banTiemoutFN(lobby.lobby);
    });

    socket.on('lobby_timeout', function(lobby){

        console.log(sm + "brak bana w lobby " + lobby.lobby);

        io.sockets.in(lobby.lobby).emit('lobby_noban', {'kappa' : 'pride'});

    });

    socket.on('lobby_banmap', function (ban){
        var qid = ban.lobby.split("_");
        qid = qid[1];
        clearTimeout(banTimeout[qid]);
        banTiemoutFN(qid);
        console.log(sm + ban.cpt + " banuje mape " + ban.map);
        console.log('Pozostale mapy: ' + ban.mapsLeft + " COUNT(" + ban.count + ")");
        io.sockets.in(ban.lobby).emit('lobby_mapbanned', {'map' : ban.map, 'turn' : ban.turn});
        console.log("\tteraz kolej " + ban.turn);

    });

    socket.on('lobby_choosemap', function(map){
        var qid = map.lobby.split("_");
        qid = qid[1];
        clearTimeout(banTimeout[qid]);
        console.log(sm + 'mapa wybrana: ' + map.map);
        io.sockets.in(map.lobby).emit('lobby_mapchosen', {'map' : map.map});
        //var server = getFreeServerLoop(map.lobby);
       var server = getFreeServerLoop(qid, function(err,data){
           io.sockets.in(map.lobby).emit('lobby_serverfound', {'ip' : data.server.ip, 'port' : data.server.port});
       });


    });
    socket.on('lobby_closed', function(l){
        console.log(sm + '  lobby ' + l.lobby + ' zostalo zamkniete przez administratora!');
        io.sockets.in("lobby_" + l.lobby).emit('lobby_closedbyadmin', {'lobby': l.lobby});
    });
    socket.on('lobby_goinglive', function(g){
       console.log('[' + g.lobby + '] WLASNIE STARTUJE');
       io.sockets.in(g.lobby).emit('lobby_goeslive', {'lobby' : g.lobby});
    });
});

var admin = io.of('/admin');

admin.on('connection', function(socket){

    console.log(sm +'An ADMIN connected');

    socket.on('user_login', function(user){

        socket.emit('user_login', user);

        socket.broadcast.emit('user_login', user);

        console.log(sm +'[ADMIN_CHANNEL] ' +user.username + " logged in");

    });

    socket.on('log', function(log){

        socket.emit('log', log);

        socket.broadcast.emit('log', log);

    });

});

// // Listen for the client connection event

// io.sockets.on('connection', function (socket) {

//   // Instantiate a Redis client that can issue Redis commands.

//

//

//   // Let everyone know it's working

//   socket.emit('startup', { message: 'I Am Working!!' });

//

//   socket.on('newPost', function (post,team,sessionId) {

//     console.log('Broadcasting a post to team: ' + team.toString());

//

//     // Broadcast the message to the sender's team

//     var broadcastData = {message: post, team: team};

//     socket.broadcast.to(team.toString()).emit('broadcastNewPost',broadcastData);

//

//     // Broadcast the message to all admins

//     broadcastData.team = 'admin';

//     socket.broadcast.to('admin').emit('broadcastNewPost',broadcastData);

//   });

//

//   // Handle a request to join a room from the client

//   // sessionId should match the Session ID assigned by CodeIgniter

//   socket.on('joinRoom', function(sessionId){

//     var parsedRes, team, isAdmin;

//

//     // Use the redis client to get all session data for the user

//     rClient.get('sessions:'+sessionId, function(err,res){

//       console.log(res);

//       parsedRes = JSON.parse(res);

//       team = parsedRes.teamId;

//       isAdmin = parsedRes.isAdmin;

//

//       // Join a room that matches the user's teamId

//       console.log('Joining room ' + team.toString());

//       socket.join(team.toString());

//

//       // Join the 'admin' room if user is an admin

//       if (isAdmin) {

//         console.log('Joining room for Admins');

//         socket.join('admin');

//       }

//     });

//

//   });

// });

