<?php
require_once("../../config.php");
include ( CORE_PATH . "/helpers/utils_helper.php");
include ( CORE_PATH . "/helpers/load_helper.php");
include ( CORE_PATH . "/factory.class.php");
require_once(AUTOTEST_PATH."/autorun.php");

$_load = loadClasses( $_config['auto_load_modules'] );

class SearchEngineTests extends UnitTestCase {
	function testEmptyValuesSearchQuery() {
		$searchInstance = loadModel("Search");
		$this->assertNull($searchInstance->searchRoomsByQuery($this->getEmptyArgs()), "This should be null");
	}
	
	function testSearchWithCorrectValues() {
		$searchInstance = loadModel("Search");
		$this->assertIsA($searchInstance->searchRoomsByQuery($this->getCompletedArgs())->results, "Array");
	}
	
	// PRIVATE METHODS
	private function getEmptyArgs() {
		return $args = array(
			"city" => strtolower("london"),
			"country" => strtolower($_config['version_name']),
			"max_price" => 0,
			"min_price" => 0,
			"room_type" => "",
			"justGirls" => "",
			"query" => "",
			"num_items" => 10,
			"skip" => 0,
			"fields" => array("title", "just_girls","description", "justGirls","images", "price", "borough", "payment", "slug", "created", "id", "lat", "lon")
		);
	}
	
	private function getCompletedArgs() {
		global $_config;
		
		return $args = array(
			"city" => strtolower("london"),
			"country" => strtolower("United Kingdom"),
			"max_price" => 700,
			"min_price" => 100,
			"room_type" => "Double Room",
			"justGirls" => "",
			"query" => "room",
			"num_items" => 10,
			"skip" => 0,
			"fields" => array("title", "just_girls","description", "justGirls","images", "price", "borough", "payment", "slug", "created", "id", "lat", "lon")
		);		
	}
}
?>