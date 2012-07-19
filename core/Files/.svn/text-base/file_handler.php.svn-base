<?php
class File_Handler implements Files_Handler {
	private static $path;
	private static $max_size;
	private static $instance;
	protected $settings;
	public $test = "aaa";
	
	public final function __construct(){}
	public final function __clone() {}
	
	public final function getInstance() {
		if ( !isset ( self::$instance ) ) {
			$class = __CLASS__;
			self::$instance = new $class;
		}
		
		return self::$instance;
	}
	
	/**
	 * $connect =
	 * 	path = path to uplad image (string)
	 * 	max_size = max size for the file (int)
	 * 	file_types = extensions allowed (array)
	 * @see core/Files/Files_Handler::connect()
	 */
	public final function connect( $arr ) {
		$default = array(
			"max_size" => 1024, //kbs
			"file_types" => array(
				"jpg",
				"gif",
				"png"
			)
		);
		
		$settings = array_merge($arr, $default);
		
		if ( is_array($settings) ) {
			$this->settings = $settings;
			return true;
		} else {
			throw new Files_Error_Handler("Error setting the settings");
		}
		
		return false;
	}
	
	/**
	 * set file path, and file id
	 * @see core/Files/Files_Handler::add()
	 */
	public final function add( $file, $validate="" ) {
		if (!empty ( $file ) ) {
			if ( $this->validate($file, $validate) ) {
				if ( is_readable($this->settings['path']) ) {
					$img_path = $this->settings['path']."/".str_replace("-","",$file->name);
					if ( move_uploaded_file($file->tmp_name, $img_path) ) {
						return true;
					} else {
						throw new Files_Error_Handler("Impossible to upload file");
					}
				} else {
					throw new Files_Error_Handler("Path {{$this->settings['path']}} is not readable");
				}
			}
		}
		
		return false;
	}
	
	/**
	 * set new folder with grant permissions
	 * @see core/Files/Files_Handler::get()
	 */
	public final function addBucket($path, $options="") {
		if ( !empty( $path ) ) {
			if (is_dir($path) ) {
				return true;
			} else {
				if ( mkdir($path, 0777, true) ) {
					if (!empty($options) && is_array($options) ) {
						// do something!
						$this->path = $path;
					}
					
					return true;
				} else {
					throw new Files_Error_Handler("Impossible to create $path directory");
				}
			}
		}
		
		return false;
	}	
	
	public final function get( $path ) {
		if ( !empty ( $path ) ) {
			if ( file_exists($path) ) {
				return file_get_contents($path);		
			} else {
				throw new Files_Error_Handler("File not exists!");
			}
		}
	}
	
	public final function delete( $path ) {
		if (!empty($path)) {
			if (file_exists($path)) {
				// try to delete this file, remember to delete from db too!!
			}
		}
	}
	
	public function validate($file, $validation) {
		if ( $file->size < ($validation['maxSize']*1024) && in_array($file->type, $validation['valid'])) {
			return true;
		} else {
			return false;
		}
	}
}
?>