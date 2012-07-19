<?php
class Indexer {
	private static $instance;
	private $mongo_db;
	private $collection;
	
	public function __construct() {}
	public function __clone() {}
	
	public function getInstance() {
		if (!isset(self::$instance)) {
			$class = __CLASS__;
			self::$instance = new $class;
		}
		
		return self::$instance;
	}
	
	/**
	 * Configuration and connection to mongo
	 * config : 
	 * 	- collection (ex. london)
	 */
	public function connect($config) {
		try {
			$this->mongo_db = new Mongo_Wrapper();
			$this->mongo_db->setDatabase($config['db']);
			$this->mongo_db->setCollection($config['collection']);
		} catch ( MongoConnectionException $e ) {
			echo "Impossible to connect to Mongo";
		}
	}
	
	public function addToIndex($item, $index) {
		if (!empty ( $item ) ) {
			$this->mongo_db->insert($item);
			if ( !empty ( $index ) ) {
				$this->mongo_db->ensureIndex($index);
			}
		}
	}
	
	public function steammer($title, $description) {
		if ( !empty ( $title ) && !empty ( $description ) ) {
			$this->filter->weightwords = new WeightWords_Filter();
			
			// get keywords for title
			$this->filter->weightwords->setData(array("text"=>$title, "num"=>10));
			$keywords_title = $this->filter->weightwords->returnData();
			
			//get keywords for description
			$this->filter->weightwords->setData(array("text"=>$description, "num"=>10));
			$keywords_description = $this->filter->weightwords->returnData();
			
			$result = array_merge($keywords_title, $keywords_description);
			
			if ( !empty ( $result ) ) {
				return $result;
			}
		}
		
		return null;
	}
}
?>