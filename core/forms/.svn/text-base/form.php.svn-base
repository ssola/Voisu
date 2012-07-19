<?php
class Form implements Form_Element_Interface {
	private $data;
	private $validation_input = array(
		"method",
		"action",
		"id",
		"class"
	);

	public function __construct() {}

	public function setData($data) {
		if ( $this->validateInput($data) ) {
			$this->data = (object)$data;
		}
	}

	public function renderData() {
		$buffer = "<form action='{$this->data->action}' method='{$this->data->method}' id='{$this->data->id}' class='{$this->data->class}'>";

		return $buffer;
	}

	public function renderFinal() {
		return "</form>";
	}

	private function validateInput($data) {
		if ( $data ){
			foreach ( $data as $key => $value ) {
				if ( !in_array($key, $this->validation_input ) ) {
					return false;
				}
			}

			return true;
		}
	}
}
