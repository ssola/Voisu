<?php
class StopWords_Filter extends Filters_Helper {
	private $returnData;
	private $data;
	private $checkDuplicates = true;
	
	public function __construct($checkDuplicates=true) {
		parent::__construct();
		$this->checkDuplicates = $checkDuplicates;
	}
	
	public function setData($data) {
		if ( !empty ( $data ) ) {
			$this->data = $data;
			$this->process();
		}	
	}
	
	public function returnData() {
		return $this->returnData;		
	}
	
	public function process() {
		// load dictionary
		$dictionary = $this->loadDictionary("stopwords");
		if ( !empty ( $dictionary ) ) {
			$tmp_query = array();
			foreach ( $this->data as $query ) {
				if ( !$this->isInDictionary($query, $dictionary ) ) {
					// check is not duplicated
					if ( $this->checkDuplicates ) {
						if ( !in_array($query, $tmp_query ) ) {
							array_push($tmp_query, $query );
						}
					} else {
						array_push($tmp_query, $query );
					}
				}
			}
			
			$this->returnData = $tmp_query;
			return true;
		}
		
		$this->returnData = $this->data;
		return false;
	}
}
?>