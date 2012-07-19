<?php
require_once("../../config.php");
include ( CORE_PATH . "/helpers/utils_helper.php");
include ( CORE_PATH . "/helpers/load_helper.php");
include ( CORE_PATH . "/factory.class.php");
require_once(AUTOTEST_PATH."/autorun.php");

$_load = loadClasses( $_config['auto_load_modules'] );

class PaymentsTests extends UnitTestCase {
	public function testGettingNormalPrice() {
		global $_config;

		$_config['version_name'] = 'test-environment';
		$payments = loadModel("Products");
		$product = $payments->getProductInfo(2);
		$this->assertEqual($product->price,5.4);
	}

	public function testGettingTaxesAmount() {
		global $_config;

		$_config['version_name'] = 'test-environment';
		$payments = loadModel("Products");
		$product = $payments->getProductInfo(2);
		$this->assertEqual($product->tax,14);
	}

	public function testGettingTaxesName() {
		global $_config;

		$_config['version_name'] = 'test-environment';
		$payments = loadModel("Products");
		$product = $payments->getProductInfo(2);
		$this->assertEqual($product->tax_name,"IVA");
	}

	public function testGettingDiscount() {
		global $_config;

		$_config['version_name'] = 'test-environment';
		$payments = loadModel("Products");
		$product = $payments->getProductInfo(2);
		$this->assertEqual($product->discount,6);
	}

	public function testCheckIfFinalPriceIsCorrect() {
		global $_config;

		$_config['version_name'] = 'test-environment';
		$payments = loadModel("Products");
		$product = $payments->getProductInfo(2);
		$this->assertEqual($product->final_price,5.79);
	}
}