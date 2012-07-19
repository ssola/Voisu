<?php
class Admin_Users_Controller extends Controller {
	private static $_model;
	private static $_model_name = 'Users_Model';
	private        $load;
	
	public function __construct() {
		global $_config;
		
		parent::__construct();
		$this->userModel = loadModel("Users");
		$this->userAccessModel = loadModel("Users_Access");
		$this->load = loadClasses ( array ( "s3", "statics", "logger", "memcached" ) );
		$this->load['logger']->setLog( "users.log" );

		if ( $this->current_user->is_admin != 1 ) {
			redirect("/");
		}
	}

	public function index() {
		global $_load, $_config, $current_user;
		
		$title = __("Admin > Users");
		$numPerPage = 50;
		$page = $_load['uri']->getID();
		if ( empty ( $page ) ) {
			$page = 1;
			$next = $numPerPage;	
			$previous = 0;
		} else {
			$next = ($numPerPage * $page);
			if ( $page > 1 ) {
				$previous = ($next - $numPerPage);
					echo $previous ." - " .$next;
			} else {
				$previous = 0;
			}
		}

		$total_users = $this->userModel->getAllUsers();
		$numPages = ceil(count($total_users)/$numPerPage);
		$users = $this->userModel->getAllUsers("$previous,$next");

		$links = array();
		for ( $i = 1; $i <= $numPages; $i++ ) {
			$links[$i]['link'] = "/admin/users/index/$i";
			$links[$i]['value'] = $i;
		}
		
		$vars = compact ( 'users', 'title', 'user_logged', 'user', 'message', 'breadcrumb', 'tries', 
				'listRooms', 'links', 'numPages', 'page', 'friends', 'fb_login');
		Haanga::Load('users/index.php', $vars );
	}

	public function view() {
		global $_load, $_config;

		$user = $this->userModel->getUser($_load['uri']->getID());
		$logins = $this->userAccessModel->getLastAttempsFromUser($_load['uri']->getID());
		$latestQueries = $this->userModel->getLatestQueries($_load['uri']->getID());
		$latestVisits = $this->userModel->getLatestsVisits($_load['uri']->getID());

		$clusters = loadModel("Clusters");
		$clusters->setUser($_load['uri']->getID());
		$this->clusters = $clusters->getFromStorage($_load['uri']->getID());
		$clusters = $this->clusters;

		if ( $clusters ) {
			$numClusters = count ( $clusters );
			$instances = (object)loadClass("gmap");
			$instances->gmap->GoogleMapAPI('map_room');
			$instances->gmap->setMapType('map');
			$instances->gmap->setZoomLevel(15);
				
			for ( $i = 0; $i < $numClusters; $i++ ) {
				print_r ( $this->clusters[i] );
				$icon = $_config['img_url']."/pointer.png";
				$html = sprintf(_("We found %d items in this cluster"), $this->clusters[$i]['items']);
				$instances->gmap->addMarkerByCoords($this->clusters[$i]['coords']['lon'], $this->clusters[$i]['coords']['lat'] ,"", $html, '', $icon);
			}	
			
			$map->headerjs = $instances->gmap->getHeaderJS();
			$map->headermap = $instances->gmap->getMapJS();
			$map->onload = $instances->gmap->printOnLoad();
			$map->map = $instances->gmap->printMap();
			$map->sidebar = $instances->gmap->printSidebar();
		}

		$vars = compact ( 'user', 'title', 'user_logged', 'user', 'message', 'clusters', 'tries', 
				'listRooms', 'latestVisits', 'logins', 'boroughs_top', 'latestQueries', 'fb_login', 'map');
		Haanga::Load('users/view.php', $vars );
	}
}
?>