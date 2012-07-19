<?php
class Boroughs_Model extends Model {
	private $_scheme = array(
					array (
						"field" => "city",
						"validation" => array (
							"empty" => ""
						)
					)
				);
	
	private $_validation;
	
	public function __construct() {
		parent::__construct('boroughs');
		$this->_validation = new Validation();
	}
	
	public function create() {
		return new Boroughs_Model();
	}
	
	public function add($info) {
		if ( !empty ( $info ) ) {
			return true;
		}
		
		return false;
	}
	
	public function getCityAverage($city)  {
		$sql = sprintf("SELECT SUM(rooms.price)/ COUNT(rooms.id) as average
						FROM rooms
						INNER JOIN boroughs ON rooms.idzone = boroughs.id
						WHERE boroughs.city = '%s'", mysql_real_escape_string($city));
		$result = parent::findByQuery($sql);
		if ( $result ) {
			return $result[0]->average;
		}
		
		return false;
	}
	
	public function getBoroughsStats($id) {
		if ( $id > 0 ) {
			$sql = sprintf("SELECT borough_stats.*
						FROM boroughs
						INNER join borough_stats on boroughs.id = borough_stats.id_borough
						WHERE  borough_stats.year = YEAR(CURRENT_DATE()) and borough_stats.id_borough = %d
						ORDER BY borough_stats.id ASC", intval($id));
			
			$results = parent::findByQuery($sql);
			if ( $results ) {
				return $results;
			}
		}
	}
	
	public function getBoroughsAverage() {
		$time=time()-(3600*24);
		$sql = sprintf("SELECT SUM(rooms.price)/ COUNT(rooms.id) AS average, boroughs.id, boroughs.borough, boroughs.city
						FROM rooms
						INNER JOIN boroughs ON boroughs.id = rooms.idzone
						WHERE rooms.payment = 'pw' AND rooms.created >= %d
						GROUP BY boroughs.id
						ORDER BY average DESC", intval($time));
		
		$results = parent::findByQuery($sql);
		if ( $results ) {
			return $results;
		}
		
		return false;
	}
	
	public function saveBoroughAverage($data) {
		parent::__construct("borough_stats");
		if ( !empty ( $data ) ) {
			parent::save($data);
		}
	}
	
	public function save($borough) {
		$scheme = $this->_scheme;
		$this->_validation->setElements($this->_scheme, $borough );
		if ( $this->_validation->Validate() ) {
			return parent::save($borough);
		}
	}
	
	public function getBoroughId($data) {
		$results = parent::findAll($data);
		if (parent::getNumResults() > 0) {
			foreach($results as $result) {
				return $result->id;
			}
		}
	}
	
	public function getByName($name) {
		if ( !empty ( $name ) ) {
			$data = array ( "borough" => $name );
			$result = parent::findAll($data);
			if ( $result ) {
				return $result[0];
			}
		}
	}
	
	public function getBoroughs($city, $country, $max = 12) {
		global $_load;
		
		if ( !empty ( $city ) && !empty ( $country ) ) {
			$sql = sprintf("SELECT COUNT(r.id) AS numrooms, b.borough
							FROM rooms r
							INNER JOIN boroughs b ON 
							b.id = r.idzone
							WHERE b.city = '%s' AND b.country = '%s'
							GROUP BY b.borough
							ORDER BY numrooms DESC LIMIT 0,%d",
			$city, $country, intval($max));
			
			$_load['memcached']->connect();
			if ( $results = $_load['memcached']->get(setKeyName("boroughs_".$max)) ) {
				return $results;
			} else {
				$results = parent::findByQuery($sql);
				if ( $results ) {
					$_load['memcached']->set(setKeyName("boroughs_".$max), $results, 3600);
					return $results;
				}
			}
			
			return false;
		}
	}
	
	public function getCities ($country, $max = 20 ) {
		global $_load;
		
		if ( !empty ( $country ) ) {
			$sql = sprintf("SELECT b.city FROM cities b WHERE b.country = '%s' order by b.default_city desc;",
			$country );
			
			$_load['memcached']->connect();
			if ( $results = $_load['memcached']->get(setKeyName("cities_".$country)) ) {
				return $results;
			} else {
				$results = parent::findByQuery($sql);
				if ( $results ) {
					$_load['memcached']->set(setKeyName("cities_".$country), $results, 3600 );
					return $results;
				}
			}
			
			return false;
		}
	}
	
	public function getPopularBoroughs($num) {
		
	}
	
	public function getSimilarBorough($name, $city) {
		$sql = sprintf("select * from boroughs where boroughs.borough LIKE '%s' and city = '%s'", "%".$name."%", $city);
		$results = parent::findByQuery($sql);
		
		if ( $results ) {
			return $results;
		}
		
		return false;
	}
}
?>