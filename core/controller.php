<?php
	class Controller  extends Retrieve {
		public $data;
		public $errors;
		public $instance;
		public $current_user;
		public $user_city;
		
		public function __construct() {
			global $_load, $current_user, $_config, $facebook_logout_url;
			
			//phpinfo();
			$this->instance = (object)$_load;
			$this->current_user = get_user_logged_in();
			$current_user = $this->current_user;
			$this->user_city = get_user_city();
			$this->current_language = get_user_language();
			$current_user->favourites = get_user_favourites($this->current_user->id);
			$this->current_currency = get_user_currency();
			
			if ( SUBDOMAINS_ACTIVE == true ) {
				$_config['subdomain_url'] = "http://".strtolower($this->user_city).$_config['subdomain_url'];
			} else {
				$_config['subdomain_url'] = $_config['base_url'];
			}
			
			$_config['selected_city'] = $this->user_city;
			if ( $current_user->id > 0 ) {
				$instance = new oAuth();
				$instance->setService("facebook");
				$fb = $instance->getInstance();
				$facebook_logout_url = "/oAuth/logout/facebook/";
			}

			global $current_controller;
			$current_controller = $_load['uri']->getController();

			// save data
			if ( $this->current_user ) {
				$uActivity = loadModel("Users_Activity");
				$data = array(
					"controller" => $_load['uri']->getController(),
					"action" => $_load['uri']->getAction(),
					"params" => serialize($_load['uri']->getParams()),
					"created" => time(),
					"uid" => $this->current_user->id
				);
				$uActivity->saveAction($data);
			}
		}
	}
?>