<?php

class Factory {
	/**
	 * Required collection of files that MUST be included when
	 * this object is initialized.
	 *
	 * @var        string array
	 * @access    private
	 */
	private $required = array("validation.php", "load_helper.php", "static_cache.php" );
	
	/**
	 * The base path to search for source files
	 *
	 * @var        string
	 * @access    private
	 */
	private $base_search_dir = SYSTEM_PATH;
	
	/**
	 * A list of libraries or files to ignore.
	 *
	 * @var        string array
	 * @access    private
	 */
	private $ignore = array(".", "..", "simpletest", "tests", "configs", ".cache", "haanga", ".settings", "branches","tags", "trunk", "static", "errors", "zend", "nodejs" );
	
	/**
	 * A list of libraries already loaded.
	 *
	 * @var        string array
	 * @access    public
	 */
	public $loaded = array();
	
	/**
	 * Temporary cross-recursive-function storage.
	 *
	 * @var        string array
	 * @access    private
	 */
	private $found_tmp;
	
	/**
	 * Directory
	 *
	 * @var        string array
	 * @access    private
	 */
	private $directory;
	
	/**
	 * Extensions to look for on files.
	 *
	 * @var        string array
	 * @access    private
	 */
	private $extensions = array(".class.php", ".inc", ".class.inc", ".php");
	
	/**
	 * PHP 5 constructor
	 *
	 * Loads the required libraries on initialization
	 *
	 * @access    public
	 */
	public function __construct() {
		$this->buildList( $this->base_search_dir);
		foreach ($this->required as $file_to_load) {
			$this->loadFile($file_to_load);
		}
	}
	
	/**
	 * PHP 3,4 constructor
	 *
	 * Points to __constructor()
	 *
	 * @access    public
	 */
	public function Factory() {
		$this->__construct();
	}
	
	/**
	 * Locates and loads a file on request
	 *
	 * @param    string $file
	 * @param    string $essential=true
	 * @access    public
	 */
	public function loadFile($file, $essential = true) {
		$this->found_tmp = array();
		//$files = $this->locateFile($file, ROOT . $this->base_search_dir);
		$path = $this->directory[$file];
		
		if ($path) {
			require_once($path . $file);
			$this->loaded[] = array("Name" => $file, "Path" => $path);
			return $path;
		} else {
			if ($essential) {
				if (function_exists(errorHandler)) {
					/*errorHandler(E_USER_ERROR, "Failed to load required library: ". $file ."<br/>",
					 "factory.class.php", 131);*/
					echo "error...";
				} else {
					die("Ciritcal failure: Could not find ". $file ." or the error logger<br />");
				}
			} else {
				return false;
			}
		}
	}
	
	/**
	 * Constructs possible files names
	 *
	 * @param    string $base
	 * @access    public
	 */
	public function constructFilenames($base) {
		foreach ($this->extensions as $extension) {
			$extensions[] = strtolower($base) . $extension;
		}
		return $extensions;
	}
	
	public function buildList($dir="") {
		// Add a / if required
		if($dir && substr($dir, -1) != "/")
			$dir .= "/";
		
		if ($directory_handle = opendir($dir)) {
			while(($file_handle = readdir($directory_handle)) !== false) {
				$file_handle = strtolower($file_handle);
				if (in_array(strtolower($file_handle), $this->ignore)) {
				} else if (is_dir($dir . $file_handle)) {
					$this->buildList($dir . $file_handle);
				} else {
					foreach ($this->extensions as $extension) {
						if (strpos($file_handle, $extension) !== false) {
							$this->directory[$file_handle] = $dir;
						}
					}
					reset($this->extensions);
				}
			}
		}
	}
}


$factory = new Factory();
/**
 * Overloading the default __autoload function
 *
 * @param    string $class
 */
function __autoload($class) {
	global $factory, $timer;
	static $filenames;
	
	$filenames = $factory->constructFilenames($class);
	
	$loaded = false;
	foreach ($filenames as $filename) {
		$loaded = $factory->loadFile($filename, false);
		
		if ($loaded)
			break;
	}
}
?>