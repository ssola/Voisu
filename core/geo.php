<?php
class Geo {
	private $url_api_provider = 'http://api.hostip.info/?ip=';
	private $user_ip;
	private $country_name;
	private $country_iso;
	private $city;
	
	public function __construct() {
		$this->user_ip = getUserIp(false);
	}
	
	public function getUserCountryISO () {
		return $this->country_iso;
	}
	
	public function getUserCity() {
		return $this->city;
	}
	
	public function callApi() {
		if ( $this->user_ip == "127.0.0.1" ) {
			$this->country_name = "LOCAL";
			$this->country_iso = "LOCAL";
			$this->city = "LOCAL";
			
			return true;
		} else {
			if ( !empty ( $this->user_ip ) ) {
				$url = $this->url_api_provider;
				$buffer = @file_get_contents ( $url );
				if ( !empty ( $buffer ) ) {
					$xml = new SimpleXMLElement ( $buffer );
					$this->city = $xml->xpath("//gml:featureMember//gml:name");
					$this->city = (string)$this->city[0];
					$this->country_name = $xml->xpath("//gml:featureMember//countryName");
					$this->country_name = (string)$this->country_name[0];
					$this->country_iso = $xml->xpath("//gml:featureMember//countryAbbrev");
					$this->country_iso = (string)$this->country_iso[0];
					return true;
				}
			}
		}
			
		$this->country_iso = "XX"; #country not found
		return false;
	}
}
?>
