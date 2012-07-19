<?php
class Panel_Events_Controller extends Controller {
	public function __construct() {
		parent::__construct();
	}
	
	public function _logged_index() {
		redirectTo("/panel/login");
	}
	
	public function index() {
		$title = __("Todos sus Eventos");

		$vars = compact('title','user_venues');
		Haanga::Load("events/index.php", $vars);		
	}

	public function _logged_conditions() {
		redirectTo("/panel/login");
	}
	
	public function conditions() {
		global $_load;
		
		$event_id = $_load['uri']->getID();		
		$title = __("Condiciones del evento");

		if ( !empty ( $event_id ) ) {
			$events_model = loadModel("Events");

			if ( $this->formSent("post") ) {
				$fields = array(
					"event_id" => $event_id,
					"content" => $this->get("post", "content")
				);

				$events_model->saveConditions($fields);
			}

			$event_data = $events_model->get($event_id);
			$content = $events_model->getCondition($event_id);
		}
		
		$vars = compact('title','user_venues','event_data','content');
		Haanga::Load("events/conditions.php", $vars);		
	}
	
	public function _logged_view() {
		redirectTo("/panel/login");
	}	
	
	public function view() {
		global $_load;
		
		$event_id = $_load['uri']->getID();
		$title = __("Evento");
		
		if ( !empty ( $event_id ) ) {
			$events_model = loadModel("Events");
			$event_data = $events_model->get($event_id);
			$event_logo = $events_model->getLogo($event_id);
			$tickets_model = loadModel("Tickets");
			$tickets_result = $tickets_model->getAll($event_id);
		}
		
		
		$vars = compact('title','user_venues','event_data','result','event_logo','tickets_result');
		Haanga::Load("events/view.php", $vars);				
	}
	
	public function _logged_add() {
		redirectTo("/panel/login");
	}	
	
	public function add() {
		$title = __("Añadir nuevo evento");

		$venue_id = $this->get("get", "venue");
		if ( $this->formSent("post") ) {
			$fields = array(
				"name" => $this->get("post","name"),
				"starts" => strtotime($this->get("post", "starts_hour") . ":".$this->get("post","starts_minutes"). " " .$this->get("post","starts")),
				"ends" => strtotime($this->get("post", "ends_hour") . ":".$this->get("post","ends_minutes"). " " .$this->get("post","ends")),
				"venue_id" => $this->get("post","venue_id"),
				"description" => $this->get("post","description"),
			);

			$events_model = loadModel("Events");
			if ( $result = $events_model->save($fields)) {
				if ( is_numeric($result ) ) {
					redirectTo("/panel/events/view/$result");
				} else {
					$result = (object)$result;
				} 
			}
		} else {
			$fields['starts'] = time();
			$fields['ends'] = time() + 3600;
		}
		
		$vars = compact('title','user_venues','fields','result','venue_id');
		Haanga::Load("events/add.php", $vars);		
	}
	
	public function _logged_edit() {
		redirectTo("/panel/login");
	}	
	
	public function edit() {
		global $_load;
		
		$event_id = $_load['uri']->getID();
		if ( !empty ( $event_id ) ) {
			$events_model = loadModel("Events");
			$event_data = $events_model->get($event_id);
			
			if ( $event_data ) {
				$title = __("Editar nuevo evento");
				if ( $this->formSent("post") ) {
					$fields = array(
						"name" => $this->get("post","name"),
						"starts" => strtotime($this->get("post", "starts_hour") . ":".$this->get("post","starts_minutes"). " " .$this->get("post","starts")),
						"ends" => strtotime($this->get("post", "ends_hour") . ":".$this->get("post","ends_minutes"). " " .$this->get("post","ends")),
						"venue_id" => $this->get("post","venue_id"),
						"description" => $this->get("post","description"),
					);
		
					$events_model = loadModel("Events");
					if ( $result = $events_model->update($fields, $event_data->id)) {
						$success = __("Ha sido editado correctamente!, <a href='/panel/events/$event_data->id'>Volver</a>");
					}
					
					$fields = (object)$fields;
					$fields->final = $fields->ends;
				} else {
					$fields = $event_data;
				}
				
				$event_data->final = $event_data->ends;
			}
		}
		
		$vars = compact('title','user_venues','fields','result','event_data','success');
		Haanga::Load("events/edit.php", $vars);		
	}	
	public function _logged_upload_logo() {
		redirecTo('/panel/login');
	}
	
