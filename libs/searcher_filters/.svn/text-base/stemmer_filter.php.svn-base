<?php
class Stemmer_Filter extends Stemmer {
	private $returnData;
	
	public function __construct() {}
	
	public function setData($data) {
		if ( !is_array ( $data ) ) {
			$this->returnData = $this->stem($data); die;
		} else {
			$this->returnData = $this->stem_list($data);
		}
	}
	
	public function returnData() {
		return $this->returnData;		
	}
	
	public function process() {}
}
?>