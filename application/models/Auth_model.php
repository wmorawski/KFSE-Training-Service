<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'application/class/User.php';

class Auth_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }
}