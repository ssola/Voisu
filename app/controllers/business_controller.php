<?php
class Business_Controller extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		global $_load;

		$title = __("Haz negocios con peroya - peroya.es");
		$breadcrumb = array(
			__("Home") => setLink("index"),
			__("Negocios") => ""
		);

		$products = loadModel("Products");
		$products_data = $products->getProductInfo(1);

		$_load['breadcrumbs']->setData($breadcrumb);
		$breadcrumb = $_load['breadcrumbs']->getData();

		$vars = compact("title", 'breadcrumb','products_data');
		Haanga::Load("business/index.php", $vars);
	}
}