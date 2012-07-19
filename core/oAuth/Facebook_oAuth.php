<?php
require_once 'facebook/facebook.php';		
require_once 'facebook/base_facebook.php';

class Facebook_oAuth implements oAuth_Interface {
	private $fb;
	
	public function __construct( $config ) {
		global $_config;

		$this->fb = new Facebook(array(
		  'appId'  => $_config['facebook_config']['appId'],
		  'secret' => $_config['facebook_config']['secret']
		));
	}
	
	public function login() {
		global $_config;

		$session = $this->fb->getUser();

		if ( !$session ) {
			$conf = array(
				'next' => $_config['facebook_config']['nextUrl'],
				'scope' => $_config['facebook_config']['scope']
			);
			
			$url = $this->fb->getLoginUrl($conf);
			
			header("Location: " . $url );
		} else {
			return $session;
		}
	}
	
	public function logout( $url ) {
		global $_config;

		$conf = array(
			"next" => $_config['facebook_config']['nextUrl']
		);

		$url = $this->fb->getLogoutUrl($conf);
		if ( !empty ( $url ) ) {
			try {
				$session = $this->fb->getUser();
				if ($session === null ) {
					redirect("index");
				} else {
				    try
				    {
				      $me = $this->fb->api('/me');
				    } catch(FacebookApiException $e){}
				    header("Location: " . $url );
				}
			} catch(FacebookApiException $e){}
		}
	}
	
	public function getUser() {
		try {
			$me = $this->fb->api('/me');
			if ( empty( $me['email'])) {
				$me['email'] = 'no@email.com';
			}
			
			// create user
			$user = array (
				"oauth_provider" => "facebook",
				"name" => $me['name'],
				"email" => $me['email'],
				"picture" => "http://graph.facebook.com/$session/picture?type=square",
				"birthday" => $me['birthday'],
				"relationship" => $me['relationship_status'],
				"gender" => $me['gender']
			);
			
			if ( !empty ( $user ) ) {
				return $user;
			}
		} catch (FacebookApiException $e) {
			return false;
		}
	}
}
?>