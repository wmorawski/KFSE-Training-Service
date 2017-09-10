<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 07.06.2017
 * Time: 17:07
 */

defined('BASEPATH') OR exit('No direct script access allowed');

use ElephantIO\Client;

use ElephantIO\Engine\SocketIO\Version2X;

class Api extends CI_Controller
{

    private $response = [];
    private $elephant;

    public function __construct()

    {

        parent::__construct();

        $this->load->database();

        $this->load->library(array('ion_auth', 'form_validation', 'blade', 'session', 'image_lib'));

        $this->load->helper(array('url', 'language', 'active', 'string'));

        $this->load->model(array('api_model', 'users_model'));

        $this->elephant = new Client(new Version2X('http://localhost:3000'));

    }

    public function getLastOnline($username)
    {

        $this->response['status'] = 1;

        $this->response['response'] = $this->api_model->getLastOnline($username);
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($this->response, JSON_NUMERIC_CHECK));

    }

    public function keepAlive()
    {

        $this->response['status'] = 0;

        if ($this->session->username) {

            if ($time = $this->api_model->keepAlive($this->session->username)) {

                $this->response['status'] = 1;

                $this->response['username'] = $this->session->username;

                $this->response['time'] = $time;

            }


        } else {

            $this->response['status'] = -1;

        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($this->response, JSON_NUMERIC_CHECK));

    }
    public function isAdmin($username = null)
    {
        $result = [];
        $result['id'] = -1;
        $user = $this->users_model->get($username ?? $this->session->username);
        if ($user) {
            $result['id'] = $user->getId();
        } else {
            $result['status'] = 'Not Found';
        }
        $result['username'] = $username ?? $this->session->username;
        $result['admin'] = (bool)$this->ion_auth->is_admin($result['id']);
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($result, JSON_NUMERIC_CHECK));
    }

    public function user($username = "")
    {
        if (empty($username)) {
            $username = $this->session->username;
        }
        $this->response['timestamp'] = time();
        $this->response['status'] = 1;
        $this->response['error'] = 0;
        if ($this->api_model->getUserData($username)) {
            $this->response['user'] = $this->api_model->getUserData($username);
            $this->response['user']->admin = (bool)$this->ion_auth->is_admin($this->response['user']->id);
            $steam = $this->users_model->getSteamAccount($username);
            $this->response['user']->steam = $steam->steamid;
            $this->response['user']->friends = $this->api_model->getFriends($username);

        } else {
            $this->response['status'] = 0;
            $this->response['error'] = 404;
        }
        $array['timestamp'] = time();
        $array['message'] = "Dane użytkownika " . $username . " pobrane.";

//        try {
//            $this->elephant->initialize();
//            $this->elephant->emit('queue_join', $array);
//            $this->elephant->close();
//        } catch (ElephantIO\Exception\ServerConnectionFailureException $e) {
//            echo $e->getMessage();
//        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($this->response, JSON_NUMERIC_CHECK));
    }

    public function isPlayerInActiveLobby()
    {
        $response = FALSE;
        $lobbies = $this->api_model->getPlayerLobby($this->session->username);
        $hash = null;
        foreach ($lobbies as $lobby) {
            if ($this->api_model->isActiveLobby($lobby->lobby_id)) {
                $response = TRUE;
                $hash = $this->api_model->getLobbyHash($lobby->lobby_id);
            }
        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode(['response' => (bool)$response, 'time' => time(), 'hash' => $hash], JSON_NUMERIC_CHECK));

    }

    public function messages(){
        $data = $this->security->xss_clean($_GET);
        $messages = $this->api_model->getMessages($data);
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($messages, JSON_NUMERIC_CHECK));
    }
    public function newmessage(){
        $query = $this->api_model->addMessage($this->input->post());
        $user = $this->api_model->getUserData($this->input->post('receiver'));
        $array['post'] = $this->security->xss_clean($this->input->post());
        print_r($this->input->post());
        $stringToMD = $user->id;
        $stringToMD .= $user->username;
        $stringToMD .= $user->created_on;
        $stringToMD .= $user->first_name;
        $stringToMD .= $user->username;
        $stringToMD .= $user->last_name;
        $stringToMD .= $user->id;
        $stringToMD .= $user->email;
        $stringToMD .= $user->id;
        $array['room'] = md5($stringToMD);
        $array['room'] = substr($array['room'], 0, ($user->id * 8) % 32);
        try {
            $this->elephant->initialize();
            $this->elephant->emit('new_message', $array);
            $this->elephant->close();
        } catch (ElephantIO\Exception\ServerConnectionFailureException $e) {
            echo $e->getMessage();
        }
//        $this->output
//            ->set_content_type('application/json')
//            ->set_output(json_encode($this->input->post(), JSON_NUMERIC_CHECK));
    }
}

