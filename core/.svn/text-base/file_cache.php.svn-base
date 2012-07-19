<?php
class File_Cache {
	private 	$cache_name;
	private 	$cache_live;
	private 	$cache_path;
	private		$cache_buffer;
	static		$instance;
	
	public function __construct() {}
	public function __clone() {}
	
	public function getInstance() {
		if ( !isset ( self::$instance ) ) {
			$class = __CLASS__;
			self::$instance = new $class;
		}
		
		return self::$instance;
	}
	
	/**
	 * Save the cache file
	 * @param unknown_type $buffer
	 * @param unknown_type $live
	 */
	public function saveCache ( $buffer ) {
		if ( empty ( $buffer ) ) {
			throw new Exception ( _('Ops... stream to save is empty!') );
		}
		
		$this->cache_buffer = $buffer;
		
		// we have right now the stream to save into cache and his time live.
		$this->saveFileCache();
	}
	
	/**
	 * Return the cache buffer if cache exists
	 * @return string
	 */
	public function getCache() {
		$file = $this->cache_path . md5($this->cache_name);
		if ( file_exists ( $file ) ) {
			return file_get_contents ( $file );
		}
		
		throw new Exception ( "Impossible retrive cache file content!" ); 
	}
	
	/**
	 * Look if exists a fresh cache for this item, if not exists create it please!
	 */
	public function isCacheable() {
		$file = $this->cache_path . md5($this->cache_name);
		if ( file_exists( $file ) ) {
			// check if is a fresh cache
			if ( ( time() - filemtime ( $file ) ) < $this->cache_live ) {
				return false;
			}
		}
		
		return true;
	}
	
	/**
	 * Set the cache configuration
	 * @param unknown_type $name
	 * @param unknown_type $path
	 */
	public function setCache ( $name, $time = 3600, $path = "" ) {
		if ( empty ( $path ) ) {
			// set default path
			$this->cache_path = CACHE_PATH_FC;
		}
		
		if ( $time < 0 ) {
			$time = 3600;
		}
		
		$this->cache_live = $time;
		
		if ( !empty ( $name ) ) {
			$this->cache_name = $name;
		} else {
			throw new Exception ( _('Please set a cache name, please!' ) );
		}
		
		return true;
	}
	
	/**
	 * Save file with cache content
	 */
	private function saveFileCache () {
		if ( is_writable ( $this->cache_path ) ) {
			if ( !empty ( $this->cache_buffer ) ) {
				$file = $this->cache_path . md5($this->cache_name);
				file_put_contents( $file, $this->cache_buffer );
			}
		} else {
			throw new Exception ( "Cache path is not writable!" );
		}
	}
}
?>