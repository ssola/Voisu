<?php
class Support_Model extends Model {
	private $_validation = array();
	private $_scheme = array (
						array (
							"field" => "slug",
							"validation" => array (
								"email" => "",
								"empty" => ""
							),
							"msg" => "Email exists or not is valid"
						)
					);
					
	public function __construct() {
		parent::__construct('support_questions');
	}
	
	public function getCategories() {
		$sql = "select * from support_categories order by display_order asc";
		$categories = parent::findByQuery($sql);
		if ( $categories ) {
			return $categories;
		}
		
		return false;
	}
	
	public function getCatName($slug) {
		if ( !empty ( $slug ) ) {
			$sql = sprintf("select name from support_categories where slug = '%s'" ,mysql_real_escape_string($slug));
			$result = parent::findByQuery($sql);
			if ( $result ) {
				return $result[0]->name;
			}
		}
		
		return false;
	}
	
	public function getCatId($slug) {
		if ( !empty ( $slug ) ) {
			$sql = sprintf("select id from support_categories where slug = '%s'" ,mysql_real_escape_string($slug));
			$result = parent::findByQuery($sql);
			if ( $result ) {
				return $result[0]->id;
			}
		}
		
		return false;
	}	
	
	public function getCatById($id) {
		if ( !empty ( $id ) ) {
			$sql = sprintf("select name,id,slug from support_categories where id = %d" ,intval($id));
			$result = parent::findByQuery($sql);
			if ( $result ) {
				return $result[0];
			}
		}
		
		return false;
	}	
	
	public function getArticles($slug) {
		$cat_id = $this->getCatId($slug);
		
		if (!empty ( $cat_id ) ) {
			$results = parent::findByKey('cat_id', $cat_id);
			if ( $results ) {
				return $results;
			}
		}
		
		return false;
	}
	
	public function getArticle($slug) {
		if (!empty ( $slug ) ) {
			$results = parent::findByKey('slug', $slug);
			if ( $results ) {
				return $results[0];
			}
		}
		
		return false;
	}
}
?>