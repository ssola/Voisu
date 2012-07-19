<?php
set_time_limit(0);
class BBC extends Scrappers implements Scrapper_Interface {
	private $data;
	private $provider_data;
	private $web_buffer;
	private $dom;
	
	public function start($data) { //echo '<pre>'; print_r($data); echo '</pre>';
		$this->data = (object)$data;
		if (!empty ( $this->data->url_xml)) {
			$this->provider_data = parent::getBuffer($this->data->url_xml);
			if ( !empty ( $this->provider_data ) ) {
				$numItems = count($this->provider_data->channel->item);
				
				for($i = 0; $i < $numItems; $i++) {
					$item = $this->provider_data->channel->item[$i];
					if ( !empty($item->link)) {
						if ( !parent::itemExists($item->link, 'News')) {
							$this->parse($item);
						} else {
							echo "News exists!\r\n";
						} 
					}
				}
			}			
		}
	}
	
	public function parse($item) { 
		if ( !empty ( $item->link ) ) {
			echo "\r\n\t Parsing: " . $item->link;
			$this->data->title = (string)$item->title;
			if ( !empty ( $item->guid ) )
				$this->data->link = $item->guid;
			else
				$this->data->link = $item->link;
			$this->data->link = (string)$this->data->link;
			$this->data->description = (string)$item->description;
			$this->add();
		}
	}
	
	public function add() {
		$item = array(
			"title" => $this->data->title,
			"description" => $this->data->description,
			"link" => $this->data->link,
			"created" => time(),
			"city_id" => $this->data->city_id
		);
		
		echo parent::addItem($item, 'News');
		echo "\r\n";
	}
}
?>