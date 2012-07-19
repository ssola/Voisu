<?php
class Panel_Venues_Controller extends Controller {
	public function __construct() {
		parent::__construct();
	}
	
	public function _logged_index() {
		redirectTo("/panel/login");
	}
	
	public function index() {
		$title = __("Todos sus locales");
		
		$venues_model = loadModel("Venues");
		$user_venues = $venues_model->getAll();
		
		$vars = compact('title','user_venues');
		Haanga::Load("venues/index.php", $vars);		
	}

	public function _logged_delete() {
		redirectTo("/panel/login");
	}
	
	public function delete() {
		global $_load; 
		$title = __("Eliminar local");
		$venue_id = $_load['uri']->getID();
		
		$venues_model = loadModel("Venues");
		$venue_data = $venues_model->get($venue_id);
		
		$vars = compact('title','venue_data');
		Haanga::Load("venues/delete.php", $vars);		
	}
	
	public function _logged_view() {
		redirectTo("/panel/login");
	}
	
	public function view() {
		global $_load;
		
		$venue_id = $_load['uri']->getID();
		$venues_model = loadModel("Venues");
		$venue_data = $venues_model->get($venue_id);
		$venue_logo = $venues_model->getLogo($venue_id);

		if ( $venue_data ) {
			$gallery = $venues_model->getGallery($venue_id);
		}

		$title = "$venue_data->name - Klubme.com";
		$url_map = new Gmap();
		$url_map = $url_map->getStaticImage($venue_data->lat, $venue_data->lon, 320, 200);
		
		$vars = compact('title','venue_data','url_map','venue_logo','gallery');
		Haanga::Load("venues/view.php", $vars);		
	}
	
	public function _logged_edit() {
		redirectTo("/panel/login");
	}
	
	public function edit() {
		global $_load;
		
		$venues_model = loadModel("Venues");
		$venue_id = $_load['uri']->getID();
		$venue_data = $venues_model->get($venue_id);
		$title = "Editando";
		
		if ( $venue_data ) {
			if ( $this->formSent("post") ) {
				$fields = array(
					"name" => $this->get("post","name"),
					"country_id" => $this->get("post","country"),
					"estate_id" => $this->get("post","estates"),
					"city_id" => $this->get("post","city"),
					"address" => $this->get("post","address"),
					"web" => $this->get("post","web"),
					"email" => $this->get("post","email"),
					"telephone" => $this->get("post","telephone"),
					"description" => $this->get("post","description"),
				);
				
				$countries = getCountriesList("country","country",$fields['country_id']);
				$estates = getEstatesList("estates", "estates", "ESP",$fields['estate_id']);
				if ( !empty ( $estates ) ) {
					$cities = getCitiesList("city", "city", $fields['estate_id'], $fields['city_id']);
					$cities_status = "";
				}
				
				$success = false;
				$model = loadModel("Venues");
				if ( $result = $model->update($fields, $venue_id) ) {
					//ok
					$fields = (object)$fields;
					$success = __("Ha sido editado correctamente!");
				}
			} else {
				$fields = $venue_data;
				$countries = getCountriesList("country","country",$venue_data->country_id);
				$estates = getEstatesList("estates", "estates", $venue_data->country_id, $venue_data->estate_id);
				$cities = getCitiesList("city", "city", $venue_data->estate_id, $venue_data->city_id);
			}			
		}
		
		$vars = compact('title','venue_data','url_map','venue_logo','fields','venue_data','countries','estates','cities','success');
		Haanga::Load("venues/edit.php", $vars);				
	}	
	
	public function _logged_add() {
		redirectTo("/panel/login");
	}
	
