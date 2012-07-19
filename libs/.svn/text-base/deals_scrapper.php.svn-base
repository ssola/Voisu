<?php 
include ( "../config.php" );

/**
 * Set text encode, default UTF-8
 */
mb_internal_encoding( TEXT_ENCODE );
include ( "../core/helpers/utils_helper.php");
include ( "../core/helpers/load_helper.php");
include ( "../core/factory.class.php");

class Deals_Scrapper extends Scrapper {
	
	public function start_deals(){
		parent::getInstance();
		parent::start('deals');
	}
	
}

Deals_Scrapper::start_deals();
?>