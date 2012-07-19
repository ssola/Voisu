<?php
class Venues_Controller extends Controller {
	function __construct() {
		parent::__construct();
	}

	public function view() {
		global $_load;

		$venue_id = $_load['uri']->getID();
		if ( $venue_id ) {
			$venue_model = loadModel("Venues");
			$venue_data = $venue_model->getInfo($venue_id);
			$title = "$venue_data->name - Klubme.com";
			$gallery = $venue_model->getGallery($venue_id, true);
			$events_model = loadModel("Events");
			$events = $events_model->getEventsVenue($venue_id);
			$url_map = new Gmap();
			$url_map = $url_map->getStaticImage($venue_data->lat, $venue_data->lon, 300, 250);
		}

		$vars = compact('title','venue_data','gallery', 'events','url_map');
		Haanga::Load("venues/view.php", $vars);
	}
}
