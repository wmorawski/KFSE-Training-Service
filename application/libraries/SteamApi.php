<?php

/**
 * Steam API Library
 *
 * With this CodeIgniter library you can log in through Steam,
 * and get some information about the user and their games.
 *
 * https://developer.valvesoftware.com/wiki/Steam_Web_API
 */
require $_SERVER['DOCUMENT_ROOT'].'/application/vendor/autoload.php';
require 'LightOpenID.php';

class SteamApi
{
    private $CI;
    private $apiKey;
    private $signinBtn;
    private $openId;

    private static $buffer = array();

    function __construct() {
        # Load the config file
        $this->CI =& get_instance();
        $this->CI->load->config('steam_api');
        $apiKey = $this->CI->config->item('steam_api_key');
        $this->signinBtn = $this->CI->config->item('steam_sign_in_button');

        # Set API key if available
        if ( $apiKey != null ) {
            $this->apiKey = $apiKey;
        } else {
            echo "Set a Steam API key correctly in the config file.";
        }

		// Get your domain name
        $this->openId = new LightOpenID( $_SERVER['HTTP_HOST'] );
    }

    public function getLoginLinkCode($redirectUrl = '') {
        if(empty($redirectUrl)) {
            return "You must define an URL to the callback redirect.";
        }

        try {
            if(!$this->openId->mode) {
                $this->openId->identity = 'http://steamcommunity.com/openid';

                $loginLink = '<a href="' . $this->openId->authUrl() . '"><img src="http://cdn.steamcommunity.com/public/images/signinthroughsteam/';

                if($this->signinBtn == 'small'){
                    $loginLink .= 'sits_small.png';
                } elseif($this->signinBtn == 'no-border') {
                    $loginLink .= 'sits_large_noborder.png';

                } elseif($this->signinBtn == 'semantic'){
                  $loginLink = '<a href="'. $this->openId->authUrl() . '" class="btn btn-success btn-sm"><i class="fa fa-fw fa-steam"></i>Połącz ze STEAM</a>';
                } else {
                    $loginLink .= 'sits_large_border.png';
                }
                if($this->signinBtn != 'semantic'){
                    $loginLink .= '" alt=""></a>';
              }
                return $loginLink;
            } elseif($this->openId->mode == 'cancel') {
                return 'User has canceled authentication!';
            } else {
                // login successfull => redirect
                $this->getUserID();
                redirect($redirectUrl);
            }
        } catch(ErrorException $e) {
            echo $e->getMessage();
        }
    }

    public function getUserID() {
        if($this->openId->validate()) {
            $id = $this->openId->identity;
            $ptn = "/^http:\/\/steamcommunity\.com\/openid\/id\/(7[0-9]{15,25}+)$/";
            preg_match($ptn, $id, $matches);

            $data['steam_id'] = $matches[1];
            $this->CI->session->set_userdata('steam', $data);

            return $data['steam_id'];
        } else {
            return "User is not logged in.";
        }
    }
    function toCommunityID($id) {
    if (preg_match('/^STEAM_/', $id)) {
        $parts = explode(':', $id);
        return bcadd(bcadd(bcmul($parts[2], '2'), '76561197960265728'), $parts[1]);
    } elseif (is_numeric($id) && strlen($id) < 16) {
        return bcadd($id, '76561197960265728');
    } else {
        return $id; // We have no idea what this is, so just return it.
    }
}
/* Don't have BC math?  Here's an example for ya' with bit-shifting instead
function toCommunityID($id, $type = 1, $instance = 1) {
    if (preg_match('/^STEAM_/', $id)) {
        $parts = explode(':', str_replace('STEAM_', '', $id));
        $universe = (int)$parts[0];
        if ($universe == 0)
            $universe = 1;
        $steamID = ($universe << 56) | ($type << 52) | ($instance << 32) | ((int)$parts[2] << 1) | (int)$parts[1];
        return $steamID;
    } elseif (is_numeric($id) && strlen($id) < 16) {
        return (1 << 56) | ($type << 52) | ($instance << 32) | $id;
    } else {
        return $id; // We have no idea what this is, so just return it.
    }
} */
function toSteamID($id) {
    if (is_numeric($id) && strlen($id) >= 16) {
        $z = bcdiv(bcsub($id, '76561197960265728'), '2');
    } elseif (is_numeric($id)) {
        $z = bcdiv($id, '2'); // Actually new User ID format
    } else {
        return $id; // We have no idea what this is, so just return it.
    }
    $y = bcmod($id, '2');
    return 'STEAM_0:' . $y . ':' . floor($z);
}
// UserID formatting wrappers not included. Ex: RESULT => [U:1:RESULT]
function toUserID($id) {
    if (preg_match('/^STEAM_/', $id)) {
        $split = explode(':', $id);
        return $split[2] * 2 + $split[1];
    } elseif (preg_match('/^765/', $id) && strlen($id) > 15) {
        return bcsub($id, '76561197960265728');
    } else {
        return $id; // We have no idea what this is, so just return it.
    }
}

