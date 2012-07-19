<?php
	class AutoInit  {
		private $class;
		private $method;
		private $class_methods;
		private $instance;
		private $args;
		private $instances = array();
		private $load;
		
		public function __construct ( $class ) {
			if ( !empty ( $class ) ) {
				$this->class = $class;	
				if ( $this->_checkClass() )
					return true;
			}
			return false;
		}
		
		/**
		 * Selecciona el m�todo al que llamaremos
		 */
		public function setMethod ( $method ) {
			if ( !empty ( $method ) ) {
				$this->method = $method;
				if ( $this->_foundMethod() ) {
					return true;
				}
			}
			return false;
		}
		
		/**
		 * A�adimos los argumentos que pueda necesitar el m�todo
		 */
		public function setArgs(&$arr) {
			if ( is_array ( $arr ) && !empty ( $arr ) )
				$this->args = $arr;
		}
		
		/**
		 * Inicializamos la instancia
		 */
		public function startInstance() {
			$this->_init();
		}
		
		/**
		 * Crea la instancia, y llama al m��odo necesario.
		 * Tambi�n permite ejecutar una acci�n antes y despu�s de la llamada, creando los m�todos
		 * _before_m�todo : Para realizar alguna acci�n antes de ejecutarse
		 * _after_m�todo : Para realizar alguna acci�n despu�s de ejecutarse
		 */
		private function _init() {
			$class = new ReflectionMethod($this->class, $this->method);
			if ( $class->isPublic() /*&& !strpos ( "ajax_", $this->method )*/ ) {
				$this->instance = new $this->class();

				// set _logged_name for action must be user logged in
				if ( $this->_foundMethod('_logged_'.$this->method ) ) {
					$current_user = get_user_logged_in();
					if ( !$current_user ) {
						$this->instance->{'_logged_'.$this->method}();
					}
				}

				// Comprueba si se debe realizar una acci�n antes de la acci�n principal
				if ( $this->_foundMethod ( '_before_'.$this->method ) ) {
					// lo ejecutamos
					$this->instance->{'_before_'.$this->method}();
				}
				
				$this->instance->{$this->method}((!empty($this->args)?$this->args:""));
				
				// Comprueba si se debe hacer algo al terminar
				if ( $this->_foundMethod ( '_after_'.$this->method ) ) {
					//lo ejecutamos
					$this->instance->{'_after_'.$this->method}();
				}
			}
		}
		
		/**
		 * Comprueba que la clase exista, y guarda los m�todos existentes de esa clase
		 */
		private function _checkClass() {
			if ( class_exists( $this->class ) ) {
				try {
					$_class = new ReflectionClass($this->class);
					$this->class_methods = $_class->getMethods();
					return true;
				} catch (  ReflectionException  $e ) {
					echo $e;
					return false;
				}
			}
			return false;
		}
		
		/**
		 * Comprueba que el m�todo exista
		 */
		private function _foundMethod( $method ) {
			/*
			 * comprueba si se le pasa un m�todo pro par�metro o no
			 */
			if ( empty ( $method ) ) {
				$method = $this->method;
			}
			
			// Comprueba su existencia
			for ( $i = 0; $i < count ( $this->class_methods ); $i++ )
				if ( $method == $this->class_methods[$i]->name )
					return true;
			return false;
		}
	}
?>