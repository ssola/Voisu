<?php
require_once("../../config.php");
include ( CORE_PATH . "/helpers/utils_helper.php");
include ( CORE_PATH . "/helpers/load_helper.php");
include ( CORE_PATH . "/factory.class.php");
require_once(AUTOTEST_PATH."/autorun.php");

$_load = loadClasses( $_config['auto_load_modules'] );

class SearchEngineTests extends UnitTestCase {
	public function testConstructNiceUriJustWithController() {
		$uri = setLink("users");
		$this->assertEqual("http://london.hausu.loc/usuarios/", $uri );
	}
	
	public function testConstructNiceUriWithoutData() {
		$uri = setLink();
		$this->assertFalse($uri);
	}
	
	public function testConstructNiceUriWithStrangeData() {
		$uri = setLink("dsadsa//---22awd ? as");
		$this->assertEqual("http://london.hausu.loc/dsadsa---22awdas", $uri);
	}
}
?>