    public function getAppNews($appID, $count = 3, $maxlength = 300, $format = 'json') {
        //$url = 'http://api.steampowered.com/ISteamNews/GetNewsForApp/v0002/?appid=' . $appID . '&count=' . $count . '&maxlength=' . $maxlength . '&format=' . $format;
        //$urlResult = @file_get_contents($url);
        //return json_decode($urlResult);
        $client = new GuzzleHttp\Client();
        $data['query'] =[
                'appid' => $appID,
                'count' => $count,
                'maxlength' => $maxlength,
                'format' => $format
            ];

        $respone = $client->request('GET', 'http://api.steampowered.com/ISteamNews/GetNewsForApp/v0002/',$data);
        return json_decode($response->getBody());
    }

    public function getAppGlobalAchivements($appID, $format = 'json') {
        $url = 'http://api.steampowered.com/ISteamUserStats/GetGlobalAchievementPercentagesForApp/v0002/?gameid=' . $appID . '&format=' . $format;
        $urlResult = @file_get_contents($url);
        return json_decode($urlResult);
    }

    public function getPlayerSummary($userID, $format = 'json') {
        $url = 'http://api.steampowered.com/ISteamUser/GetPlayerSummaries/v0002/?key=' . $this->apiKey . '&steamids=' . $userID . '&format=' . $format;
        $urlResult = @file_get_contents($url);
        return json_decode($urlResult);
    }
    public function getPlayerBans($userID, $format = 'json') {
        $url = 'http://api.steampowered.com/ISteamUser/GetPlayerBans/v1/?key=' . $this->apiKey . '&steamids=' . $userID . '&format=' . $format;
        $urlResult = @file_get_contents($url);
        return json_decode($urlResult);
    }

    public function getFriendList($userID, $relationship = 'friend', $format = 'json') {
        $url = 'http://api.steampowered.com/ISteamUser/GetFriendList/v0001/?key=' . $this->apiKey . '&steamid=' . $userID . '&relationship=' . $relationship . '&format=' . $format;
        $urlResult = @file_get_contents($url);
        return json_decode($urlResult);
    }

    public function getPlayerAchivements($userID, $appID, $language = 'english', $format = 'json') {
        $url = 'http://api.steampowered.com/ISteamUserStats/GetPlayerAchievements/v0001/?appid=' . $appID . '&key=' . $this->apiKey . '&steamid=' . $userID . '&l=' . $language . '&format=' . $format;
        $urlResult = @file_get_contents($url);
        return json_decode($urlResult);
    }

    public function getUserStatsForGame($userID, $appID, $language = 'english', $format = 'json') {
        $url = 'http://api.steampowered.com/ISteamUserStats/GetUserStatsForGame/v0002/?appid=' . $appID . '&key=' . $this->apiKey . '&steamid=' . $userID . '&l=' . $language . '&format=' . $format;
        $urlResult = @file_get_contents($url);
        return json_decode($urlResult);
//        $client = new GuzzleHttp\Client();
//        $data['query'] =[
//                'appid' => $appID,
//                'key' => $this->apiKey,
//                'steamid' => $userID,
//                'l' => $language,
//                'format' => $format
//            ];
//
//        $respone = $client->request('GET', 'http://api.steampowered.com/ISteamUserStats/GetUserStatsForGame/v0002/', [
//          'query' => [
//                  'appid' => $appID,
//                  'key' => $this->apiKey,
//                  'steamid' => $userID,
//                  'l' => $language,
//                  'format' => $format
//              ]
//        ]);
//        return $respone;
    }

    public function getOwnedGames($userID, $include_appinfo = 1, $format = 'json') {
        // http://media.steampowered.com/steamcommunity/public/images/apps/APPID/IMG_ICON_URL.jpg
        // http://media.steampowered.com/steamcommunity/public/images/apps/APPID/IMG_LOGO_URL.jpg
        $url = 'http://api.steampowered.com/IPlayerService/GetOwnedGames/v0001/?key=' . $this->apiKey . '&steamid=' . $userID . '&include_appinfo=' . $include_appinfo . '&format=' . $format;
        $urlResult = @file_get_contents($url);
        return json_decode($urlResult);
    }

    public function getRecentlyPlayedGames($userID, $limit = 3, $format = 'json') {
        $url = 'http://api.steampowered.com/IPlayerService/GetRecentlyPlayedGames/v0001/?key=' . $this->apiKey . '&steamid=' . $userID . '&count=' . $limit . '&format=' . $format;
        $urlResult = @file_get_contents($url);
        return json_decode($urlResult);
    }

    public function isPlayingSharedGame($userID, $appIDplaying, $format = 'json') {
        $url = 'http://api.steampowered.com/IPlayerService/IsPlayingSharedGame/v0001/?key=' . $this->apiKey . '&steamid=' . $userID . '&appid_playing=' . $appIDplaying . '&format=' . $format;
        $urlResult = @file_get_contents($url);
        return json_decode($urlResult);
    }

}
