<?php
	/**
	 * Load one or more models
	 */
	function loadModel ( $model, $args="" ) {
		// Static cache of objects that has been loaded.
		static $_models_loaded = array();
		
		$className = ucwords ( $model ) . "_Model";
		
		// check if object has been loaded
		if ( !isset ( $_models_loaded[$className] ) ) {
			// check if class exists
			if ( class_exists( $className ) ) {
				//create the new object and merge to array
				$_models_loaded[$className] = new $className($args);
				return $_models_loaded[$className];
			}
		} else {
			//print_r ( $_models_loaded );
			$_models_loaded[$className];
			return new $className($args);
		}

	}
	
	/**
	 * Load one or more controllers
	 */
	function loadController ( $controller ) {
		// Static cache of objects that has been loaded.
		static $_controllers_loaded = array();
		
		$className = ucwords ( $controller ) . "_Controller";
		
		// check if object has been loaded
		if ( !isset ( $_controllers_loaded[$className] ) ) {
			// check if class exists
			if ( class_exists( $className ) ) {
				//create the new object and merge to array
				$_controllers_loaded[$className] = new $className($controller);
				return $_controllers_loaded[$className];
			}
		}
		
		return null;
	} 
	
	/**
	 * Load one or more classes
	 * 
	 * @param array $arrClasses
	 * @return object
	 */
	function loadClasses ( $arrClasses ) {
		$_objects = null;
		
		foreach ( $arrClasses as $key => $value )
			 $_objects = loadClass($value);
			 
		return $_objects;
	}
	
	/**
	 * Load and initilizate objets with Singleton pattern
	 *
	 * @param string $className
	 * @param array $args
	 * @return array object
	 */
	function loadClass ( $className, $args="", $obj = false ) {	
		// Static cache of objects that has been loaded.
		static $_objects_loaded = array();
		
		// check if object has been loaded
		if ( !isset ( $_objects_loaded[$className] ) ) {
			// check if class exists
			if ( class_exists( $className ) ) {
				//create the new object and merge to array
				$_objects_loaded[$className] = new $className($args);
				if ( $obj ) {
					return $_objects_loaded[$className];
				}
			}
		}
		
		return $_objects_loaded;
	}
	
	/**
	 * Load array with zend modules
	 * @param $arr
	 */
	function ZendLoadModules($arr) {
		if ( !empty ( $arr ) ) {
			$numItems = count($arr);
			for ( $i = 0; $i < $numItems; $i++ ) {
				ZendLoad($arr[$i]);
			}
		}
	}
	
	/**
	 * Include zend items
	 * @param $module
	 */
	function ZendLoad( $module ) {
		$file = CORE_PATH.SEPARATOR."Zend".SEPARATOR.$module.".php";

		if ( file_exists ( $file ) ) {
			require_once ( $file );
			return true;
		}
		
		return false;
	}
?>