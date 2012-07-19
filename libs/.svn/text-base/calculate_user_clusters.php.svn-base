<?php
include ( "../config.php" );

/**
 * Set text encode, default UTF-8
 */
mb_internal_encoding( TEXT_ENCODE );
include ( "../core/helpers/utils_helper.php");
include ( "../core/helpers/load_helper.php");
include ( "../core/factory.class.php");

class Users_Clusters extends Clusters_Model {
	private $instances;
	
	public function __construct() {
		parent::__construct();
		$this->instances->users = loadModel("Users");	
	}
	
	public function start() {
		print("Start users clustering: \r\n");
		$firstStack = $this->instances->users->getUsers();
		if ( $firstStack ) {
			foreach ( $firstStack as $user ) {
				print("\r\nCalculating clusters of $user->name ($user->id)\r\n");
				parent::setUser($user->id);
				parent::calculatePoi();
			}
		}
	}
}

$clusters = new Users_Clusters();
$clusters->start();
?>