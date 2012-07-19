<?php
class Tickets_Model extends Model {
	private $_validation = array();
	private $_scheme = array (
						array (
							"field" => "name",
							"validation" => array (
								"empty" => "",
								"min_length" => 6
							),
							"msg" => "Debe añadir un nombre para el ticket"
						),
						array (
							"field" => "price",
							"validation" => array (
								"empty" => "",
								"number" => ""
							),
							"msg" => "Debe dar un precio a este ticket, 0 es gratuito."
						),
						array (
							"field" => "number",
							"validation" => array (
								"empty" => "",
								"number" => ""
							),
							"msg" => "Debe especificar el número de entradas disponibles."
						)
					);
					
	public function __construct() {
		parent::__construct('tickets');
		$this->_validation = new Validation();
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
	
	public function getAll($event_id) {
		if (!empty ( $event_id ) ) {
			parent::setLimit(0,10);
			$results = parent::findByKey("event_id", $event_id);
			if ( $results ) {
				return $results;
			}
		}
		
		return false;
	}
	
	public function save($data) {
		$this->_validation->setElements ( $this->_scheme, $data );
		if ( $this->_validation->Validate() ) {
			$data['created'] = time();
			$data['owner_id'] = $this->current_user->id;
			if ( !empty ( $data['expires'] ) ){
				$data['expires'] = strtotime($data['expires']);
			}
			
			if ( $ticket_id = parent::save($data) ) {
				return $ticket_id;
			}
		} else {
			return $this->_validation->getErrors();
		}
	}

	public function update($data, $id) {
		$this->_validation->setElements ( $this->_scheme, $data );
		if ( $this->_validation->Validate() ) {
			$data['modified'] = time();
			if ( !empty ( $data['expires'] ) ){
				$data['expires'] = strtotime($data['expires']);
			}
			
			if ( $ticket_id = parent::update($data, $id) ) {
				return $ticket_id;
			}
		} else {
			return $this->_validation->getErrors();
		}
	}
	
	public function getTickets($event_id) {
		if ( !empty ( $event_id ) ) {
			$sql = sprintf(
				"SELECT * FROM tickets
				WHERE (expires = 0 OR expires >= UNIX_TIMESTAMP()) AND event_id = %d", intval($event_id)
			);
			
			$results = parent::findByQuery( $sql );
			if ( $results ) {
				return $results;
			}
		}
		
		return false;
	}
}