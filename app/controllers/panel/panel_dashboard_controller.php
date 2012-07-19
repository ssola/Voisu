<?php
class Panel_Dashboard_Controller extends Controller {
	public function __construct() {
		parent::__construct();
	}
	
	public function _logged_index() {
		redirectTo("/panel/login");
	}
	
	public function index() {
		$title = "Centro de mandos";
		$vars = compact('title');
		Haanga::Load("dashboard/index.php", $vars);
	}
}