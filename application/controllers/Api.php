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
            if($username == $this->session->username){
                $this->response['user']->messages = [];
            }
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

    public function getFriends($username){
      if($this->session->username == $username){
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($this->api_model->getFriends($username), JSON_NUMERIC_CHECK));
          }else{
            $this->output
              ->set_content_type('application/json')
              ->set_output(json_encode(['status' => 401, 'reason' => 'Auth Credentials do not match.'], JSON_NUMERIC_CHECK));
          }
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
        if($data['username'] == $this->session->username || $data['friendname'] == $this->session->username){
        $messages = $this->api_model->getMessages($data);
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($messages, JSON_NUMERIC_CHECK));
          }else{
            $this->output
              ->set_content_type('application/json')
              ->set_output(json_encode(['status' => 401, 'reason' => 'Auth Credentials do not match.'], JSON_NUMERIC_CHECK));
          }
    }
    public function newmessage(){
      if($this->api_model->verifyKey($this->input->post('key'))){
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
      }
//        $this->output
//            ->set_content_type('application/json')
//            ->set_output(json_encode($this->input->post(), JSON_NUMERIC_CHECK));
    }

    public function fbLogin(){
      $fb = new Facebook\Facebook([
  'app_id' => '1520644794645847', // Replace {app-id} with your app id
  'app_secret' => 'd604b8ed3516635d5baba615eaf895ae',
  'default_graph_version' => 'v2.2',
  ]);

$helper = $fb->getJavaScriptHelper();

try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (! isset($accessToken)) {
  if ($helper->getError()) {
    header('HTTP/1.0 401 Unauthorized');
    echo "Error: " . $helper->getError() . "\n";
    echo "Error Code: " . $helper->getErrorCode() . "\n";
    echo "Error Reason: " . $helper->getErrorReason() . "\n";
    echo "Error Description: " . $helper->getErrorDescription() . "\n";
  } else {
    header('HTTP/1.0 400 Bad Request');
    echo 'Bad request';
  }
  exit;
}

// Logged in
$at = $accessToken->getValue();

// The OAuth 2.0 client handler helps us manage access tokens
$oAuth2Client = $fb->getOAuth2Client();

// Get the access token metadata from /debug_token
$tokenMetadata = $oAuth2Client->debugToken($accessToken);
// Validation (these will throw FacebookSDKException's when they fail)
$tokenMetadata->validateAppId('1520644794645847'); // Replace {app-id} with your app id
// If you know the user ID this access token belongs to, you can validate it here
//$tokenMetadata->validateUserId('123');
$tokenMetadata->validateExpiration();

if (! $accessToken->isLongLived()) {
  // Exchanges a short-lived access token for a long-lived one
  try {
    $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
  } catch (Facebook\Exceptions\FacebookSDKException $e) {
    echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
    exit;
  }
  $at = $accessToken->getValue();
}

$at = (string) $at;

try {
  // Returns a `Facebook\FacebookResponse` object
  $response = $fb->get('/me?fields=id,name,picture,first_name,last_name,email', $at);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

$user = $response->getGraphUser();
$retArr = ['id' => $user->getId(), 'first_name' => $user->getFirstName(), 'last_name' => $user->getLastName(), 'picture' => $user->getPicture()->getUrl(), 'email' => $user->getEmail()];
$passHash = implode("_",$retArr);
if($this->ion_auth->login($retArr['email'], substr(md5($passHash),0,13), TRUE, TRUE))
{
  $this->session->set_flashdata('message', $this->ion_auth->messages());
  redirect('/','refresh');
  exit;
}
else
{
  // if the login was un-successful
  // redirect them back to the login page
  $this->session->set_flashdata('message', $this->ion_auth->errors());
  redirect('login', 'refresh'); // use redirects instead of loading views for compatibility with MY_Controller libraries
  exit;
}
}

public function getFbLoginUrl(){

  $helper = $fb->getRedirectLoginHelper();

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl('https://example.com/fb-callback.php', $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';
}

}
