<?php
class Support_Controller extends Controller {
	private $categories;
	
	public function __construct() {
		parent::__construct();
		$this->instances->model = loadModel("Support");
	}	
	
	public function _before_index() {
		$this->categories = $this->instances->model->getCategories();
	}
	
	public function index() {
		global $_load;
		
		$title = "Hausu Support Center";
		
		$breadcrumb = array (
			__('Home') => "#",
			__('Support') => "",
		);
		
		$_load['breadcrumbs']->setData($breadcrumb);
		$breadcrumb = $_load['breadcrumbs']->getData();		
					
		$categories = $this->categories;
		$vars = compact ( 'url', 'title', 'user_logged', 'user', 'room', 'breadcrumb', 'amount', 'query',
			 'map', 'fb_login', 'categories', 'next_results_starts', 'is_favourite', 'users_favourites');
		Haanga::Load('support/index.php', $vars );
	}
	
	public function category() {
		global $_load;
		
		$this->_before_index();
		$slug = $_load['uri']->getID();
		$categories = $this->categories;
		$cat_name = $this->instances->model->getCatName($slug);
		if ( !empty ( $slug ) ) {
			$topics = $this->instances->model->getArticles($slug);
		}
		
		$title = __("Hausu Support Center ->") . $cat_name;
		
		$breadcrumb = array (
			__('Home') => "#",
			__("Support") => setLink("support"),
			$cat_name => "",
		);
		
		$_load['breadcrumbs']->setData($breadcrumb);
		$breadcrumb = $_load['breadcrumbs']->getData();		

		$vars = compact ( 'url', 'title', 'user_logged', 'user', 'room', 'breadcrumb', 'amount', 'query',
			 'map', 'fb_login', 'categories', 'topics', 'cat_name', 'users_favourites');
		Haanga::Load('support/category.php', $vars );
	}
	
	public function answer() {
		global $_load;
		
		$this->_before_index();
		$slug = $_load['uri']->getID();
		$categories = $this->categories;
		$topic = $this->instances->model->getArticle($slug);
		$cat = $this->instances->model->getCatById($topic->cat_id);
		$cat_name = $cat->name;
		$title = __("Hausu Support Center ->") . $cat_name;
		
		$breadcrumb = array (
			__('Home') => "#",
			__("Support") => setLink("support"),
			$cat_name => setLink("support", "category", $cat->slug),
			$topic->title => ""
		);
		
		$_load['breadcrumbs']->setData($breadcrumb);
		$breadcrumb = $_load['breadcrumbs']->getData();		

		$vars = compact ( 'url', 'title', 'user_logged', 'user', 'room', 'breadcrumb', 'amount', 'query',
			 'map', 'fb_login', 'categories', 'topic', 'cat_name', 'users_favourites');
		Haanga::Load('support/answer.php', $vars );		
	}
}
?>