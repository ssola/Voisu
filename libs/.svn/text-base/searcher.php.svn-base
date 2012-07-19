<?php
require_once(dirname ( __FILE__ )."/searcher_filters/searcher_filters.php");

class Searcher extends Mongo_Wrapper {
	private static $instance;
	private $mongo_db;
	private $handler;
	private $filters;
	
	public function __construct() {
		$this->filters = new Searcher_Filters();
	}
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
			$this->handler = $this->mongo_db->collection;
		} catch ( MongoConnectionException $e ) {
			echo "Impossible to connect to Mongo";
		}
	}

	public function search($args) {
		$default = array(
			"city" => "london",
			"country" => "united kingdom",
			"max_price" => 300,
			"min_price" => 100,
			"room_type" => "Double Room",
			"query" => "",
			"num_items" => 10,
			"skip" => 0,
			"fields" => array()
		);

		// filter the query string
		$conf = array_merge($default, $args);
		$conf['query'] = trim($conf['query']);
		
		/**
		 * Add filter to
		 * 	- Stemmer words
		 * 	- Drop duplicated words
		 */
		if ( empty($conf['coords']) && strlen($conf['query']) <= MIN_QUERY_LENGHT ) {
			return null;	
		}

		$this->filters->setFilter("stemmer");
		$conf = array_merge($default, $args);
		$this->filters->setData($this->steammer($conf['query']));
		$query = $this->filters->returnData();
		// delete stop words
		$this->filters->setFilter("stopwords");
		$this->filters->setData($query);
		$query = $this->filters->returnData();
		
		$logger = new Logger();
		$logger->setLog("Searcher");
		
		$regex = new MongoRegex("/^{$conf['query']}/i");
		
		$search_query = array(
			"city" => $conf['city'],
			"country" => $conf['country'],
			'$or' => array(
				array("_keywords" => array('$in' => $query)),
				array("borough" => $regex)
			),
			"type_room" => $conf['room_type'],
			"price" => array('$gt' => strval($conf['min_price']), '$lt' => strval($conf['max_price']) ),
		);

		// Filter for girls
		if ( !empty ( $conf['justGirls'] ) ) {
			$search_query['justGirls'] = $conf['justGirls'];
		}
		
		if(!empty($conf['coords'])){
			$search_query["point"] = array(
							'$near' => array(
									$conf['coords']['lat'], $conf['coords']['lon']
								),
						);
						
			if ( !empty ( $conf['distance'] ) ) {
				$search_query['point']['$maxDistance'] = $conf['distance'];
			}

			// delete or for geospatial queries
			unset($search_query['$or']);
		}

		/*$results = $this->handler->find($search_query, $conf['fields'])->sort(array("created"=>-1))->limit($conf['num_items'])->skip($conf['skip']);*/
		$results = $this->mongo_db->get($search_query, $conf['fields'], $conf['num_items'], $conf['skip']);

		$tmp['total_results'] = $results['num'];
		$tmp['results'] = $results['results'];
		
		return (object)$tmp;
	}
	
	public function returnResults($obj, $type="object") {
		$k = array();
		$i = 0;

		while( $obj->hasNext())
		{
		    $k[$i] = (object)$obj->getNext();
			$i++;
		}

		/*
			Return result in a different ways like json, xml, array, etc...
		*/

		$resultHandler = new ResultsHandler();
		$resultHandler->addHandler(new ResultsJSON());
		$resultHandler->addHandler(new ResultsArray());
		$resultHandler->addHandler(new ResultsXML());
		$result = $resultHandler->execute("xml", $k);

		return $k;		
	}
	
	public function steammer($text) {
		global $_load;
		
		if ( !empty ( $text ) ) {
			$words = explode ( " ", $text );
			for($i = 0; $i < count($words); $i++ ) {
				if ( strlen($words[$i]) < 3 ) {
					unset($words[$i]);
				} else {
					$words[$i] = strtolower(strip_tags($_load['sanitize']->paranoid($words[$i]))); 
				}
			}
			
			$words = implode(",", $words );
			$words = explode(",", $words );
			
			return $words;
		}
		
		return false;		
	}	
}
?>