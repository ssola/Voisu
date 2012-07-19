<?php
require_once("../../config.php");
include ( CORE_PATH . "/helpers/utils_helper.php");
include ( CORE_PATH . "/helpers/load_helper.php");
include ( CORE_PATH . "/factory.class.php");
require_once(AUTOTEST_PATH."/autorun.php");

$_load = loadClasses( $_config['auto_load_modules'] );

class BoroughsTests extends UnitTestCase {
	public function testCreateANewBoroughWithEmptyValues() {
		$boroughs = Boroughs_Model::create();
		$borough = array(
			"name" => "Camden",
			"city" => 3,
			"country" => 4
		);
		
		$this->assertFalse($boroughs->add($borough));
	}
	
	private function testCreateANewBoroughWithoutCoordinates() {
		$boroughs = Boroughs_Model::create();
		$this->assertFalse($boroughs->add($borough));
	}
	
	private function testCreateANewBoroughWithSameNameAndCity() {
		$boroughs = Boroughs_Model::create();
		$this->assertFalse($boroughs->add($borough));
	}
	
	private function testCreateANewBoroughWithOkData() {
		$boroughs = Boroughs_Model::create();
		$this->assertTrue($boroughs->add($borough));
	}
}
?>