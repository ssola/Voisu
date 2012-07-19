<?php 
class Scrapper {
	private static $instance;
	private static $db;
	
	public function __construct() {}
	public function __clone() {}
	
	public function getInstance() {
		if (!isset(self::$instance)) {
			$class = __CLASS__;
			self::$instance = new $class;
		}
		
		return self::$instance;
	}
	
	public function start($type) {
		global $_load, $_config;
		
		// get providers from version country.
		self::$db = (object)loadClass("Model");
		$sql = sprintf("select * from providers p, cities c where p.city_id = c.id and c.country = '%s' and p.type_provider = '%s'",
													$_config['version_name'], $type);
		
		$providers = self::$db->Model->findByQuery(sprintf("select * from providers p, cities c where p.city_id = c.id and c.country = '%s' and p.type_provider = '%s'",
													$_config['version_name'], $type));
													
		foreach($providers as $provider) {
			// load scrapper for this provider
			$provider_name = $provider->provider;
			$provider_id = $provider->id;
			$scrapper = (object)loadClass($provider_name);
			$scrapper->$provider_name->setProvider($provider_id);
			$scrapper->$provider_name->start($provider);
		}
	}
}
?>