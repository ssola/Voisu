<?php 
set_time_limit(0);
class Groupon extends Scrappers implements Scrapper_Interface {
	private $data;
	private $provider_data;
	private $web_buffer;
	private $dom;
	
	public function start($data) {
		$this->data = (object)$data;
		if (!empty ( $this->data->url_xml)) {
			$this->provider_data = parent::getBuffer($this->data->url_xml);
			if ( !empty ( $this->provider_data ) ) {
				$numItems = count($this->provider_data->channel->item);
				
				for($i = 0; $i < $numItems; $i++) {
					$item = $this->provider_data->channel->item[$i];
					if ( !empty($item->link)) {
						if ( !parent::itemExists($item->link, 'Deals')) {
							$this->parse($item);
						} else {
							echo "Deal exists!\r\n";
						} 
					}
				}
			}
		}
	}
	
	public function parse($item) {
		if ( !empty ( $item->link ) ) {
			$this->web_buffer = parent::getBuffer($item->link, 'web');
			if (!empty ( $this->web_buffer ) ) {
				$this->dom = str_get_dom($this->web_buffer);
				$this->getData();
				$this->data->title = (string)$item->title;
				$this->data->link = (string)$item->link;
				$this->add();
			}
		}
	}
	public function add() {
		$item = array(
			"title" => $this->data->title,
			"description" => $this->data->description,
			"link" => $this->data->link,
			"amount" => $this->data->amount,
			"percent" => $this->data->percent,
			"image" => $this->data->image,
			"total_amount" => $this->data->total_amount,
			"lat" => $this->data->coordinates[0],
			"lon" => $this->data->coordinates[1],
			"num_buyers" => $this->data->num_buyers,
			"open" => $this->data->open,
			"created" => time(),
			"city_id" => $this->data->city_id
		);
		
		echo parent::addItem($item, 'Deals');
		echo "\r\n";
	}
	
	public function getData() {
		if ( !empty ( $this->web_buffer ) ) {
			$this->data->amount = parent::extractNumbers($this->dom->find("span[class=price] span[class=noWrap]", 0));
			$this->data->percent = parent::extractNumbers(($this->dom->find("table[class=savings] tr[class=row2] td[class=col1]", 0)->plaintext));
			$this->data->total_amount = round(($this->data->amount*100)/(100-$this->data->percent),2);
			$this->data->num_buyers = $this->dom->find("div[class=soldAmount] span", 0)->plaintext;
			$this->data->description = substr($this->dom->find("div[class=contentBoxNormalLeft]", 0)->plaintext, 0, 500);
			$map_url = $this->dom->find("div[class=jGoogleMap] img", 0)->src;
			
			if (!empty ( $map_url ) ) {
				$query = parse_url($map_url, PHP_URL_QUERY);
		 		parse_str($query, $params);
		 		$coordinates = explode(",", $params['center']);
		 		$this->data->coordinates = array((empty($coordinates[0]) ? 0 : $coordinates[0]),(empty($coordinates[1]) ? 0 : $coordinates[1]));
			}
			
			$this->data->image = $this->dom->find("div[id=contentDealDescription] img", 0)->src;
			$this->data->open = 1;
		}
	}
}
?>