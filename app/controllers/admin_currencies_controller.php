<?php
class Admin_Currencies_Controller extends Controller {
	private $model = null;

	function __construct() {
		parent::__construct();
		$this->model = loadModel("currencies");
	}

	function index() {
		$currencies = $this->model->getCurrencies();
		$vars = compact('currencies');
		Haanga::Load("currencies.php", $vars);
	}
}
?>