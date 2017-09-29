<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 19.03.2017
 * Time: 11:16
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->library(array('ion_auth','form_validation','blade','session','encryption','image_lib','lolApi'));
        $this->load->helper(array('url','language','date'));
        $key = bin2hex($this->encryption->create_key(16));
        $config['encryption_key'] =  hex2bin($key);
        define('KB', 1024);
        define('MB', 1048576);
        define('GB', 1073741824);
        define('TB', 1099511627776);
        if(!$this->ion_auth->logged_in()){
            redirect('/', 'refresh');
        }
    }

    public function index($username = null)
    {
        $own = false;
        $site =  $this->uri->segment(2);
        $user = $this->Users_model->get($username);
        if(!$user){
            show_404();
        }else{
            if($user->getUsername() === $this->session->username){
                $own = true;
            }
            $this->blade->render('bootstrap/users/index',[
                'user' => $user,
                'site' => $site,
                'own' => $own,
            ]);
        }
    }

    public function addUser(){
        echo json_encode($this->input->post());
    }

    public function steam()
    {
        $steamid64 = $this->session->steam['steam_id'];
        $username = $this->session->username;

        if($this->Users_model->connectSteamAccount($username,$steamid64) === true)
        {
            $this->session->set_flashdata('message','Konto zostało połączone');
        }else {
            $this->session->set_flashdata('color','danger');
            $this->session->set_flashdata('message','Konto STEAM jest w użyciu');
        }
        $this->session->unset_userdata('steam');
        redirect(base_url('user/'.$this->session->username),'refresh');
    }

    public function changePhoto()
    {
        $result = [];
        if($_FILES) {
            if($_FILES['file']['error'] == 0) {
                $user_data = $this->Users_model->get($this->input->post('username'));
                $oldphoto = $user_data->getPhoto();
                $size = round($_FILES['file']['size'] / KB, 0);
                $maxsize = 400;
                $result['size'] = $size;
                $result['maxsize'] = $maxsize;
                $verifyimg = getimagesize($_FILES['file']['tmp_name']);
                if($size > $maxsize){
                    $result['status'] = "too_large";
                    echo json_encode($result);
                    exit;
                }
                if ($verifyimg['mime'] != 'image/png' && $verifyimg['mime'] != 'image/jpeg') {
                    $result['status'] = "bad_mime";
                    $result['mime'] = $verifyimg['mime'];
                    echo json_encode($result);
                    exit;
                }
                $upload_dir = "/upload/";
                $uploadFile = $upload_dir . basename($_FILES['file']['name']);
                $file = $_FILES['file']['name'];
                $oldname = explode('.', $file)[0];
                $extension = explode('.', $file)[1];
                $newname = time() . "_" . $_POST['username'] . "_av." . $extension;
                $uploadFile = $upload_dir . $newname;
                if (move_uploaded_file($_FILES['file']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].$uploadFile)) {
                    $result['status'] = "true";
                    $result['file'] = $uploadFile;
                    $result['old'] = $oldphoto;
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = '.'.$uploadFile;
                    $config['width']         = 250;
                    $config['height']       = 250;
                    $config['maintain_ratio'] = FALSE;
                    $config['x_axis'] = 180;
                    $config['y_axis'] = 180;
                    $this->image_lib->clear();
                    $this->image_lib->initialize($config);
                    if(!$this->image_lib->resize())
                    {
                        $errors[] = $this->image_lib->display_errors();
                    }
                    $this->image_lib->clear();
                    // $this->image_lib->initialize($config);
                    if(!$this->image_lib->crop())
                    {
                        $errors[] = $this->image_lib->display_errors();
                    }
                    if($this->Users_model->get($this->input->post('username'))->getPhoto() != '/public/images/no-av.png') {
                        unlink("." . $this->Users_model->get($this->input->post('username'))->getPhoto());
                    }
                    $this->Users_model->changePhoto($uploadFile,$this->input->post('username'));

                    $this->session->set_userdata('photo',$uploadFile);

                    echo json_encode($result);
                    exit;
                }
            }else if($_FILES['file']['error'] == 1){
                $result['status'] = "too_large";
                echo json_encode($result);
                exit;
            }
        }

    }
    public function connectLol(){
        $summonerName = $this->input->post('summonerName');
        $summonerId = $this->lolapi->getSummonerByName($summonerName)->id;
        $username = $this->session->username;
        $response = [];
        $result = $this->Users_model->connectLolAccount($username,$summonerName,$summonerId);
        if($result == true){
            $response['status'] = 'success';
        }else{
            $response['status'] = 'failure';
        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response, JSON_NUMERIC_CHECK));
    }
}
