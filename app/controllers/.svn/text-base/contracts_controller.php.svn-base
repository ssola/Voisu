<?php
class Contracts_Controller extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		global $_load;

		$title = __("Contracts - peroya.es");

		$breadcrumb = array (
			__('Home') => "#",
			__('Contracts') => ""
		);

		$_load['breadcrumbs']->setData($breadcrumb);
		$breadcrumb = $_load['breadcrumbs']->getData();

		$vars = compact('title', 'breadcrumb');

		Haanga::Load("contracts/index.php", $vars);		
	}
}