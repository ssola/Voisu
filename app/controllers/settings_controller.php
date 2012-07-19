<?php
class Settings_Controller extends Controller {
	private $_model_name = "Settings_Model";
	private $_model;
	
	public function __construct() {
		parent::__construct();
		$this->_model = new $this->_model_name();
	}
	
	public function set() {
		global $_load;
		
		switch ( $_load["uri"]->getURISegment(2) ) {
			case 'city':
				$city_selected = $_load['uri']->getURISegment(3);
				if(!empty($city_selected)) {
					if ($this->_model->existCity($city_selected)) {
						// we can save cookie
						$_load['securecookie']->SetCookie( 'city_selected', $city_selected );
						$_SESSION['city_selected'] = $city_selected;
						redirect("index");
						die;
					} 
				}

				redirect("index");
				break;
			case 'language':
				$language_selected = $_load['uri']->getURISegment(3);
				if ( !empty ( $language_selected ) ) {
					if ( $this->_model->existLanguage($language_selected ) ) {
						// we can save cookie
						$_load['securecookie']->SetCookie( 'language', $language_selected );
						$_SESSION['language'] = $language_selected;
						redirect("index");						
					} 
				}

				redirect("index"); die;

			case 'currency':
				$currency_selected = $_load['uri']->getURISegment(3);
				if ( !empty ( $currency_selected ) ) {
					if ( $this->_model->existCurrency($currency_selected ) ) {
						// we can save cookie
						$_load['securecookie']->SetCookie( 'currency', $currency_selected );
						$_SESSION['currency'] = $currency_selected;
						redirect("index");						
					} 
				}

				redirect("index"); die;
			break;
		}
	}
	
	public function ajax_get_cities() {
		global $_load, $_config;
		
		// getting popular boroughs
		$instance = loadModel("Boroughs");
		$cities = $instance->getCities($_config['version_name']);

		$vars = compact('url', 'fb_login', 'cities');
		Haanga::Load("settings/cities.php", $vars);
		die;
	}

	public function ajax_get_options() {
		global $_load, $_config;
		
		// getting popular boroughs
		$instance = loadModel("Boroughs");
		$cities = $instance->getCities($_config['version_name']);
		$current_city = $this->user_city;
		$languages = $this->_model->getLanguages();
		$current_language = $this->current_language;
		$currencies = $this->_model->getCurrencies();
		$current_currency = $this->current_currency;

		$vars = compact('url', 'fb_login', 'cities','current_city', 'languages', 'current_language','currencies','current_currency');
		Haanga::Load("settings/options.php", $vars);
		die;
	}
}
?>