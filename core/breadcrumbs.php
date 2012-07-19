<?php
/**
 * We send a structure to create the breadcrums, like...
 * array (
 * 	"Inicio" => "/",
 *  "Conciertos" => "/"
 * )
 */
class Breadcrumbs {
	static 	$instance;
	private $data;
	
	public function __construct() {}
	public function __clone() {}
	
	/**
	 * Singleton pattern 
	 */
	public function getInstance() {
		if ( !isset ( self::$instance ) ) {
			$class = __CLASS__;
			self::$instance = new $class;
		}
		
		return self::$instance;
	}
	
	/**
	 * Set data to build the breadcrumb
	 * @param unknown_type $arr
	 */
	public function setData ( $arr ) {
		if ( is_array ( $arr ) ) {
			$this->data = $arr;
		}
		
		return false;
	}
	
	/**
	 * Return an object with breadcrumb information setted before
	 */
	public function getData() {
		$tmp_arr = array();
		if ( is_array ( $this->data ) ) {
			$i = 0;
			foreach ( $this->data as $key => $value ) {
				$tmp_arr[$i]['title'] = $key;
				$tmp_arr[$i]['url'] = $value;
				$i++;
			}
			
			return $tmp_arr;
		}
		
		return null;
	}
}
?>