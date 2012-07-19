<?php
class Settings_Model extends Model {
	private $_scheme = array(
					array (
						"field" => "user_id",
						"validation" => array (
							"empty" => ""
						)
					),
					array (
						"field" => "key",
						"validation" => array (
							"empty" => ""
						)
					)
				);
	
	private $_validation;
	
	public function __construct() {
		parent::__construct('settings');
		$this->_validation = new Validation();
	}
	
	public function existCity($city) {
		global $_load;
		
		$sql = sprintf("select * from cities where city = '%s'",
			$_load['sanitize']->paranoid($city) );

			$results = parent::findByQuery($sql);

		if ( $results ) {
			return true;
		}
		
		return false;
	}

	public function existLanguage($lang) {
		global $_load;

		$lang = stripslashes($lang);
		echo $lang;
		if ( !empty ( $lang ) ) {
			$sql = sprintf("select * from languages where real_name = '%s'",$lang);
			$result = parent::findByQuery($sql);
			if ( $result ) {
				return true;
			}
		}

		return false;
	}

	public function existCurrency($currency) {
		global $_load;

		$currency = stripslashes($currency);
		echo $currency;
		if ( !empty ( $currency ) ) {
			$sql = sprintf("select * from currencies where real_name = '%s'",$currency);
			$result = parent::findByQuery($sql);
			if ( $result ) {
				return true;
			}
		}

		return false;
	}

	public function getLanguages() {
		$sql = "select * from languages";
		$result = parent::findByQuery($sql);
		if ( $result ) {
			return $result;
		}

		return false;
	}

	public function getCurrencies() {
		$sql = "select * from currencies";
		$result = parent::findByQuery($sql);
		if ( $result ) {
			return $result;
		}

		return false;
	}
	
	public function set($data) {
		$scheme = $this->_scheme;
		$this->_validation->setElements($this->_scheme, $data );
		if ( $this->_validation->Validate() ) {		
			if ( parent::replace($data) ) {
				return true;
			}
		}
		
		return false;
	}
	
	public function get($user_id, $key ) {
		if ( !empty ( $user_id) && !empty ( $key ) ) {
			$sql = sprintf("SELECT * FROM settings WHERE user_id = %d AND name ='%s'",
				 	intval($user_id), mysql_real_escape_string($key));
			$result = parent::findByQuery($sql);
			if ( $result ) {
				return $result[0]->value;
			}
		}
		
		return false;
	}
}
?>