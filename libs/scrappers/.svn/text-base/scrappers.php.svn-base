<?php
require_once(CORE_PATH.SEPARATOR."simple_html_dom.php");
require_once ("filters/filters.php");

class Scrappers extends Filters {
	var $buffer;
	static $instance;
	var $images;
	var $indx;
	
	/**
	 * Get content of this xml file
	 */
	protected function getBuffer($url, $method = "xml") {
		if (!empty ( $url ) ) {
			$ctx = stream_context_create(array(
			    'http' => array( 
			        	'timeout' => 5,
						'header'=>"Content-Type: text/html; charset=utf-8" 
					)
				)
			);

			$buffer = file_get_contents($url, 0, $ctx);
			
			if ( $buffer == false ) {
				echo "Impossible to connect to $url";
			} else {
				if ( !empty ( $buffer ) ) {
					$this->buffer = $buffer;
					$this->buffer = str_replace("content:encoded", "description", $this->buffer );
					
					switch($method) {
						case 'xml':
							$content = $this->xmlToArray();
							if (!empty($content)) {
								return $content;
							}
							
							return null;
							break;
						case 'web':
							//echo $this->buffer;
							return $this->buffer;
							break;
					}
				}
			}
		}
		
		return null;
	}
	
	protected function geoReverse($lat, $lon) {
		$url = "http://maps.googleapis.com/maps/api/geocode/json?latlng=$lat,$lon&sensor=false";
		$buffer = $this->getBuffer($url, "web");
		if ( !empty ( $buffer ) ) {
			$array = json_decode ( $buffer );
			$name = $this->getReverseType($array->results[0]->address_components, "administrative_area_level_3");
			if ( empty ( $name ) ) {
				$name = $this->getReverseType($array->results[0]->address_components, "administrative_area_level_2");
			}
			return $name;
		}
	}
	
	private function getReverseType(&$items, $name) {
		if ( !empty ( $items ) && !empty ( $name ) ) {
			$numItems = count($items);
			for ($i = 0; $i < $numItems; $i++) {
				if ( $items[$i]->types[0] == $name ) {
					return $items[$i]->long_name;
				}
			}
		}
	}
	
	private function xmlToArray() {
		if (!empty ( $this->buffer ) ) {
			$array = new SimpleXMLElement($this->buffer);
			return $array;
		}
	}
	
	protected function saveBorough($data) {
		if ( !isset(self::$instance['boroughs'])) {
			$instance = loadModel("Boroughs");
			self::$instance['boroughs'] = $instance;
		}
		
		$id = self::$instance['boroughs']->save($data);
		if ( $id > 0 ) {
			return $id;
		} else {
			// what I have to doooo!!!
			$id = self::$instance['boroughs']->getBoroughId($data);
			return $id;
		}
	}
	
	protected function addItem($data, $type) {
		$type_low = strtolower($type);
		
		if ( !isset(self::$instance[$type_low])) {
			$instance = loadModel($type);
			self::$instance[$type_low] = $instance;
		}
		
		$filters = new Filters("analyze_room");
		$filters->setData((object)$data);
		$data = $filters->returnData();
		
		$id = self::$instance[$type_low]->save($data);
		
		if ( $id > 0 ) {
			return array ( "id" => $id, "data" => $data );
		} else {
			return false;
		}
	}

	protected function itemExists($url, $type) {
		$type_low = strtolower($type);
		
		if ( !isset(self::$instance[$type_low])) {
			$instance = loadModel($type);
			self::$instance[$type_low] = $instance;
		}		
		return self::$instance[$type_low]->existUrl($url);
	}
	
	protected function addToIndex($data) {
		$data['images'] = $this->images;
		if ( $this->indx ) {
			$keywords = $this->indx->Indexer->steammer($data['title'], $data['description']);
			if ( !empty ( $keywords ) ) {
				$data['_keywords'] = $this->indx->Indexer->steammer($data['title'], $data['description']);
			}
			
			$data['description'] = substr($data['description'],0,200) ." .. ";
			$data['point'] = array((double)$data['lat'], (double)$data['lon']);
			$this->indx->Indexer->addToIndex($data, array("_keywords" => 1, "borough" => 1, "point" => "2d" ));
		}
	}
	
	protected function addImage($src, $room_id) {
		if ( !isset(self::$instance['images'])) {
			$instance = (object)loadClass("Images");
			self::$instance['images'] = $instance;
		}
		
		$folder_name = "rooms/".date("Y")."/".date("m")."/";
		
		$this->images[] = self::$instance['images']->Images->saveImgeFromUrl($src, $folder_name, $room_id);
	}
	
	protected function extractNumbers($string) {
		preg_match_all('/([\d\.]+)/', $string, $match);
	 
		return trim($match[0][0]);
	}
	
	protected function setSlug($title, $max) {
		return substr($this->slug($title),0,$max);
	}
	
	private function slug($str){
		$str = strtolower(trim($str));
		$str = preg_replace('/[^a-z0-9-]/', '-', $str);
		$str = preg_replace('/-+/', "-", $str);
		return $str;
	}
}

interface Scrapper_Interface {
	public function start($data);
	public function parse($item);
	public function add();
}
?>