<?php
include ( "../config.php" );

/**
 * Set text encode, default UTF-8
 */
mb_internal_encoding( TEXT_ENCODE );
include ( "../core/helpers/utils_helper.php");
include ( "../core/helpers/load_helper.php");
include ( "../core/factory.class.php");

class Boroughs_Stats extends Boroughs_Model {
	public function __construct() {
		parent::__construct();
	}
	
	public function start() {
		$data = parent::getBoroughsAverage();
		if ( $data ) {
			foreach ( $data as $borough ) {
				$info = array(
					"id_borough" => $borough->id,
					"day" => date("d"),
					"month" => date("m"),
					"year" => date("Y"),
					"average_price" => $borough->average
				);
				
				// get average price city
				$average_city = parent::getCityAverage($borough->city);
				
				if (!empty ( $info ) ) {
					if ( $info['average_price'] > $average_city ) {
						print("{$borough->borough} ({$info['average_price']}) is most expensive than average $average_city\r\n");
					}
					
					// get percentile
					$percent = ($info['average_price'] * 100 / $average_city) - 100;
					print("\tWith a percentile of: $percent% more expensive\r\n" );
					$info['diff_average'] = $percent;
					parent::saveBoroughAverage($info);
				}
			}
		}
	}
}

$boroughs = new Boroughs_Stats();
$boroughs->start();
?>