<?php
interface ResultsHandlerCommand {
	function execute ( $name, $args );	
}

class ResultsHandler {
	private $instances;

	public function __construct() {}

	public function addHandler($handler) {
		if ($handler != null) {
			$this->instances[] = $handler;
		}
	}

	public function execute($method, $args) {
		foreach ( $this->instances as $instance ) {
			if ( $data = $instance->execute($method, $args) ) {
				if ( !empty ( $data ) ) {
					return $data;
				}

				return true;
			}
		}
	}
}

class ResultsJSON implements ResultsHandlerCommand {
	public function execute ( $name, $args ) {
		if ( $name == "json" ) {
			return $this->returnData($args);
		}
	}

	public function returnData($data) {
		return json_encode($data);
	}
}

class ResultsArray implements ResultsHandlerCommand {
	public function execute ( $name, $args ) {
		if ( $name == "array" ) {
			return $this->returnData($args);
		}
	}

	public function returnData($data) {
		return (array)$data;
	}
}

class ResultsXML implements ResultsHandlerCommand {
	public function execute ( $name, $args ) {
		if ( $name == "xml" ) {
			return $this->returnData($args);
		}
	}

	public function returnData($data) {
		$data = new array2xml((array)$data);
		return $data;
	}
}

class array2xml {
   var $output = "<?xml version=\"1.0\" encoding=\"utf-8\"?>\n";
   function array2xml($array, $root = 'root', $element = 'element') {     
      $this->output .= $this->make($array, $root, $element);
   }
   function make($array, $root, $element) {
      $xml = "<{$root}>\n";
      foreach ($array as $key => $value) {
      	if ( is_object ( $value ) ) {
      		$value = (array)$value;
      	}

         if (is_array($value)) {
            $xml .= $this->make($value, $element, $key);
         } else {
            if (is_numeric($key)) {
               $xml .= "<{$root}>{$value}</{$root}>\n";
            } else {
               $xml .= "<{$key}>{$value}</{$key}>\n";
            }
         }
      }
      $xml .= "</{$root}>\n";      
      return $xml;
   }
}
?>