<?php
class Input {
	private $_get_data;
	private $_post_data;
	
	public function __construct() {
		$this->_get_data = $_GET;
		$this->_post_data = $_POST;
	}
	
	public function formSent() {
		if ( !empty ( $_POST ) ) {
			return true;
		}
		
		return false;
	}
	
	public function gGetData ( $key, $sanitize = false ) {
		global $_load;
		
		return $_load['sanitize']->cleanValue( $this->_get_data[$key] );
	}
	
	public function gSetData ( $key, $value ) {
		$this->_get_data[$key] = $value;
	}
	
	public function pGetData ( $key, $sanitize = false ) {
		global $_load;
		
		return $_load['sanitize']->cleanValue($this->_post_data[$key]);
	}
	
	public function pSetData ( $key, $value ) {
		$this->_post_data[$key] = $value;
	}			
}
?>