	public function add() {
		$title = __("Nuevo local");
		
		$cities_status = "style=\"display:none\"";
		if ( $this->formSent("post") ) {
			$fields = array(
				"name" => $this->get("post","name"),
				"country_id" => $this->get("post","country"),
				"estate_id" => $this->get("post","estates"),
				"city_id" => $this->get("post","city"),
				"address" => $this->get("post","address"),
				"web" => $this->get("post","web"),
				"email" => $this->get("post","email"),
				"telephone" => $this->get("post","telephone"),
				"description" => $this->get("post","description"),
			);
			
			$countries = getCountriesList("country","country",$fields['country_id']);
			$estates = getEstatesList("estates", "estates", "ESP",$fields['estate_id']);
			if ( !empty ( $estates ) ) {
				$cities = getCitiesList("city", "city", $fields['estate_id'], $fields['city_id']);
				$cities_status = "";
			}
			
			$model = loadModel("Venues");
			if ( $result = $model->save($fields) ) {
				if ( is_numeric($result) ) {
					$url = "/panel/venues/view/$result";
					redirectTo($url);
				}
			}
		} else {
			$countries = getCountriesList("country","country","ESP");
			$estates = getEstatesList("estates", "estates", "ESP");
		}
		
		$vars = compact('title','countries','estates','fields','cities','cities_estatus','result');
		Haanga::Load("venues/add.php", $vars);
	}
	
	public function _logged_uploadlogo() {
		redirecTo('/panel/login');
	}
	
	public function uploadlogo() {
		$venue_id = $this->get("post", "venue_id");
		$venues_model = loadModel("Venues");
		$venue_data = $venues_model->get($venue_id);
		if ( $venue_data ) {
			// upload
			$file_handler = loadClass("files");
			$file_handler['files']->setService("file");
			$config = array("path" => UPLOAD_PATH."/"."images"."/".get_user_ID(),
							"url" => "images/".get_user_ID()."/");
			
			if ( $file_handler['files']->connect($config) ) {
				$file_handler['files']->attach(new Images());
				$logo = (object)$_FILES['logo'];	
				
				if ( !empty ( $logo ) ) {
					// check for user bucket
					if ( $file_handler['files']->addBucket($config['path']) ) {
						$validation = array(
							'maxSize' => 512,
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
									"foreign_id" => $venue_id,
									"foreign_table" => "logos_venues"
								)
							);
							
							$file_handler['files']->notify($image, "save_image");							
							$file_handler['files']->notify($image, "upload_image");
						}
					}
				}				
			}

			redirectTo('/panel/venues/view/'.$venue_id);die;
		} else {
			redirectTo('/panel/venues');die;
		}
		
		redirectTo('/panel/venues');die;
	}
	
	public function ajax_get_cities() {
		$estate_id = $this->get("post","estate");
		echo getCitiesList("city","city",$estate_id);
		die;
	}

	public function _logged_photo() {
		redirectTo("/panel/login");
	}
	
	public function photos() {
		global $_load;
		
		$venue_id = $_load['uri']->getID();
		$venues_model = loadModel("Venues");
		$venue_data = $venues_model->get($venue_id);
		$success = "";
		if ( $venue_data && $this->formSent("post") ) {
			// load new image
			$file_handler = loadClass("files");
			$file_handler['files']->setService("file");
			$config = array("path" => UPLOAD_PATH."/"."images/venues/".$venue_id,
							"url" => "images/venues/".$venue_id."/");

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
									"foreign_id" => $venue_id,
									"foreign_table" => "photos_venue"
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

		$gallery = $venues_model->getGallery($venue_id);

		$title = __("Fotos de su local");
		
		$vars = compact('title','venue_data','url_map','venue_logo','success','error','gallery');
		Haanga::Load("venues/photos.php", $vars);		
	}

	public function ajax_drop_gallery_image() {
		$action_id = $this->get("post","actionid");
		$action = $this->get("post","action");

		if ( $action_id ) {
			$venues_model = loadModel("Venues");
			if ( $venues_model->removeImageGallery($action_id, $action) ) {
				echo "OK"; die;
			}
		}

		echo "FAIL";
		die;
	}
}