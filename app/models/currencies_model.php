<?php
class Currencies_Model extends Model {
	function __construct() {
		parent::__construct("currencies");
	}

	function getCurrencies() {
		$currencies = parent::findAll();
		return $currencies;
	}

	function getCurrency($id) {
		$currency = parent::findByPrimary($id);
		return $currency;
	}
}
?>