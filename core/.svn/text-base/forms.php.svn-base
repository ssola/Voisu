<?php
class Forms {
	private static $instance;
	private $available_methods = array("post", "get");
	private $available_fields = array(
		"textfield",
		"textarea",
		"date",
		"email"
	);
	private $html_buffer;

	protected function __construct() {}
	protected function __clone() {}

	public function getInstance() {
		if ( !isset(self::$instance) ) {
			$class = __CLASS__;
			self::$instance = new $class;
		}

		return self::$instance;
	}

	public function setForm($data) {
		$default = array(
			"action" => "",
			"method" => "post"
		);

		if ( $data ) {
			$data = array_merge($default, $data);
			$class = new Form();
			$class->setData($data);
			return $class->renderData();
		}
	}

	public function addElement ( $type, $data ) {

	}
}