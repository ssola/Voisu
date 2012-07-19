<?php
	include_once ( "validation.class.php");
	
	class Validation extends valid {
		private $_elements = array();
		private $_values = array();
		private $_errors = array();
		private $_valid_elements = array ( "max_length", "min_length", "empty", "number", "email", "isAlpha", "isAlphaNumeric", "isDate" );
		
		/**
		 * @param unknown_type $array
		 */
		public function __construct () {}
		
		/**
		 * Pasamos los parametros a comprobar
		 *
		 * @param unknown_type $array
		 */
		public function setElements( &$model, &$values ) {
			if ( is_array ( $model ) && !empty ( $model ) && is_array ( $values ) && !empty ( $values ) ) {
				$this->_elements = $model;	
				$this->_values = $values;
			} else $this->_setError("Array de validaction vacia!");
		}
		
		/**
		 * Elemento por elemento vamos comprobando que se cumplan todos los parametros pasados
		 *
		 * @return unknown
		 */
		public function Validate() {
			foreach ( $this->_values as $key => $value ) {
				if ( ( $num = $this->_foundInModel($key) ) >= 0 ) {
					if ( !empty ( $this->_elements[$num]['validation'] ) ) {
						foreach ( $this->_elements[$num]['validation'] as $_key => $_value ) {
							$this->_validateElement($_key, $key, $value, $_value, $msg = $this->_elements[$num]['msg'] );
						}
					}
				}
			}
			

			if ( empty ( $this->_errors ) ) {
				return true;
			} else return false;
		}
		
		/**
		 * Comprueba que el elemento este en el modelo!
		 *
		 * @param unknown_type $field
		 * @return unknown
		 */
		private function _foundInModel ( $field ) {
			for ( $i = 0; $i < count ( $this->_elements ); $i++ ) {
				if ( $field == $this->_elements[$i]['field'] )
					return $i;
			}
			return -1;
		}
		
		/**
		 * Valida cada elementos para comprobar que son validos
		 *
		 * @param unknown_type $toDo     - accion a comprobar
		 * @param unknown_type $field    - nombre del campo
		 * @param unknown_type $f_value  - valor real del campo
		 * @param unknown_type $v_value  - valor para comprobacion, ejemplo max_lenght = 5
		 * @return unknown
		 */
		private function _validateElement ( $toDo, $field, $f_value, $v_value="", $msg = "" ) {
			if ( !empty ( $toDo ) ) {
				switch ( $toDo ) {
					case 'date':
							if (strtotime($f_value) != false)
								return true;
							else $this->_setError($msg, $field);
						break;
					case 'compare':
						if ($f_value == $v_value)
							return true;
						else $this->_setError($msg, $field);
						break;
					case 'max_length':
							if ( parent::isTooLong($f_value, $v_value ) )
								return true;
							else $this->_setError($msg, $field);
						break;
					case 'min_length':
							if ( parent::isTooShort($f_value, $v_value) )
								return true;
							else $this->_setError($msg, $field);
						break;
					case 'empty':
							if ( !parent::isEmpty($f_value) )
								return true;
							else  { $this->_setError ($msg, $field ); }
						break;
					case 'number':
							if (parent::isNumber($f_value) ) 
								return true;
							else $this->_setError($msg, $field);
						break;
					case 'email':
							if ( parent::isEmail($f_value) )
								return true;
							else $this->_setError($msg, $field);
						break;
					case 'isAlpha':
							if ( parent::isAlpha($f_value) )
								return true;
							else $this->_setError($msg, $field);
						break;
					case 'isAlphaNumeric':
							if ( parent::isAlphaNumeric($f_value ) )
								return true;
							else $this->_setError($msg, $field);
						break;
					case 'isDate':
							if ( parent::isDate($f_value) )
								return true;
							else $this->_setError($msg, $field);
						break;
				}
			}
		}
		
		private function _setError ( $msg, $field ) {
			if ( !empty ( $msg ) ) {
				$this->_errors[$field] = $msg;
			}
		}
		
		public function getErrors() {
			return $this->_errors;
		}
	}
	
/*
		$array = array();
		$arr = array ( "field" => "password",
				   "validation" => array (
									"min_length" => 5,
									"max_length" => 30,
									"empty" => ""
								) 
				);			
		array_push ( $array, $arr );
				$arr = array ( "field" => "email",
				   "validation" => array (
									"empty" => "",
									"email" => ""
								) 
				);			
		array_push ( $array, $arr );
				$arr = array ( "field" => "edad",
				   "validation" => array (
									"isNumber" => ""
								) 
				);			
		array_push ( $array, $arr );
		
		$values = array ( "password" => "pa", "email" => "sergio@bemedia.es", "edad" => 10 );
		
		$val = new Validation();
		$val->setElements($array, $values);
		
		if ( $val->Validate() ) {
			echo "Todo OK";
		} else { echo "No todo ok..."; $val->showErrors(); };
*/