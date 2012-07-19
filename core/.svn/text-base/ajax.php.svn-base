<?php
include("Files/files_handler.php");

class Ajax {
	private 	$actions;
	
	public function __construct() {}
	public function __clone() {}
	
	/**
	 * Lanza la llamada a la funci�n, si la acci�n solicitada existe
	 */
	public function fireAction ( $name ) {
		$action_id = $this->existAction ( $name );
		if ( is_numeric ( $action_id ) ) {
			$this->pre_fireAction ( $action_id );
			/*if ( !call_user_func( $this->actions[$action_id]['instance'] ) ) {
				return false;
			}*/
			$parts = explode("::", $this->actions[$action_id]['instance'] );
			$instance = new $parts[0]();
			$instance->$parts[1]();
			
			return true;
		}
		
		return false;
	}
	
	public function notify($observer, $args) {
		print_r($args);
	}
	
	/**
	 * Realiza acciones correctivas antes de realizar la llamda
	 */
	private function pre_fireAction ( $action_id ) {
		if ( is_numeric ( $action_id ) ) {
			if ( !empty ( $this->actions[$action_id]['conf'] ) ) {
				foreach ( $this->actions[$action_id]['conf'] as $key => $value ) {
					if ( $value ) {
						if ( $this->preventActions ( $key ) ) {
							// todo oki
						} else {
							// ops una de las acciones no fue superada.. adios
							echo $key;
							die;
						}
					}
				}
			}
		}
	}
	
	/**
	 * Realiza las acciones preventivas necesarias
	 */
	private function preventActions ( $action ) {
		switch ( $action ) {
			case 'sanitize':
				sanitizePost();
				return true;
			break;
			
			case 'limit_access':
				return true;
			break;
			
			case 'is_user_logged':	# check if user is logged in
					$user = get_user_logged_in();
					if ( !empty ( $user ) ) {
						return true;
					}
					
					return false;
				break;
			
			case 'is_ajax_request':
				if ( isAjaxRequest() ) {
					return true;
				}
				
				return false;
			break;
		}
	}
	
	/**
	 * A�adimos una acci�n a ejecutar
	 */
	public function addAction ( $name, $instance, $conf="" ) {
		if ( !$this->existAction ( $name ) ) {
			$this->saveAction ( $name, $instance, $conf );
			return true;
		}
		
		return false;
	}
	
	/**
	 * Comprueba si ya existe dicha acci�n
	 */
	private function existAction ( $name ) {
		for ( $i = 0; $i < count ( $this->actions ); $i++ ) {
			if ( $this->actions[$i]['name'] == $name ) {
				return $i;
			}
		}
		
		return false;
	}
	
	/**
	 * Guardamos una acci�n
	 */
	private function saveAction ( $name, $instance, $conf="" ) {
		$numActions = count ( $this->actions );
		$this->actions[$numActions]['name'] = $name;
		$this->actions[$numActions]['instance'] = $instance;
		$this->actions[$numActions]['conf'] = $conf;
		return true;
	}
}
?>