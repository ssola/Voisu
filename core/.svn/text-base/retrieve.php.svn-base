<?php
class Retrieve {
	public function formSent($type="post") {
		if ( $type == "post" ) {
			if ( !empty ( $_POST ) ) {
				return true;
			}
		} elseif ( $type == "get" ) {
			if ( !empty ( $_GET ) ) {
				return true;
			}		
		}
		
		return false;
	}
	
	public function get($type, $name) {
		if ( $type == "post" ) {
			return $_POST[$name];
		} elseif ( $type == "get" ) {
			return $_GET[$name];
		}
		
		return false;
	}
	
	public function getID() {
		global $_load;
		return $_load['uri']->getID();
	}
}