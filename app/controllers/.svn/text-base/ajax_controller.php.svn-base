<?php
/**
 * Clase encargada de recibir las peticiones AJAX
 */
class Ajax_Controller extends Controller {
	private 	$load;
	private		$params;
	
	public function __construct() {
		global $_load;
		$this->load = $_load;
		$this->params = $this->load['uri']->getParams();
	}
	
	/**
	 * Antes de ejecutar una llamada ajax, hacemos algo...
	 */
	public function _before_execute() {
		
	}
	
	/**
	 * Ejecutamos una llamada ajax
	 */
	public function execute() {
		if ( !$this->load['ajax']->fireAction ( $this->params[0] ) ) {
			echo "FAIL";
			die;
		}
	}
}
?>