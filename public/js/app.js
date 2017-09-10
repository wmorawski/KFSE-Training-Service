moment().format();
moment.locale('pl');
var confirmSound = new Audio("/public/sounds/match-ready.mp3");
var done = new Audio("/public/sounds/job-done.mp3");
var timer = new Audio("/public/sounds/timer.mp3");
var msgSound = new Audio("/public/sounds/ping.mp3");
msgSound.volume = 0.1;
confirmSound.volume = 0.04;
done.volume = timer.volume = 0.3;
confirmSound.loop = false;
function findFriendName(username,friend){
    if(username == friend.username_1){
        return friend.username_2;
    }else{
        return friend.username_1;
    }
}
var clsStopwatch = function () {
    // Private vars
    var startAt = 0;	// Time of last start / resume. (0 if not running)
    var lapTime = 0;	// Time on the clock when last stopped in milliseconds
    var now = function () {
        return (new Date()).getTime();
    };

    this.startat = function (x) {
        startAt = x;
    };
    // Public methods
    // Start or resume
    this.start = function () {
        startAt = startAt ? startAt : now();
    };


    // Stop or pause
    this.stop = function () {
        // If running, update elapsed time otherwise keep it
        lapTime = startAt ? lapTime + now() - startAt : lapTime;
        startAt = 0; // Paused
    };
    // Reset
    this.reset = function () {
        lapTime = startAt = 0;
    };
    // Duration
    this.time = function () {
        return lapTime + (startAt ? now() - startAt : 0);
    };
};
var x = new clsStopwatch();
var $time;
var clocktimer;
function pad(num, size) {
    var s = "0000" + num;
    return s.substr(s.length - size);
}
function formatTime(time) {
    var h = m = s = 0;
    var newTime = '';
    time = time % (60 * 60 * 1000);
    m = Math.floor(time / (60 * 1000));
    time = time % (60 * 1000);
    s = Math.floor(time / 1000);
    newTime = pad(m, 2) + ':' + pad(s, 2);
    return newTime;

}
function show() {
    $time = document.getElementById('time');
    update();
}
function hide() {
    $("#time").html("");
}
function update() {
    $time.innerHTML = formatTime(x.time());
}
function start() {
    clocktimer = setInterval("update()", 1);
    x.start();
}
function stop() {
    x.stop();
    clearInterval(clocktimer);
}
function reset() {
    stop();
    x.reset();
    update();
}
var url = window.location.pathname.split("/");
url.shift(); // removes blank url segment
var controller = url[0];
var parameter = url[1];
var generatedCode = localStorage.getItem("__gsc");
function setIntervalAndExecute(fn, t) {
   fn();
    return (setInterval(fn, t));
}
$(function () {
    $("#overlay").hover(function () {
       $("#avmask").fadeIn(200, 'linear').css('display', 'flex');
    }, function () {
        $("#avmask").fadeOut(200, 'linear');
    });
    function keepAlive() {
        $.get("/api/keepAlive", function (data) {
        });
    }
    var b = setIntervalAndExecute(keepAlive, 9000);
    if (controller === 'user') {
        function getOnlineTime() {
            var timestamp = Math.round(+new Date() / 1000);
            $.get("/api/getLastOnline/" + parameter, function (data) {
                var timeago = timestamp - data.response.last_online;
                if (timeago > 10) {
                    $(".profile-photo").removeClass('border-online').addClass('border-offline');
                } else {
                    $(".profile-photo").addClass('border-online').removeClass('border-offline');
                }
            }, 'JSON');
        }
        var i = setIntervalAndExecute(getOnlineTime, 10000);
    }
});
$("#avmask").click(function () {
    $("#FileUpload").trigger('click');
});
$("#FileUpload").change(function () {
    $("#progress_bar").show();
    var username = $("#username").val();
    var newav = $("#FileUpload").prop('files')[0];
    var form_data = new FormData();
    form_data.append('username', username);
    form_data.append('change_av', true);
    form_data.append('file', newav);
    var csrf = Cookies.get('csrf_cookie_name');
    form_data.append($('.csrf_token').attr('name'), csrf);
    var bar = $('.bar');
   var percent = $('.percent');
    var status = $('#status');
    $.ajax({
        url: "/users/changePhoto",
        dataType: 'json',
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function (html) {
            if (html['status'] === 'true') {
                swal('Sukces', 'Twój avatar został zmieiony', "success");
                $('.userAvatar').each(function () {
                    var currentElement = $(this);
                   currentElement.attr("src", html['file']);
                });
            }
            switch (html['status']) {
               case 'bad_mime':
                    swal({
                        title: "Zły format pliku!",
                        text: "Dozwolone formaty to <b>jpg</b> i <b>png</b>",
                        type: "error",
                        html: true
                    });
                    break;
                case 'too_large':
                    swal({
                        title: "Zły rozmiar pliku!",
                        text: "Maksymalny rozmiar pliku to <strong>" + html['maxsize'] + "KB</strong>",
                        type: "error",
                        html: true
                    })
            }
            $("#error").hide();
        },
        error: function (xhr, status, error) {
            var err = eval("(" + xhr.responseText + ")");
            console.log(err.Message);
        },
        beforeSend: function () {
           $("#error").html('<div class="preloader">                        <div class="spinner-layer pl-teal pl-size-sm"> <div class="circle-clipper left"> <div class="circle"></div> </div> <div class="circle-clipper right"> <div class="circle"></div> </div> </div> </div>')
        },
        xhr: function () {
           //upload Progress
            var xhr = $.ajaxSettings.xhr();
            if (xhr.upload) {
                xhr.upload.addEventListener('progress', function (event) {
                    var percent = 0;
                    var position = event.loaded || event.position;
                    var total = event.total;
                    if (event.lengthComputable) {
                       percent = Math.ceil(position / total * 100);
                    }
                    //update progressbar
                    $(".progress-bar").css("width", +percent + "%");
                    $(".progress-bar").attr("aria-valuenow", percent);
                    $("#sr-upload").html(percent + "% Complete");
                    $("#percent").html(percent + "%");
                    if (percent >= 100) {
                        $("#progress_bar").fadeOut();
                    }
                }, true);
            }
            return xhr;
       }
    })
});
    var user = $.get('/api/user/', function (u) {
    user = u.user;
}, 'json').done(function (d) {
    var timestamp = Math.round(+new Date() / 1000);
    var admin = user.admin;
    var socket = io.connect('//localhost:3000', {
        reconnection: true,
        reconnectionDelay: 100,
        reconnectionDelayMax : 500,
        reconnectionAttempts: 99999
    });
    // var rm = $.md5(user.id + user.username + user.created_on + user.firstname + user.username + user.lastname + user.id + user.email + user.id);
    var rm = $.md5(user.id + user.username + user.created_on + user.first_name + user.username + user.last_name + user.id + user.email + user.id).substring(0,(user.id * 8) % 32);
    //     var rm = user.username + user.created_on + "_" + user.id + "room";
    socket.emit('room', rm);

    socket.on('reconnect_attempt', () => {});
    socket.on('reconnecting', () => {
    if($("#reconnecting_alert").length == 0) {
        $('body').prepend('<div id="overlay"></div>').append('<div id="reconnecting_alert" class="myadmin-alert myadmin-alert-icon myadmin-alert-click alert-danger myadmin-alert-top alerttop animated fadeIn" style="display: block; z-index: 9999;"> <i class="icon-close"></i> Utracono połączenie, próba ponownego połączenia...</div>');
    }});
    socket.on('reconnect', () => {
        $("#reconnecting_alert").fadeOut().remove();
        $('body').append('<div id="reconnected_alert" class="myadmin-alert myadmin-alert-icon myadmin-alert-click alert-success myadmin-alert-top alerttop animated fadeIn" style="display: block; z-index: 9999;"> <i class="icon-check"></i> Połączono</div>');
        setTimeout(function(){
            $("#reconnected_alert").fadeOut();
            $("#overlay").fadeOut();
        },3000);
        setTimeout(function(){
            $("#reconnected_alert").remove();
            $("#overlay").remove();
            $("#reconnecting_alert").remove();
        },4000)
    });
    socket.on('connect', () => {
       socket.emit('user_connected', { username : user.username});
    });
    socket.on('disconnect', (reason) => {

        console.log(reason);
        socket.emit('user_disconnected', {username : user.username});
    })
    user.friends.sort(function(a, b) {
        return a.last_online - b.last_online;
    });
    $.each(user.friends, function (k, friend) {
        var friendName = findFriendName(user.username,friend);
        const url = 'http://localhost/api/user/' + friendName;
        socket.emit('room', friendName+"_friend");
        setIntervalAndExecute(() => {
            var fr = $.get(url, function(f){
                fr = f.user;
            }).done(function(){
                var lo =  Math.round(+new Date() / 1000) - fr.last_online;
                if($("#fr_" + fr.username).length == 0) {
                    $(".chatonline")
                        .append($('<li id="fr_' + fr.username + '">')
                            .append('<a href="javascript:void(0)"  id="'+fr.username+'_conv" data-action="open_conv" data-friendname="'+fr.username+'"><img src="' + fr.photo + '" alt="user-img" class="img-circle"> <span>' + fr.first_name + ' ' + fr.last_name + ' <small class="' + (lo <= 60 ? 'text-success' : 'text-muted') + '" id="fr_' + fr.username + '_status">' + (lo <= 60 ? 'Online' : 'Offline • ' + moment(fr.last_online, "X").fromNow()) + '</small></span></a>')
                        );
                }else{
                    if(lo <= 60){
                        $("#fr_" + fr.username + "_status").removeClass('text-muted').addClass('text-success').html('Online');
                    }else{
                        $("#fr_" + fr.username + "_status").removeClass('text-success').addClass('text-muted').html('Offline • ' + moment(fr.last_online, "X").fromNow());
                    }
                }
            });

        }, 60000);

    });
    socket.on('friend_connected', (fr) => {
       $("#fr_" + fr.username + "_status").removeClass('text-muted').addClass('text-success').html('Online');
    });
    socket.on('friend_disconnected', (fr) => {
        $("#fr_" + fr.username + "_status").removeClass('text-success').addClass('text-muted').html('Offline • ' + moment(Math.round(new Date() / 1000), "X").fromNow());
    });
    if (admin) {
        Noty.overrideDefaults({
            layout: 'bottomRight',
            theme: 'metroui',
            closeWith: ['click', 'button'],
            animation: {
                open: 'noty_effects_open',
                close: 'noty_effects_close'
            },
            sounds: {
                sources: ['/public/sounds/all-eyes-on-me.mp3'],
                volume: 1,
                conditions: ['docVisible', 'docHidden']

            }

        });


    }
        var openedConvCount = 0;
        $(document).delegate('a[data-action="open_conv"]', 'click', function(){
            var friendName = $(this).data('friendname');
            var url = 'http://localhost/api/user/' + friendName;
            var fr = $.get(url, (f) => {fr = f.user}).done(() => {
                if($("#chat_"+fr.username).length == 0) {
                    openedConvCount++;
                    $.each($('.chatboxWrapper'), (k,v) => {
                      var actRight =  $(v).css('right');
                      actRight = parseInt(actRight.split('px')[0]);
                      var newRight = actRight + 310;
                      var nRstring = newRight+"px";
                     $(v).css('right', nRstring);
                    });
                    var msgs = $.get('http://localhost/api/messages/?username='+user.username+'&friendname='+fr.username, (m) => {msgs = m}).done(()=>{
                        $("#rightSidebar").prepend('<div class="chatboxWrapper" id="chat_' + fr.username + '"><div class="panel panel-themecolor"><div class="panel-heading chat-header"> <span class="friendName">' + fr.first_name + ' ' + fr.last_name + '</span><div class="pull-right"> <a href="#" data-perform="panel-dismiss" data-wrapname="chat_'+fr.username+'" class="closePanel"><i class="ti-close"></i></a> </div></div> <div class="panel-wrapper collapse in" aria-expanded="true"> <div class="panel-body chat-body-kfse"> <div class="chat-box" style="height: 260px"> <ul id="msgs_'+fr.username+'" class="chat-list slimscroll messages"  tabindex="5005"> </ul> </div> </div> <div class="panel-footer chat-footer"> <div class="row"> <div class="col-xs-10"> <textarea placeholder="Wpisz wiadomość..." class="chat-box-input" id="input_'+fr.username+'" tabindex="' + openedConvCount + '"  style="overflow: hidden;"></textarea> </div> <div class="col-xs-2 text-right"> <button class="btn btn-success btn-circle btn-sm" type="button"><i class="icon-paper-plane"></i></button> </div> </div> </div> </div> </div>');
                        $("#input_"+fr.username).focus();
                        if(msgs.length > 0){
                            $.each(msgs, (k,message)=>{
                               if(user.username == message.from_username){
                                   $("#msgs_" + fr.username).append("<li class='odd'><div class='chat-body'><div class='chat-text'><p>" + message.message + "</p></div></div></li>");
                               }else{
                                   $("#msgs_" + fr.username).append("<li><div class='chat-image'><img alt='' src='"+fr.photo+"'></div><div class='chat-body'><div class='chat-text'><p>" + message.message + "</p></div></div></li>");

                               }
                            });
                            $("#msgs_" + fr.username).animate({scrollTop: $("#msgs_" + fr.username).prop("scrollHeight")}, 50);
                        }else{
                            $("#msgs_"+fr.username).append('<li class="first-message"><div class="chat-text no-messages">Brak wiadomości do wyświetlenia, napisz coś aby rozpocząć rozmowę!</div></li>')
                        }
                    });
                    $(function(){
                        var inputid = "#input_"+fr.username;
                        var msgsid = "#msgs_"+fr.username;

                        $(document).delegate(inputid,'keypress',function (e) {
                            if(e.which == 13) {
                                if($(this).val().length > 1) {
                                    socket.emit('send_message',{sender : user.username, receiver : fr.username, message : $(this).val()})
                                    $("#msgs_" + fr.username).append("<li class='odd'><div class='chat-body'><div class='chat-text'><p>" + $(this).val() + "</p></div></div></li>");
                                }
                                $(this).val("");
                                e.preventDefault();
                                $(msgsid).animate({scrollTop: $(msgsid).prop("scrollHeight")}, 50);
                            }
                        });
                    })

                }})
        });

        socket.on('message_received', (msg) => {
            msgSound.play();
        });

        $(document).delegate('.closePanel','click',function () {
            $("#"+ $(this).data('wrapname')).remove();
            openedConvCount--;
            $.each($('.chatboxWrapper'), (k,v) => {
                var actRight =  $(v).css('right');
                actRight = parseInt(actRight.split('px')[0]);
                if(actRight > 300) {
                    var newRight = actRight - 310;
                    var nRstring = newRight + "px";
                    $(v).css('right', nRstring);
                }
            });
        })
        $(document).delegate('.chat-header','click',function(){
            console.log($(this));
            var wrapper = $(this).parent().children('.panel-wrapper');
            if(wrapper.hasClass('in')){
                wrapper.removeClass('in').addClass('out');
            }else{
                wrapper.removeClass('out').addClass('in');
            }
        });


    });

