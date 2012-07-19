<?php
class Filters_Helper {
	private $dictionary_name = null;
	private $dictionary_path = null;
	
	public function __construct () {
		$this->dictionary_path = dirname(__FILE__)."/dictionaries/";
	}
	
	/**
	 * Load a dictionary to analyze some words
	 */
	public function loadDictionary($name) {
		$this->dictionary_name = $this->dictionary_path.$name;
		if ( file_exists( $this->dictionary_name ) ) {
			$file = file_get_contents($this->dictionary_name);
			$array = explode("\r\n", $file );
			if ( !empty ( $array ) ) {
				return $array;
			} 
		}
		
		return false;
	}
	
	public function matchWord ( $needle, $haystack ) {
		if ( !empty ( $needle ) && !empty ( $haystack ) ) {
			$needle = strtolower ( $needle ); $haystack = strtolower($haystack);
			preg_match_all("/($needle)/i", $haystack, $matches );
			if ( count($matches[0]) > 0 ) {
				return count($matches[0]);
			}
		}
	}
	
	public function isInDictionary($needle, $haystack ) {
		if ( !empty ( $needle ) && !empty ( $haystack ) ) {
			$needle = strtolower($needle);
			if ( in_array($needle, $haystack ) ) {
				return true;
			}
		}
		
		return false;
	}
}
?>