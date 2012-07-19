<?php
class Users_Activity_Model extends Model {
	public function __construct() {
		parent::__construct("users_activity");
		$this->_validation = new Validation();
	}

	public function saveAction($data) {
		parent::save($data);
	}
}
?>