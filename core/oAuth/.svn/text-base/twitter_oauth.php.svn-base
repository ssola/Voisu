<?php
require_once ( "twitter/twitter_base.php");

class Twitter_oAuth extends TwitterOAuth implements oAuth_Interface {
	public function __construct() {
		$access_token = $_SESSION['access_token'];

		parent::__construct("VNAIzZtHLs8ydHn3ImvnPQ", "vvB3j5oqUIEr0GvpCAITDyy7W3SiqZh7VfYWMPifzc", $access_token['oauth_token'], $access_token['oauth_token_secret']);
	}
	
	public function login() {
		$request_token = parent::getRequestToken("http://hausu.loc/oAuth/login/twitter");

		if ( $_SESSION['oauth_token'] != $_REQUEST['oauth_token'] ) {
			/* Save temporary credentials to session. */
			$_SESSION['oauth_token'] = $token = $request_token['oauth_token'];
			$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];

			if ( !empty ( $request_token ) ) {
			    /* Build authorize URL and redirect user to Twitter. */
			    $url = parent::getAuthorizeURL($token);
			    header('Location: ' . $url);
			}
		} else {
			return $request_token;		
		}
	}

	public function confirm() {
		if ( $_SESSION['oauth_token'] != $_REQUEST['oauth_token']) {
			$_SESSION['oauth_token'] = $_REQUEST['oauth_token'];
		}

		$url = "http://hausu.loc/oAuth/login/twitter";
		header("Location: " .$url);
	}
	
	public function logout($url) {
		
	}
	
	public function getUser() {
		echo "Get user!";
		$content = parent::get('account/verify_credentials');
		print_r ( $content );	
		die;
	}
}
?>