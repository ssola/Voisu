<?php
class Venues_Model extends Model {
	private $_validation = array();
	private $_scheme = array (
						array (
							"field" => "email",
							"validation" => array (
								"email" => "",
								"empty" => ""
							),
							"msg" => "Email exists or not is valid"
						),
						array (
							"field" => "name",
							"validation" => array (
								"empty" => "",
								"min_length" => 6
							),
							"msg" => "Debe añadir un nombre al local"
						),
						array (
							"field" => "country_id",
							"validation" => array (
								"empty" => ""
							),
							"msg" => "El país es obligatorio"
						),
						array (
							"field" => "estate_id",
							"validation" => array (
								"empty" => "",
								"number" => ""
							),
							"msg" => "La provincia es obligatorio"
						),						
						array (
							"field" => "city_id",
							"validation" => array (
								"empty" => ""
							),
							"msg" => "La ciudad es obligatorio"
						),
						array (
							"field" => "address",
							"validation" => array (
								"empty" => ""
							),
							"msg" => "La dirección es obligatoria"
						),
					);
					
	public function __construct() {
		parent::__construct('venues');
		$this->_validation = new Validation();
	}
	
	public function getAll() {
		if ( $this->current_user ) {
			$results = parent::findByKey("owner_id", $this->current_user->id);
			return $results;
		}
		
		return false;
	}
	
	public function get($id) {
		if ( $this->current_user ) {
			$results = parent::findByKey("id", $id);
			if ( $results[0]->owner_id == $this->current_user->id ) {
				return $results[0];
			}
		}
		
		return false;		
	}
	
	public function save($data) {
		$this->_validation->setElements ( $this->_scheme, $data );
		if ( $this->_validation->Validate() ) {
			$data['created'] = time();
			$data['owner_id'] = $this->current_user->id;
			
			if ( $result = $this->getCoords($data['country_id'],$data['estate_id'], $data['city_id'], $data['address'] ) ) {
				$data['lat'] = $result['lat'];
				$data['lon'] = $result['lon'];
			}
			
			if ( $venue_id = parent::save($data) ) {
				return $venue_id;
			}
		} else {
			return $this->_validation->getErrors();
		}
	}
	
	public function update($data, $id) {
		if ( !empty ( $id ) ) {
			$this->_validation->setElements ( $this->_scheme, $data );
			if ( $this->_validation->Validate() ) {	
				$data['modified'] = time();
			}
			
			if ( $result = $this->getCoords($data['country_id'],$data['estate_id'], $data['city_id'], $data['address'] ) ) {
				$data['lat'] = $result['lat'];
				$data['lon'] = $result['lon'];
			}

			if ( $venue_id = parent::update($data, $id) ) {
				return $venue_id;
			}			
		}
	}
	
	public function getLogo($venue_id) {
		if ( !empty ( $venue_id ) ) {
			$sql = sprintf(
				"select * from images where foreign_table='logos_venues' and foreign_id='%d' order by id desc", intval($venue_id));
			
			$result = parent::findByQuery($sql);
			return UPLOAD_URL.$result[0]->path;
		}
	}
	
	private function getCoords($country_id, $estate_id, $city_id, $address ) {
		$country_name = getCountryName($country_id);
		$estate_name = getEstateName($estate_id);
		$city_name = getCityName($city_id);
		$complete_addres = $address.",".$city_name.",".$estate_name.",".$country_name;
		
		$maps = new Gmap();
		return $maps->getGeocode($complete_addres );
	}

	public function getGallery($venue_id, $public=false) {
		if ( !empty ( $venue_id ) ) {
			if ( $public ) {
				$venue_data = $this->getInfo($venue_id);
			} else {
				$venue_data = $this->get($venue_id);
			}
			
			if ( $venue_data ) {
				$sql = sprintf(
					"select * from images where foreign_table='photos_venue' and foreign_id=%d", intval($venue_id)
				);

				$images = parent::findByQuery($sql);
				if ( $images ) {
					return $images;					
				}
			}
		}
	}

	public function removeImageGallery($id, $action) {
		if ( !empty ( $id ) ) {
			$sql = sprintf(
				"delete from images where owner_id = %d and id = %d",
				get_user_ID(), intval($id)			
			);

			if ( parent::query($sql) ) {
				return true;
			}
		}

		return false;
	}

	public function getInfo($id) {
		if ( !empty ( $id ) ) {
			$sql = sprintf(
				"SELECT venues.*, images.path, poblacion.poblacion, poblacion.idpoblacion FROM venues 
				LEFT JOIN images ON venues.id = foreign_id AND foreign_table = 'logos_venues'
				INNER JOIN poblacion ON venues.city_id = poblacion.idpoblacion
				WHERE venues.id = %d", intval($id)
			);

			$results = parent::findByQuery($sql);
			if ( $results ) {
				return $results[0];
			}

			return false;
		}
	}
}