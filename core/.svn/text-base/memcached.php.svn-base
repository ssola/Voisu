<?php
if ( class_exists ( 'Memcache' ) ) {
	/**
	 * Wrapper for Memcache, v. 0.3
	 *
	 * By Jiri Kupiainen (http://jirikupiainen.com/)
	 *
	 * You are free to do whatever you please with this code. Enjoy.
	 */
	class Memcached {
		var $_connected = false;
		var $_Memcache = null;
		
		var $servers = array('127.0.0.1:11211'); // you can add more servers by adding their hostname and port to this array. if port is default (11211), it can be omitted.
		
		function __construct() {
			global $_config;
			
			$this->servers = $_config['memcached_servers'];
		}
		
		/**
		 * Connect to the memcached server(s)
		 */
		function connect() {
			if ( MEMCACHE_ENABLED ) {
				$this->_Memcache = new Memcache();
				
				// several servers - use addServer
				foreach ($this->servers as $server) {
					$parts = explode(':', $server);
					
					$host = $parts[0];
					$port = $parts[1]; // default port
					
					if ($this->_Memcache->addServer($host, $port)) {
						$this->_connected = true;
					} else {
						echo "No se conecto";
					}
				}
				
				return $this->_connected;
			} else {
				return false;
			}
		}
		
		/**
		 * Set a value in the cache
		 *
		 * Expiration time is one hour if not set
		 */
		function set($key, $var, $expires = 3600) {
			if (!is_numeric($expires)) {
				$expires = strtotime($expires);
			}
			if ($expires < 1) {
				$expires = 1; // don't allow caching infinitely
			}
			
			return $this->_Memcache->set($key, $var, 0, time()+$expires);
		}
		
		/**
		 * Get a value from cache
		 */
		function get($key) {
			if ( MEMCACHE_ENABLED ) {
				return $this->_Memcache->get($key);
			}
			
			return null;
		}
		
		/**
		 * Remove value from cache
		 */
		function delete($key) {
			return $this->_Memcache->delete($key);
		}
	}
} else {
	//echo "<!-- Instalar memcache -->";	
}
?> 