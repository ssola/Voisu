<?php
header ('P3P: CP="CAO PSA OUR"');

class FB  {
	private $fb;

	public function __construct() {
		global $_config;

		$this->fb = new Facebook(array(
		  'appId'  => $_config['facebook_config']['appId'],
		  'secret' => $_config['facebook_config']['secret'],
		  'cookie' => true
		));
	}

	public function closeSession( $url ) {
		$conf = array(
			"next" => $url
		);
		return $this->fb->getLogoutUrl($conf);
	}
	
	public function isLoggedIn($uid = 0) {
		global $_config;

		if ( $uid > 0 ) {
			$session = $uid;
		} else {
			$session = $this->fb->getUser();
		}
		
		// Session based API call.
		if ($session) {
			try {
				// check if user exists
				$login = (object)loadModel("Login");
				if ( $user = $login->oAuthLogin("facebook", $session) ) {
					$login_controller = (object)loadController("Login");
					$login_controller->saveLoguedUser($user, true);
					redirect("index");
				} else {
					$me = $this->fb->api('/me');

					if ( empty( $me['email'])) {
						$me['email'] = 'no@email.com';
					}
					
					// create user
					$user = array (
						"oauth_provider" => "facebook",
						"oauth_userid" => $session,
						"name" => $me['name'],
						"email" => $me['email'],
						"picture" => "http://graph.facebook.com/$session/picture?type=square"
					);
					
					// check for activate invitation
					$invitations = loadModel("Invitations");
					$invitations->activate($session);

					$users = (object)loadModel("Users");
					if ( $user = (object)$users->create($user, "oauth") ) {
						$login_controller = (object)loadController("Login");
						$login_controller->saveLoguedUser($user, true);
						redirect("login", "recommends");
					} else {
						redirect("index");
					}
				}
			} catch (FacebookApiException $e) {
				error_log($e);
				redirect("index");
			}
		} else {
			redirect("index");
		}
	}
	
	public function getFriends($num = 100, $shuffle = false ) {
		$user = get_user_logged_in();
		$mongo_db = new Mongo_Wrapper();
		$mongo_db->setDatabase("users");
		$mongo_db->setCollection("friends");
		
		$friends = $mongo_db->getOne(array("id" => $user->oauth_userid));
		$difference = time() - $friends->updated;
		
		if ( count($friends->friends) > 0 && $difference < 3600) {
			$friends = $friends->friends;
			$friends = array_slice($friends, 0, $num );
			return $friends;
		} else {
			$session = $this->fb->getUser();
			
			try {
				if ( $session ) {
					$action = "insert";
					if ( count($friends->friends) > 0 ) {
						$action = "update";
					}
					
					$friends = $this->fb->api('/me/friends');
					
					if ( $action == "update" ) {
						$mongo_db->update(array("id" => $session), array("friends" => $friends['data'], "updated" => time() ) );
					} else {
						$mongo_db->insert(array("id" => $session, "friends" => $friends['data'], "updated" => time() ) );	
					}
					
					$friends = array_slice($friends['data'], 0, $num );
					return $friends;
				} else {
					redirect("login", "logout");
				}
			} catch (FacebookApiException $e ){
				redirect("index");
			}
		}
	}
	
	public function postWallTo($uid, $content) {
		$session = $this->fb->getUser();
	
		if ( $session ) {
			$send = $this->fb->api("/$uid/feed", "post", $content);
			echo "Hello";
		}
	}

	public function getLoginUrl() {
		return $this->fb->getLoginUrl(array("redirect_uri"=>"http://hausu.loc/oauth/fb_oauth.php",
											"req_perms" => "email,publish_stream,status_update,read_friendlists,user_location,user_birthday"));
	}
}
?>