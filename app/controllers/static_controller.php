<?php
class Static_Controller extends Controller {
	function __construct() {
		parent::__construct();
	}

	function contact() {
		if ( !empty ( $_POST ) ) {
			if ( !empty ( $_POST['name'] ) && !empty ( $_POST['email'] ) ) {
				$subject = "Contact from Voisu.es";
				$message = "Name: {$_POST['name']} with email {$_POST['email']} sent you the next message: {$_POST['message']}";
				mail("introduccio@gmail.com", $subject, $message);
				$hasBeenSent = "yes";
			} else {
				$hasBeenSent = "no";
			}
		}

		$title = "Contacto - Voisu.es";
		$vars = compact("title", "hasBeenSent");
		Haanga::Load("contact.php", $vars);
	}
}
?>