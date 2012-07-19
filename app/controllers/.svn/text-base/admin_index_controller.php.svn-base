<?php
class Admin_Index_Controller extends Controller {
	private $instances;
	private $notifications;
	private $has_notifications;
	
	public function __construct() {
		parent::__construct();
		
		if ( $this->current_user ) {
			$this->instances->notifications = loadModel("Notifications");
			$this->instances->rooms = loadModel("Rooms");
		} else {
			$this->instances->rooms = loadModel("Rooms");
		}
	}
	
	public function _before_index() {
		// save to memcache
		if ( $this->current_user ) {
			$this->notifications = $this->instances->notifications->getNotificationsResult($this->current_user->id,5);
			$numNot = count($this->notifications);
			$getMore = 5 - $numNot;
			if ( $getMore > 0 ) {
				$this->notifications = (array)$this->notifications;
				$newRooms = (array)$this->instances->rooms->getRooms($getMore);
				$newRooms = array_slice($newRooms, 0, $getMore);
				if ( $newRooms ) {
					foreach ( $newRooms as $room ) {
						array_push($this->notifications, $room);
					}
				}
				
				$this->notifications = (object)$this->notifications;
			}
		} else {
			$this->notifications = (object)$this->instances->rooms->getRooms(5);
		}
	}
	
	public function index() {
		global $_load, $_config, $current_user;
		
		$title = __("Hausu.co.uk - The best way to find your new home in London");
		
		$breadcrumb = array (
			__('Home') => "#",
			__('Welcome, do you know about Hausu?') => ""
		);

		$_load['breadcrumbs']->setData($breadcrumb);
		$breadcrumb = $_load['breadcrumbs']->getData();

		$listRooms = $this->notifications;
		$user_logged = ($this->current_user) ? true : false;
		
		$vars = compact ( 'url', 'title', 'user_logged', 'user', 'message', 'breadcrumb', 'tries', 
				'listRooms', 'boroughs', 'cities', 'boroughs_top', 'friends', 'fb_login');
		Haanga::Load('index.php', $vars );
	}
	
	public function test() {
		$userPoi = new Users_Poi($this->current_user->id);
		$userPoi->calculatePoi();
	}
}
?>