<?php
class Currencies_Controller extends Controller {
	private $model = null;

	function __construct() {
		parent::__construct();
		$this->model = loadModel("Currencies");
	}

	function _before_index() {
		print("Hello Before");
	}

	function index() {
		$title = "Hello Currencies View";
		$currencies = $this->model->getCurrencies();

		// compactar las variables que queramos enviar
		$vars = compact('title', 'currencies');
		Haanga::Load("currencies.php", $vars);
	}

	function _after_index() {
		print("HEllo After");
	}

	function view() {
		global $_load; // load contiene todos lso componentes cargados

		$currencyId = $_load['uri']->getID();
		$currency = $this->model->getCurrency($currencyId);
		
		$vars = compact('currency');
		Haanga::Load("viewCurrency.php", $vars );
	}
}
?>