<?php
	class URI {
		private $_url_queries;
		private $_rewrite_true_separator = '/';
		private $_rewrite_active = false;
		private $_controller_name = "";
		private $_action_name = "";
		private $_params = array();
		private $_detect_auto_mod_rewrite = AUTODETECT_MOD_REWRITE; /* detect automatically if modrewrite has been loaded */
		private $_segments = array();
		private $_id;
		
		public function __construct() {
			global $_config;

			$this->_url_queries = $_SERVER['QUERY_STRING'];
			if ( $this->_detect_auto_mod_rewrite ) {
				if ( apache_is_module_loaded('mod_rewrite') ) {
					$this->_rewrite_active = true;
				} else {
					$this->_rewrite_active = false;
				}
			} else { 
				$this->_rewrite_active = $_config['rewrite'];
			}
		}
		
		/**
		 * Return actual uri
		 */
		public function getURI() {
			return $this->_url_queries;
		}
		
		/*
		 * Convert address to controller, action and params
		 */
		public function convertURI() {			
			if ( $this->_rewrite_active ) {
				//Use rewrite module to parse url
				$this->_convertRewriteTrue();
			} else
				$this->_convertRewriteFalse();
		}
		
		/*
		 * Return controller name
		 */
		public function getController() {
			global $_config;
			
			if ( empty ( $this->_controller_name ) )
				return $_config['base_controller'];
			else return $this->_controller_name;
		}
		
		/*
		 * Return action name
		 */
		public function getAction() {
			global $_config;
			
			if ( empty ( $this->_action_name ) )
				return $_config['base_action'];
			else return $this->_action_name;
		}
		
		/*
		 * Return array with all params
		 */
		public function getParams() {
			if ( empty ( $this->_params ) )
				return null;
			else return $this->_params;
		}
		
		/**
		 * Return id if is the first param
		 */
		public function getID() {
			if (empty($this->_id)) {
				$params = $this->getParams();
				if ( !empty ( $params ) ) {
					return $params[0];
				}	
			}
			
			return $this->_id;
		}
		
		/**
		 * Return de URI Segment selected
		 *
		 * @param unknown_type $num
		 * @return unknown
		 */
		public function getURISegment ( $num ) {
			if ( is_int ( $num ) ) {
				if ( $num <= count ( $this->_segments ) )
					return $this->_segments[$num];
			}
			return null;
		}
		
		/**
		 * Redirect to another page
		 */
		public function redirect ( $controller, $action = "", $args ) {
			$_url = $this->setLink ( $controller, $action, $args );
			if ( $_url != null ) {
				header ( "Location: " . $_url );
			}
		}
		
		/**
		 * Create link with params (with mod_rewrite and with url params)
		 */
		public function setLink ( $controller, $action, $args = array() ) {
			global $_config;
			// translate controller
			if ( !empty ( $_config['controller_trans'] ) ) {
				foreach ( $_config['controller_trans'] as $key => $value ) {
					if ( $controller == $value ) {
						$controller = $key;
						break;
					}
				}
			}
			
			// translate action
			if ( !empty ( $_config['action_trans'] ) ) {
				foreach ( $_config['action_trans'] as $key => $value ) {
					if ( $action == $value ) {
						$action = $key;
						break;
					}
				}
			}			
			
			/**
			 * translate controller and action
			 */
			if ( $this->_rewrite_active ) {
				// links like: domain.com/action/controller/param1/param2
				return $this->_createNiceLink ( $controller, $action,"",$args );
			} else {
				// links like: domain.com?_a=action&_c=controller&_p1=test
				return $this->_createLink ( $controller, $action, $args );
			}
		}
		
		/**
		 * Create link with mod_rewrite active
		 */
		private function _createNiceLink ( $controller, $action, $id = "", $args = array() ) {
			global $_config;
			
			if ( SUBDOMAINS_ACTIVE ) {
				$subdomain = strtolower(get_user_city());
				if (!empty ( $subdomain ) ) {
					$_config['base_url'] = "http://".$subdomain.".".DOMAIN_BASE."/";
				}
			}
			
			/*
			 * Set personalized id
			 */
			if ( !empty ( $id ) ) {
				$this->_id = $id;
			}
			
			if ( !empty ( $controller ) ) {
				if ( !empty ( $this->_id ) ) {
					$_link = $_config['base_url'];
					if ( in_array ( $id, $_config['first_params_allowed_names'] ) ) {
						$_link = $_config['base_url'].$this->_id."/";
					} 
				} else {
					$_link = $_config['base_url'];
				}
				
				$_link = $_link.$controller."/";
				
				// Check if exists controller
				if ( !empty ( $action ) ) {
					$_link = $_link.$action."/";
				}
				
				// Check if exists extra params
				if ( is_array ( $args ) ) {
					foreach ( $args as $key => $value ) {
						$_link = $_link.$key."/";
						if ( !empty ( $value ) ) {
							$_link = $_link.$value."/";
						}
					}
				} else {
					if ( !empty ( $args ) ) {
						$_link .= $args."/";
					}
				}
				
				return $_link;
			}
			
			return null;
		}
		
		/**
		 * Cretae link with mod_rewrite deactivated
		 */
		private function _createLink ( $controller, $action, $args = array() ) {
			global $_config;
			
			if ( !empty ( $controller ) ) {
				$_link = $_config['base_url']."?_c=$controler";
				
				// check for controller
				if ( !empty ( $action ) ) {
					$_link = $_link."&_a=$action";
				}
				
				// check for extra params like: array ( "id" => 5, "name" => "sergio" );
				if ( !empty ( $args ) && is_array ( $args ) ) {
					foreach ( $args as $key => $value ) {
						$_link = $_link."&".$key."=".$value;
					}
				}
				
				return $_link;
			}
			
			return null;
		}

		public function getFirstArg() {
			return $this->_firstArg;
		}
		
		/*
		 * Get values from modrewrite url
		 * Pattern: controller/action/arg1/arg2
		 */
		private function _convertRewriteTrue() {
			global $_config;
			
			$real_parts = explode("&", $this->_url_queries );
			$parts = explode($this->_rewrite_true_separator, $real_parts[0] );
			$num = count ( $parts );
			if ( $num < 2 ) {
				$this->_controller_name = $_config['base_controller'];
				$this->_action_name = $_config['base_action'];
			} else {
				// comprueb asi el primer parametro es un valor o no
				if ( !FIRST_PARAM_IS_ACTION ) {
					$_select_items = 1; // sube a 1 la selecci�n del controllador y acci�n
					$this->_id = $parts[1];
				} else {
					$this->_firstArg = $parts[1];
					if ( in_array($this->_firstArg, $_config['first_params_allowed_names']) ) {
						$_select_items = 1;
						$this->_id = $parts[count($parts)-1];
					} else {
						$this->_id = $parts[3];
						$_select_items = 0;
					}
				}
				
				$this->_controller_name = (isset ( $parts[1+$_select_items])) ? $parts[1+$_select_items] : $_config['base_controller'];
				$this->_segments[0] = $this->_controller_name;
				$this->_action_name = ( isset ( $parts[2+$_select_items] ) ) ? $parts[2+$_select_items] : $_config['base_action'];
				$this->_segments[1] = $this->_action_name;
				if ( $num > 2 ) {
					for ( $i = 3, $o = 0; $i < $num; $i++, $o++ ) {
						$this->_params[$o] = $parts[$i];
						$this->_segments[$i-1] = $parts[$i];
					}
				}
			}
			
			/**
			 * Get parts of get request.
			 */
			$numParts = count($real_parts);
			for ( $i = 1; $i < $numParts; $i++ ) {
				if ( !empty ( $real_parts[$i] ) ) {
					$subParts = explode("=", $real_parts[$i]);
					$_GET[$subParts[0]] = $subParts[1];
				}
			}
		}
		
		/*
		 * Get values from normal query string
		 * Pattern: _c=3&_a=2&_id=23
		 */
		private function _convertRewriteFalse() {
			global $_config;
			
			$parts = explode ( "&", $this->_url_queries );
			$num = count ( $parts );
			if ( $num < 2 ) {
				$this->_controller_name = $_config['base_controller'];
				$this->_action_name = $_config['base_action'];
			} else {
				$part = explode ( "=", $parts[0] );
				$this->_controller_name = ( isset ( $part[1] ) ) ? $part[1] : $_config['base_controller'];
				$this->_segments[0] = $this->_controller_name;
				$part = explode ( "=", $parts[1] );
				$this->_action_name = ( isset ( $part[1] ) ) ? $part[1] : $_config['base_action'];
				$this->_segments[1] = $this->_action_name;
				// get rest of params
				for ( $i = 2, $o = 0; $i < $num; $i++, $o++ ) {
					$part = explode ( "=", $parts[$i] );
					$this->_params[$o] = $part[1];
					$this->_segments[$i] = $part[1];
				}
			}
		}
	}
?>