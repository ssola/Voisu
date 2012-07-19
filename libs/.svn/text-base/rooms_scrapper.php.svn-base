<?php 
include ( "../config.php" );

/**
 * Set text encode, default UTF-8
 */
mb_internal_encoding( TEXT_ENCODE );
include ( "../core/helpers/utils_helper.php");
include ( "../core/helpers/load_helper.php");
include ( "../core/factory.class.php");

class Rooms_Scrapper extends Scrapper {
	
	public function start_rooms(){
		parent::getInstance();
		parent::start('rooms');
	}
	
}

Rooms_Scrapper::start_rooms();
?>