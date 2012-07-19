<?php
set_time_limit(0);
class GumTree extends Scrappers implements Scrapper_Interface {
	private $data;
	private $provider_data;
	private $web_buffer;
	private $dom;
	private $provider_id = 0;
	
	public function start($data) {
		$this->data = (object)$data;
		$this->conf = (object)$data;
		if (!empty ( $this->data->url_xml)) {
			$this->provider_data = parent::getBuffer($this->data->url_xml);
			//check url by url
			if ( !empty ( $this->provider_data ) ) {
				// creation the indexer object
				$this->indx = (object)loadClass("Indexer");
				$config = array(
					"db" => "uk",
					"collection" => strtolower($this->data->city)
				);
				$this->indx->Indexer->connect($config);
				
				$numItems = count($this->provider_data->channel->item);
				$item = $this->provider_data->channel->item;
				echo "Analyzing: ". $this->data->url_xml;
				for($i = 8; $i < $numItems; $i++) {
					if ( !parent::itemExists($item[$i]->link, 'Rooms')) {
						$this->parse($item[$i]);
						sleep(2);
					} else {
						echo "\r\n\t Room exists";
					}
				}
			}
		}
	}
	
	public function setProvider($id) {
		$this->provider_id = $id;
	}
	
	public function parse($item) {
		$this->images = array();
		if ( !empty ( $item->link ) ) {
			echo "\r\n\t Parsing: " . $item->link;
			$this->web_buffer = parent::getBuffer($item->link, 'web');
			echo $item->link;
			if (!empty ( $this->web_buffer) ) {
				$this->dom = str_get_dom($this->web_buffer);
				// set app simplehtml
				$this->data->uniqueId = time()+rand(1,999);
				$this->data->title = (string)str_replace ("Ł","&pound;",substr($item->title,0,strpos($item->title,":")));
				$this->data->slug = parent::setSlug($this->data->title, 40);
				$this->data->description = (string)$item->description;
				$this->data->url = $item->link;
				$this->getCoordinates();
				$this->data->telephone = $this->getTelephone();
				$this->getPrice();
				$add_result = $this->add();
				$this->data = (object)$add_result['data'];
				$this->data->room_id = $add_result['id'];
				$this->getImages();
				$room = $this->roomData();

				$room['id'] = $this->data->room_id;
				echo $this->data->room_id;
				if ( $room['id'] > 0 ) {
					$room['borough'] = strtolower($this->conf->borough);
					$room['city'] = strtolower($this->conf->city);
					$room['country'] = strtolower($this->conf->country);
					$this->addToIndex($room);
				} else {
					echo "outside index";
				}
			}
		}
	}
	
	public function add() {
		$room = $this->roomData();
		return parent::addItem($room, 'Rooms');
	}
	
	private function roomData() {
		return  array(
			"title" => $this->data->title,
			"description" => $this->data->description,
			"payment" => $this->data->payment,
			"price" => $this->data->price,
			"type_room" => $this->data->type_room,
			"lat" =>  ( empty ($this->data->lat) ? 0 : $this->data->lat),
			"lon" => ( empty ($this->data->lon) ? 0 : $this->data->lon),
			"telephone" => $this->data->telephone,
			"type_property" => "",
			"url" => (string)$this->data->url,
			"slug" => $this->data->slug,
			"email" => $this->data->email,
			"idzone" => $this->data->borough_id,
			"created" => time(),
			"provider_id" => $this->provider_id,
			"internet" => $this->data->internet,
			"justGirls" => $this->data->justGirls
		);
	}
	
	private function getCoordinates() {
		$res = $this->dom->find("div[class=map] img", 0)->src;
	 	if(!empty($res)) {
	 		// we have the Google url to get coordinates.
	 		$query = parse_url($res, PHP_URL_QUERY);
	 		parse_str($query, $params);
	 		$coordinates = explode(",", $params['center']);
	 		$this->data->lat = (empty($coordinates[0]) ? 0 : $coordinates[0]);
	 		$this->data->lon = (empty($coordinates[1]) ? 0 : $coordinates[1]);
	 		
	 		try {
	 			if ($this->data->coordinates->lat > 0 )
	 				$this->conf->borough = $this->data->borough = parent::geoReverse($this->data->lat, $this->data->lon);	
	 		} catch ( Exception $e ) {
	 			echo "Error expression: ol[id=breadcrumb]";	
	 		}
	 		
 			if (empty ( $this->conf->borough ) ) {
	 			$this->conf->borough =  $this->dom->find("ul[id=breadcrumbs]", 0);
	 			if ( $this->conf->borough ) {
	 				$this->conf->borough = trim(str_replace(array("&amp;","&gt;","&amp;","&nbsp;"), "",$this->conf->borough->find("li", 3)->plaintext));
	 			}
	 		}
	 	} else {
	 		// extract borough from code
  			$this->conf->borough =  $this->dom->find("ul[id=breadcrumbs]", 0);
 			if ( $this->conf->borough ) {
 				$this->conf->borough = trim(str_replace(array("&amp;","&gt;","&amp;","&nbsp;"), "",$this->conf->borough->find("li", 3)->plaintext));
 			}	 		
	 	}
	 	
  		$data = array(
 			"borough" => $this->data->borough,
 			"city" => $this->data->city,
 			"country" => $this->data->country
 		);
	 		
 		$borough_id = parent::saveBorough($data);
 		$this->data->borough_id = $borough_id;
	}
	
	private function getTelephone() {
		$res = $this->dom->find("span[class=phone]",0);
		return parent::extractNumbers(str_replace(" ", "", $res));
	}
	
	private function getImages() {
		foreach($this->dom->find("ul[class=gallery-thumbs] img") as $image) {
		    $image->src = str_replace("thumb", "big", $image->src);
			parent::addImage($image->src, $this->data->room_id);
		}
	}
	
	private function getGeneral() {
		// get description
		print_r( $this->dom->find("ul[id=ad-details]",0) );
	}
	
	private function getPrice() {
		$res = $this->dom->find("div[id=vip-header] span[class=price]", 0);
		if ( empty ( $res ) ) {
			$res = $this->dom->find("div[id=vip-header] span[class=ad-price]", 0);
		}
		
		// price
		preg_match_all('/([\d]+)/', $res, $match);
		$this->data->price = $match[0][0];
		
		// type payment
		preg_match_all('/(pw|pcm|pm)/', $res, $match);
		if ( empty ( $match[0][0])) {
			$this->data->payment = "pw";
		} else {
			$this->data->payment = $match[0][0];
		}
	}
}
?>