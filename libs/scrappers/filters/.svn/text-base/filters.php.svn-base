<?php
interface Filters_Interface {
	public function setData($data);
	public function returnData();
}

require_once ( "filters_helper.php" );

class Filters {
	private $filters = array(
		"spam",
		"analyze_room",
		"duplicates",
		"boroughs"
	);
	
	private $filter_eof = "_filter";
	private $current_filter = null;
	private $instance = null;
	
	public function __construct($filter) {
		if ( !empty ( $filter ) ) {
			if ( in_array($filter, $this->filters ) ) {
				$this->current_filter = $filter;
				$this->loadFilter();
			}
		}
	}
	
	public function setData($data) {
		if ( !empty ( $data ) ) {
			$this->instance->setData($data);
		}
	}
	
	public function returnData() {
		return $this->instance->returnData();
	}
	
	private function loadFilter() {
		if ( !empty ( $this->current_filter ) ) {
			$dir = dirname ( __FILE__ );
			$filter_file = $dir."/".$this->current_filter.$this->filter_eof.".php";
			if ( file_exists($filter_file ) ) {
				require_once $filter_file;
				$class_name = $this->current_filter.$this->filter_eof;
				$this->instance = new $class_name();
			} else {
				echo "Filter not found";
			}
		}
	}
}
?>