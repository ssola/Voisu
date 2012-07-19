<?php
class Events_Model extends Model {
	private $_validation = array();
	private $_scheme = array (
						array (
							"field" => "name",
							"validation" => array (
								"empty" => "",
								"min_length" => 6
							),
							"msg" => "Debe añadir un nombre al local"
						),
						array (
							"field" => "starts",
							"validation" => array (
								"empty" => "",
								"number" => ""
							),
							"msg" => "Es necesaria una fecha de inicio"
						),
						array (
							"field" => "ends",
							"validation" => array (
								"empty" => "",
								"number" => ""
							),
							"msg" => "Es necesaria una fecha final del evento"
						),					
						array (
							"field" => "venue_id",
							"validation" => array (
								"empty" => ""
							),
							"msg" => "Es necesario seleccionar el local"
						)
					);
					
	public function __construct() {
		parent::__construct('events');
		$this->_validation = new Validation();
	}
	
	public function getEvents($id){
		if ( !empty ( $id ) ) {
			parent::setLimit("0,10");
			$results = parent::findByKey("owner_id", $id);
			if ( $results ) {
				return $results;
			}
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
	
	public function update($data, $id) {
		if ( !empty ( $id ) ) {
			$this->_validation->setElements ( $this->_scheme, $data );
			if ( $this->_validation->Validate() ) {	
				$data['modified'] = time();
				if ( $event_id = parent::update($data, $id) ) {
					return $event_id;
				}					
			} else {
				return $this->_validation->getErrors();			
			}
		}
	}
	
	public function save($data) {
		$this->_validation->setElements ( $this->_scheme, $data );
		if ( $this->_validation->Validate() ) {
			$data['created'] = time();
			$data['owner_id'] = $this->current_user->id;
			
			if ( $event_id = parent::save($data) ) {
				return $event_id;
			}
		} else {
			return $this->_validation->getErrors();
		}
	}	

	public function saveConditions($data) {
		if ( is_array ( $data ) && !empty ( $data ) ) {
			$data['created'] = time();
			$data['modified'] = time();
			$data['owner_id'] = $this->current_user->id;
			parent::__construct("conditions");
			parent::replace($data);
			parent::__construct("events");
		}
	}

	public function getCondition($id) {
		if ( !empty ( $id ) ) {
			parent::__construct("conditions");
			$result = parent::findByKey("event_id", $id);
			parent::__construct("events");
			if ( $result ) {
				if ( $result[0]->owner_id == $this->current_user->id ) {
					return $result[0];
				}
			}

			return false;
		}
	}
	
	public function getLogo($event_id, $size="medium") {
		if ( !empty ( $event_id ) ) {
			$sql = sprintf(
				"select * from images where foreign_table='logos_events' and foreign_id='%d' order by id desc", intval($event_id));
			
			$result = parent::findByQuery($sql);
			$parts = explode ( ".", $result[0]->path );
			$real_url = $parts[0] . $size . "." . $parts[1];
			$real_url = UPLOAD_URL . $parts[0] . "-".$size . "." . $parts[1];	
			return $real_url;		
		}
	}

	public function getGallery($event_id) {
		if ( !empty ( $event_id ) ) {
			$event_data = $this->get($event_id);
			if ( $event_data ) {
				$sql = sprintf(
					"select * from images where foreign_table='photos_event' and foreign_id=%d", intval($event_id)
				);

				$images = parent::findByQuery($sql);
				if ( $images ) {
					return $images;					
				}
			}
		}
	}

	public function getEventsCalendar($starts, $ends) {
		if ( !empty ( $starts ) && !empty ( $ends ) ) {
			$sql = sprintf("select *  from events where starts >= '%d' and ends <= '%d' and owner_id = '%d'",
					intval($starts), intval($ends), $this->current_user->id);

			$results = parent::findByQuery($sql);
			if ( $results ) {
				return $results;
			}
		}

		return false;
	}

	public function getEventsSpecial($num=8) {
		if ( is_numeric ( $num ) ) {
			$sql = sprintf("
				SELECT events.*, venues.name as venue,images.path, tickets.price,poblacion.poblacion,poblacion.poblacionseo FROM events
				RIGHT JOIN images on events.id = images.foreign_id AND images.foreign_table='logos_events'
				LEFT JOIN tickets ON events.id = tickets.event_id
				INNER JOIN venues ON events.venue_id = venues.id
				INNER JOIN poblacion ON venues.city_id = poblacion.idpoblacion
				WHERE events.starts >= UNIX_TIMESTAMP()
				GROUP BY events.id
				ORDER BY starts
				LIMIT 0,%d

					", $num);

			$results = parent::findByQuery($sql);
			if ( $results ) {
				return $results;
			}
		}
	}

	public function getEventsVenue($venue, $num=4) {
		if ( is_numeric ( $num ) ) {
			$sql = sprintf("
				SELECT events.*, venues.name as venue,images.path, tickets.price,poblacion.poblacion,poblacion.poblacionseo FROM events
				RIGHT JOIN images on events.id = images.foreign_id AND images.foreign_table='logos_events'
				LEFT JOIN tickets ON events.id = tickets.event_id
				INNER JOIN venues ON events.venue_id = venues.id
				INNER JOIN poblacion ON venues.city_id = poblacion.idpoblacion
				WHERE events.starts >= UNIX_TIMESTAMP() AND venues.id = %d
				GROUP BY events.id
				ORDER BY starts
				LIMIT 0,%d

					", intval($venue), $num);

			$results = parent::findByQuery($sql);
			if ( $results ) {
				return $results;
			}
		}
	}
	
	public function getEventById($id) {
		if ( !empty ( $id ) ) {
			$sql = sprintf(
				"SELECT events.*, min(tickets.price) AS price, max(images.id) AS image_id, images.path, conditions.`content` FROM events
				JOIN tickets ON events.id = tickets.event_id
				JOIN images ON events.id = images.foreign_id AND images.foreign_table = 'logos_events'
				JOIN conditions ON events.id = conditions.event_id
				WHERE events.id = %d AND (tickets.expires = 0 OR tickets.`expires` > UNIX_TIMESTAMP());", intval($id)
			);
			
			$result = parent::findByQuery($sql);
			if ( $result ) {
				return $result[0];
			}
		}
		
		return false;
	}
}