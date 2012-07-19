<?php
class Events_Controller extends Controller {
	public function __construct() {
		parent::__construct();
	}
	
	public function view() {
		$id = $this->getID();
		if ( !empty ( $id ) ) {
			$events_model = loadModel("Events");
			$tickets_model = loadModel("Tickets");
			$event = $events_model->getEventById($id);
			$title = $event->name;
			$tickets = $tickets_model->getTickets($id);
		}
		
		$vars = compact('title','event', 'tickets');
		Haanga::Load('events/view.php', $vars);
	}
}