<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 19.03.2017
 * Time: 11:16
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Usersss extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library(array('ion_auth','blade','session', 'encryption'));
        $this->load->helper(array('url','language','cookie','active'));
        $this->load->model('Users_model');
        $this->encryption->initialize(
            array(
                'cipher' => 'aes-128',
                'mode' => 'cbc',
                'key' => '2EEA0A6A937F4F5436B89D31D325CC76'
            )
        );
        if($this->ion_auth->logged_in() == false) {
            redirect('/login');
        }
    }

    public function index(){
        $user = $this->Users_model->get($this->session->username);
        $data['user'] = $user;
        $this->blade->render('usersss/index', $data);
    }

    public function friendships(){
        $user = $this->Users_model->get($this->session->username);
        $data['user'] = $user;
        $this->blade->render('usersss/friendships', $data);
    }
}