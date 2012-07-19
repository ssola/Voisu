<?php
class Analyze_Room_Filter extends Filters_Helper implements Filters_Interface {
	private $data = null;
	private $dictionary = null;
	private $matchs = 0;
	private $justGirls = false;
	private $internet = false;
	
	public function __construct() {
		parent::__construct();
	}
	
	public function setData($data) {
		 if ( !empty ( $data ) ) {
		 	$this->data = $data;
		 	$this->process($data->description);
		 } else {
		 	echo "There is no data";
		 }
	}
	
	public function returnData() {
		$this->data->justGirls = $this->justGirls;
		$this->data->internet = $this->internet;
		return (array)$this->data;
	}
		
	private function process( $data ) {
		// check for just girls
		if ( $items = parent::loadDictionary("girls_room") ) {
			if ( !empty ( $items ) ) {
				// look for each words how many times appears
				$this->matchs = 0;
				foreach ( $items as $item ) {
					$this->matchs += parent::matchWord($item, $data);
				}
				
				$this->justGirls = "no";
				if ( $this->matchs > 1 ) {
					$this->justGirls = "yes";
					echo "\r\n\t Room for girls!";
				}
			}
		} else {
			echo "Was not possible to load dictionary";
		}
		
		// check for internet
		if ( $items = parent::loadDictionary("internet") ) {
			if ( !empty ( $items ) ) {
				$this->matchs = 0;
				foreach ( $items as $item ) {
					$this->matchs += parent::matchWord($item, $data);
				}
				
				$this->internet = "no";
				if ( $this->matchs > 1 ) {
					$this->internet = "yes";
				}
			}
		}
	}
}
?>