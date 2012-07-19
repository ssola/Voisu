<?php
class Panel_Tickets_Controller extends Controller {
	public function __construct() {
		parent::__construct();
	}
	
	public function _logged_index() {
		redirectTo("/panel/login");
	}
	
	public function view() {
		global $_load;
		
		$title = __("Entradas");
		$id = $_load['uri']->getID();
		
		$tickets_model = loadModel("Tickets");
		$ticket_data = $tickets_model->get($id);
		
		$vars = compact('title','ticket_data');
		Haanga::Load("tickets/index.php", $vars);		
	}	
	
	public function _logged_add() {
		redirectTo("/panel/login");
	}
	
	public function add() {
		$title = __("Nueva Entrada");
		$event_id = $this->get("get", "event");
		
		if ( $this->formSent("post") ) {
			$fields = array(
				"name" => $this->get("post","name"),
				"event_id" => $this->get("post","event_id"),
				"description" => $this->get("post","description"),
				"price" => $this->get("post","price"),
				"expires" => $this->get("post","expires"),
				"number" => $this->get("post","number"),
				"description" => $this->get("post","description")
			);
			
			$model = loadModel("Tickets");
			if ( $result = $model->save($fields) ) {
				if ( is_numeric($result) ) {
					$url = "/panel/tickets/view/$result";
					redirectTo($url);
				}
			}
		}
		
		$vars = compact('title','countries','estates','fields','cities','cities_estatus','result','event_id');
		Haanga::Load("tickets/add.php", $vars);
	}

	public function _logged_edit() {
		redirectTo("/panel/login");
	}
	
	public function edit() {
		global $_load;

		$ticket_id = $_load['uri']->getID();
		$title = __("Edotar Entrada");

		$model = loadModel("Tickets");
		if ( $ticket_id ) {
			$ticket_data = $model->get($ticket_id);
		}

		if ( $ticket_data ) {
			if ( $this->formSent("post") ) {
				$fields = array(
					"name" => $this->get("post","name"),
					"description" => $this->get("post","description"),
					"price" => $this->get("post","price"),
					"expires" => $this->get("post","expires"),
					"number" => $this->get("post","number"),
					"description" => $this->get("post","description")
				);
				
				if ( $result = $model->update($fields, $ticket_id) ) {
					if ( is_numeric($result) ) {
						$url = "/panel/tickets/view/$result";
						redirectTo($url);
					}
				}
				$success = __("Entrada editada con éxito!");
				$fields = (object)$fields;
			} else {
				$fields = $ticket_data;
			}
		}
		
		$vars = compact('title','countries','success','fields','ticket_data','cities_estatus','result','event_id');
		Haanga::Load("tickets/edit.php", $vars);
	}
}