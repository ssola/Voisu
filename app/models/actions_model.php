<?php
class Actions_Model extends Model {
	private $_scheme = array(
		array(
			"field" => "action",
			"validation" => array (
				"empty" => ""
			)	
		)
	);
	
	private $_validation;
	public function __construct() {
		parent::__construct("actions");
		$this->_validation = new Validation();
	}
	
	public function saveAction($data) {
		global $_config;
		
		$default = array(
			"city" => get_user_city(),
			"country" => $_config['version_name']
		);
		
		$data = array_merge($default, $data);
		
		if ( !empty ( $data ) ) {
			$this->_validation->setElements($this->_scheme, $data);
			if ( $this->_validation->Validate() ) {
				if ( parent::save($data) ) {
					return true;
				}
			}
		}
		
		return false;
	}
}
?>