	public function uploadlogo() {
		$event_id = $this->get("post", "event_id");
		$events_model = loadModel("events");
		$event_data = $events_model->get($event_id);
		if ( $event_data ) {
			// upload
			$file_handler = loadClass("files");
			$file_handler['files']->setService("file");
			$config = array("path" => UPLOAD_PATH."/"."images/events"."/".get_user_ID(),
							"url" => "images/events/".get_user_ID()."/");
			
			if ( $file_handler['files']->connect($config) ) {
				$file_handler['files']->attach(new Images());
				$logo = (object)$_FILES['logo'];	
				
				if ( !empty ( $logo ) ) {
					// check for user bucket
					if ( $file_handler['files']->addBucket($config['path']) ) {
						$validation = array(
							'maxSize' => 1548,
							'valid' => array("image/png", "image/jpeg", "image/jpg", "image/png")
						);
						if ( $file_handler['files']->add($logo, $validation) ) {
							$image = array( "image" => array (
									"user_id" => get_user_ID(),
									"path" => $config['url'].$logo->name,
									"real_path" => $config['path'],
									"image_path" => str_replace("\\", "/", $config['path']."/".$event_image->name),
									"created" => time(),
									"file_handler" => "file",
									"foreign_id" => $event_id,
									"foreign_table" => "logos_events"
								)
							);
							
							$file_handler['files']->notify($image, "save_image");							
							$file_handler['files']->notify($image, "upload_image");
						}
					}
				}				
			}

			redirectTo('/panel/events/view/'.$event_id);die;
		} else {
			redirectTo('/panel/events');die;
		}
		
		redirectTo('/panel/events');die;
	}
	
	public function ajax_get_events() {
		$id = $this->get("post","id");
		$events_model = loadModel("Events");
		$results = $events_model->getEvents($id);
		$vars = compact('id','results');
		Haanga::Load("ajax/get_events.php", $vars);	
		die;
	}


	public function _logged_photo() {
		redirectTo("/panel/login");
	}
	
	public function photos() {
		global $_load;
		
		$event_id = $_load['uri']->getID();
		$events_model = loadModel("Events");
		$event_data = $events_model->get($event_id);
		$success = "";
		if ( $event_data && $this->formSent("post") ) {
			// load new image
			$file_handler = loadClass("files");
			$file_handler['files']->setService("file");
			$config = array("path" => UPLOAD_PATH."/"."images/events/".$event_id,
							"url" => "images/events/".$event_id."/");

			if ( $file_handler['files']->connect($config) ) {
				$file_handler['files']->attach(new Images());
				$image = (object)$_FILES['image'];	
				if ( !empty ( $image ) ) {
					if ( $file_handler['files']->addBucket($config['path']) ) {
						$validation = array(
							'maxSize' => 1024,
							'valid' => array("image/png", "image/jpeg", "image/jpg", "image/png")
						);

						if ( $file_handler['files']->add($image, $validation) ) {
							$image_final = array( "image" => array (
									"user_id" => get_user_ID(),
									"path" => $config['url'].$image->name,
									"real_path" => $config['path'],
									"image_path" => str_replace("\\", "/", $config['path']."/".$image->name),
									"created" => time(),
									"file_handler" => "file",
									"foreign_id" => $event_id,
									"foreign_table" => "photos_event"
								)
							);
							
							$file_handler['files']->notify($image_final, "save_image");							
							$file_handler['files']->notify($image_final, "upload_image");

							$success = __('La fotografía ha sido subida correctamente');
						} else {
							$error = __('No se ha podido subir la imagen.');
						}
					}		
				}
			}
		}

		$gallery = $events_model->getGallery($event_id);

		$title = __("Fotos de su evento");
		
		$vars = compact('title','event_data','url_map','venue_logo','success','error','gallery');
		Haanga::Load("events/photos.php", $vars);		
	}

	public function ajax_drop_gallery_image() {
		$action_id = $this->get("post","actionid");
		$action = $this->get("post","action");

		if ( $action_id ) {
			$events_model = loadModel("Events");
			if ( $events_model->removeImageGallery($action_id) ) {
				echo "OK"; die;
			}
		}

		echo "FAIL";
		die;
	}

	public function ajax_get_events_calendar() {
		$starts = $this->get("get", "start");
		$ends = $this->get("get", "end");
		$venue_id = "1";
		$model = loadModel("Events");
		$results = $model->getEventsCalendar($starts, $ends);

		if ( $results ) {
			$results_json =  array();
			$i = 0;
			foreach ( $results as $result ) {
				$results_json[$i] = array(
					"title" => $result->name,
					"start" => $result->starts,
					"end" => $result->ends,
					"url" => "/panel/events/view/".$result->id
				);

				if ( $result->ends < time() ) {
					$results_json[$i]['color'] = "#E87979";
				} else {
					$results_json[$i]['color'] = "#C1F7BA";
					$results_json[$i]['textColor'] = "#000";
				}

				$i++;
			}

			echo json_encode($results_json);
		}

		die;
	}
}