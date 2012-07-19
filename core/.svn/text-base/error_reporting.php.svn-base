<?php
class Error_Reporting {
	private $errors = array(
		E_ERROR, E_WARNING, E_PARSE, E_CORE_ERROR
	);

	public function __construct() {
		error_reporting(E_ALL ^ E_NOTICE);
		set_error_handler(array($this, "execute"));
	}

	public function execute($errno, $errstr, $file, $line ) {
		// get the arguments
		if ( in_array($errno, $this->errors ) ) {
			$error = array(
				"severity" => $errno,
				"message" => strip_tags($errstr),
				"file_name" => $file,
				"file_line" => $line,
				"created" => time(),
				"token" => md5($errstr)
			);
			
			$error_model = new Error_Reporting_Model();
			$error_model->add($error);
		}
	}
}

class Error_Reporting_Model extends Model {
	private $error_id;

	public function __construct() {
		parent::__construct("error_reporting");
	}

	public function add($error) {
		if ( is_array ( $error ) ) {
			if ( !( $error_id = $this->exists($error) ) ) {
				parent::save($error);
			} else {
				$update = array(
					"num_times" => $error_id[1] + 1,
					"last_time" => time()
				);

				parent::update($update, $error_id[0]);
			}
		}	
	}

	private function exists($error) {
		if ( is_array ( $error ) ) {
			$results = parent::findByKey("token", $error['token']);
			if ( $results ) {
				return array($results[0]->id, $results[0]->num_times);
			} 
		}

		return false;
	}

	public function update($error) {
		
	}
}
?>