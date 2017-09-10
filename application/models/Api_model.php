<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 07.06.2017
 * Time: 17:14
 */
defined('BASEPATH') OR exit('No direct script access allowed');



class Api_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function keepAlive($username){
        $time = time();
        $data = [
            'last_online' => $time
        ];
        $this->db->where('username',$username);
        $this->db->update('users',$data);
        $this->db->close();
        return $time;
    }
    public function getLastOnline($username){
        $this->db->select('last_online');
        $this->db->where('username', $username);
        $online =  $this->db->get('users');
        $this->db->close();
        if($online->num_rows() > 0){
            return $online->result()[0];
        }else{
            return false;
        }
    }
    public function checkAvaliableSummoner($summonerName){
      $this->db->select('summoner_name');
      $this->db->where('summoner_name', $summonerName);
      $online =  $this->db->get('lol_accounts');
      $this->db->close();
      if($online->num_rows() > 0){
          return false;
      }else{
          return true;
      }
    }
    public function getUserData($username){
        $this->db->select(array('id','username','email','created_on','last_login','first_name','last_name','photo','elo','last_online'));
        $this->db->where("username", $username);
        $res = $this->db->get('users');
        if($res->num_rows() > 0){
            return $res->result()[0];
        }else{
            return false;
        }
    }
    public function getPlayerLobby($username){

        $query =  $this->db->query("SELECT * FROM lobby_teams WHERE find_in_set('$username',players) <> 0");
        return $query->result();
    }
    public function isActiveLobby($lobbyId){
        $lobby = $this->db->where('lobby_id', $lobbyId)->get('lobbies')->result()[0];
        if($lobby->status == "active" || $lobby->status == "ongoing"){
            return true;
        }else{
            return false;
        }
    }
    public function getLobbyHash($id){
        $hash = $this->db->where('lobby_id', $id)->get('lobbies')->result()[0];
        return $hash->hash;
    }
    public function __destruct()
    {
       $this->db->close();
    }
    public function verify_key(){
        $key = $_SERVER['HTTP_API_KEY'] ?? null;
        $apikey = $this->db->where('api_key',$key)->get('api_keys');
        if($apikey->num_rows() > 0){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    public function getFriends($username){
        $friends = $this->db->where("username_1 ='".$username."' OR username_2 ='".$username."'")->get('friendships')->result();
        return $friends;
    }
    public function addMessage($post){
        $data = [
            'from_username' => $post['sender'],
            'to_username' => $post['receiver'],
            'message' => $post['message'],
            'send_at' => time()
        ];
        $this->db->insert('conversations',$data);
        $str = $this->db->insert_string('conversations', $data);
        return $str;
    }
    public function getMessages($get){
        return $this->db->where("(`from_username` = \"".$get['username']."\" AND `to_username` = \"".$get['friendname']."\") OR (`from_username` = \"".$get['friendname']."\" AND `to_username` = \"".$get['username']."\")")->get('conversations')->result();
    }
}
