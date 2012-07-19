<?php
include ( "../config.php" );

/**
 * Set text encode, default UTF-8
 */
mb_internal_encoding( TEXT_ENCODE );
include ( "../core/helpers/utils_helper.php");
include ( "../core/helpers/load_helper.php");
include ( "../core/factory.class.php");

class User_Notifications extends Clusters_Model {
	private $user_id = 0;
	private $last_time = 0;
	
	public function __construct() {
		parent::__construct();
		// get user with clusters:
		$sql = "select * from clusters";
		$user_clusters = parent::getUsersClusters();
		if ( $user_clusters ) {
			foreach ( $user_clusters as $cluster ) {
				$this->user_id = $cluster->user_id;
				$this->last_time = parent::lastNotificationRequest($this->user_id);
				$this->analyze ( $cluster );
			}
		}
	}
	
	private function analyze($cluster) {
		// get coords
		$clusters = unserialize($cluster->clusters);
		$numClusters = count($clusters);
		if ( $numClusters > 0 ) {
			for ( $i = 0; $i < $numClusters; $i++ ) {
				$this->searchRooms($clusters[$i]['coords']);
			}
		}
	}
	
	private function searchRooms($coords) {
		$url = "http://hausu.loc/api/searchRooms/lat={$coords['lat']}dsadsa&lon={$coords['lon']}/";
		$buffer = file_get_contents($url);
		$rooms = json_decode($buffer);
		
		if ( $rooms ) {
			$i = 0;
			foreach ( $rooms as $room ) {
				if($room[$i]->id > 0 ) {
					if ( $room[$i]->created > $this->last_time ) {
						$data = array(
								"user_id" => $this->user_id,
								"room_id" => $room[$i]->id,
								"created" => time()
							);
						$i++;
						print("Room " . $room[$i]->id . " saved\r\n");
						parent::saveRoom($data);
					}
				}
			}
		}
	}
}

$users_clusters = new User_Notifications();
?>