<?php
class Products_Model extends Model {
	private $_validation = array();
	private $_scheme = array(
		array(
			"field" => "price",
			"validation" => array(
				"number" => "",
				"empty" => ""
			),
			"msg" => "Price must be a real number",
		)
	);

	public function __construct() {
		parent::__construct('products');
		$this->_validation = new Validation();
	}

	public function getProductInfo($id) {
		global $_config;

		if ( !empty ( $id ) ) {
			$sql = sprintf("select taxes.tax,taxes.tax_name,products.owner, products.id, products_country.is_valid, products_country.price, products_country.discount, products_country.name from products inner join products_country on products.id = products_country.product_id inner join taxes on taxes.country_id = '%s' where products_country.country_id = '%s' and products.id = %d and products_country.is_valid = 1",
				$_config['version_name'],$_config['version_name'],intval($id));

			$data = parent::findByQuery($sql);
			if ($data) {
				$data[0]->final_price = ($data[0]->price - (($data[0]->price * $data[0]->discount) / 100)); 
				$data[0]->final_price = round($data[0]->final_price + ( $data[0]->final_price * $data[0]->tax / 100 ),2);
				return $data[0];
			}
		}

		return false;
	}
}