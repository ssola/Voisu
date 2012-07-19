<?php 
include ( "../config.php" );

/**
 * Set text encode, default UTF-8
 */
mb_internal_encoding( TEXT_ENCODE );
include ( "../core/helpers/utils_helper.php");
include ( "../core/helpers/load_helper.php");
include ( "../core/factory.class.php");

class News_Scrapper extends Scrapper {
	
	public function start_news(){
		parent::getInstance();
		parent::start('news');
	}
	
}

News_Scrapper::start_news();
?>