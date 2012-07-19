<?php 
class Invitations_Model extends Model {
	private $_scheme = array(
					array (
						"field" => "id_sender",
						"validation" => array (
							"empty" => ""
						)
					),
					array (
						"field" => "id_receiver",
						"validation" => array (
							"empty" => ""
						)
					)
				);	

	private $_validation;
	
	public function __construct() {
		parent::__construct('invitations');
		$this->_validation = new Validation();
	}
	
	public function save($data) {
		$scheme = $this->_scheme;
		$this->_validation->setElements($this->_scheme, $data );
		if ( $this->_validation->Validate() ) {
			return parent::save($data);
		} else {
		}
	}
	
	public function getAll($id) {
		$elements = array("id_sender" => $id);
		$invitations = parent::findAll($elements);
		
		if ($invitations) {
			return $invitations;
		}
		
		return false;
	}
	
	public function activate($id) {
		$sql = sprintf("update invitations set actived=1, activated=%d where id_receiver = '%s'",
						time(), $id);
		if ( parent::query($sql) ) {
			return true;
		}
		
		return false;
	}
}
?>