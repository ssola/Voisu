<?php
/**
 * Model class using ORM design pattern to get / delete / add information to the DB. Currently just works with MySQL DB.
 * @author Sergio Sola <yo@sergiosola.com>
 */
	include_once ( "db.php" );
	
	class Model {
		/**
		 * The name of the table to map
		 * @var string
		 */
		private $_table;
		private $_primary_key;
		private $_fields = array();
		public $_db;
		private $_results = 0;
		private $_select;
		private $_limit;
		private $_order;
		private $_has_one = array();
		private $_where;
		public 	$current_user;
		
		public function __construct ( $table = "" ) {
			global $db;
			
			$this->current_user = get_user_logged_in();

			if ( $db != null ) {
				$this->_db = $db;
			} else return false;
			
			if ( !empty ( $table ) ) {
				$this->_table = $table;
				if ( !$this->_getRows() ) {
					return false;
				}
			}
			
			return false;
		}
		
		/**
		 * Set order of the query
		 */
		public function setOrder ( $order ) {
			if ( !empty ( $order ) )
				$this->_order = $order;
		}
		
		/**
		 * Set where condition
		 *  Conditions like:
		 * 		array("table" => "", "value" => ", "operation" => "=" )
		 */
		public function setWhere ( &$conditions ) {
			if ( !empty ( $conditions ) && is_array ( $conditions ) ) {
				$where = " and 1 = 1 ";
				foreach ( $conditions as $key => $value ) {
					$where .= " and {$value['field']} {$value['operation']} '{$value['value']}' ";
				}
			}
			
			$this->_where = $where;
		}
		
		/**
		 * Set limits of the query
		 */
		public function setLimit ( $limit ) {
			if ( !empty ( $limit ) ) {
				$this->_limit = $limit;
			}
		}
		
		/**
		 * Elimina un registro por la llave primaria
		 *
		 * @param unknown_type $id
		 * @return unknown
		 */
		public function delete ( $id ) {
			if ( !empty ( $id ) ) {
				$sql = sprintf ( "delete from %s where %s = %d", $this->_table, $this->_primary_key, intval ( $id ) );
				if ( $this->_db->query ( $sql ) )
					return true;
			}
			return false;
		}
		
		/**
		 * Actualiza un registro por su llave primaria
		 *
		 * @param unknown_type $elements
		 * @param unknown_type $id
		 */
		public function update ( &$elements, $id ) {
			if ( is_array ( $elements ) && !empty ( $elements ) && !empty ( $id ) ) {
				if ( $this->_checkElements( $elements ) ) {
					$set = ""; $num = count ( $elements ); $i++;
					foreach ( $elements as $key => $value ) {
						$value = ( $this->_putQuotes($value) )  ? "'$value'" : $value;
						$set .= "$key = $value"; if ( $i < $num ) $set .=",";
						$i++;
					}
					$sql = "update $this->_table set $set where $this->_primary_key = $id";
					if ( $this->_db->query ( $sql ) ) 
						return true;
				}
			}
			return false;
		}
		
		/**
		 * Guardar un nuevo registro en la tabla
		 *
		 * @param unknown_type $elements
		 * @return unknown
		 */
		public function save ( &$elements = array() ) {
			if ( is_array ( $elements ) && !empty ( $elements ) ) {
				if ( $this->_checkElements($elements) ) {
					//todo esta Ok, podemos crear la consulta
					$fields = ""; $values = ""; $num = count ( $elements ); $i = 0;
					foreach ( $elements as $key => $value ) {
						$value = mysql_real_escape_string($value);
						$fields .= "$key"; if ( $i < $num-1 ) $fields .=",";
						$values .= ( $this->_putQuotes($value) )  ? "'$value'" : $value; if ( $i < $num-1 ) $values .=",";
						$i++;
					}
					$sql = "insert into $this->_table ($fields) values ($values)";

					if ( $this->_db->query ( $sql ) ){
						return $this->_db->insert_id;
					}
				} else {
					echo "Imposible realizar la consulta, un campo no existe en la tabla $this->_table";
				}
			}
			
			return false;
		}
		
		/**
		 * Is like insert but replacing
		 */
			public function replace ( &$elements = array() ) {
			if ( is_array ( $elements ) && !empty ( $elements ) ) {
				if ( $this->_checkElements($elements) ) {
					//todo esta Ok, podemos crear la consulta
					$fields = ""; $values = ""; $num = count ( $elements ); $i = 0;
					foreach ( $elements as $key => $value ) {
						$value = ( $this->_putQuotes($value) )  ? "'$value'" : $value;
						$fields .= "$key = " . $value; if ( $i < $num-1 ) $fields .=",";
						$i++;
					}
					$sql = "replace into $this->_table set $fields";
					if ( $this->_db->query ( $sql ) )
						return $this->_db->insert_id;
				} else {
					echo "Imposible realizar la consulta, un campo no existe en la tabla $this->_table";
				}
			}
			
			return false;
		}		
		
		/*
		 * Coge todos los resultados, como parametro se le envia las opciones como:
		 * array ( "id=5", "name='Sergio'", "order desc" )
		 */
		public function findAll ( &$options = array() ) {	
			if ( is_array ( $options ) && !empty ( $options ) ) {
				$where = " where "; $i = 0; $num = count ( $options );
				foreach ( $options as $key => $value ) {
					$value = ($this->_putQuotes($value) ) ? "'$value'" : $value;
					$where .= " $key = $value ";
					if ($i < $num-1) $where .= " and "; $i++;
				}
			}
			
			$part_query = $this->_buildPartQuery();
			
			$sql = "select * from $this->_table $where $part_query";
			$results = $this->_db->get_results ( $sql );
			if ( ( $this->_results = $this->_db->num_rows ) > 0 )
				return $results;
			else return null;
		}
		
		/**
		 * Devuelve un conjunto de objetos por una consulta
		 *
		 * @param unknown_type $sql
		 * @return unknown
		 */
		public function findByQuery ( $sql ) {
			if ( !empty ( $sql ) ) {
				$results = $this->_db->get_results ( $sql );
				if ( ( $this->_results = $this->_db->num_rows ) > 0 )
					return $results;
			}
			return null;
		}
		
		/**
		 * Realiza una consulta personalizada
		 *
		 * @param unknown_type $sql
		 * @return unknown
		 */
		public function query ( $sql ) {
			if ( !empty ( $sql ) ) {
				if ( $this->_db->query ( $sql ) )
					return true;
			}
			return false;
		}
		
		/**
		 * Coge un elemento de la tabla seleccionada por su clave primaria
		 *
		 * @param unknown_type $value
		 * @return unknown
		 */
		public function findByPrimary ( $value ) {
			if ( !empty ( $value ) && !empty ( $this->_primary_key ) ) {
				$part_query = $this->_buildPartQuery();
				$sql = sprintf ("SELECT * FROM %s where %s = %d %s", $this->_table, $this->_primary_key, intval($value), $part_query );
			}
			
			if ( !empty ( $sql ) ) {
				$result = $this->_db->get_row ( $sql );
				if ( ( $this->_results = $this->_db->num_rows ) > 0 )
					return $result;
			}
			
			return null;
		}
		
		/**
		 * Busca por un campo de la tabla especfico.
		 */
		public function findByKey ( $key, $value ) {
			if ( !empty ( $key ) && !empty ( $value ) ) {
				$part_query = $this->_buildPartQuery();
				$sql = sprintf ( "SELECT * FROM %s WHERE %s = '%s' %s", $this->_table, $key, $value, $part_query );
				$results = $this->_db->get_results ( $sql );
				if ( ( $this->_results = $this->_db->num_rows ) > 0 ) {
					return $results;
				}
			}
			
			return null;
		}
		
		/**
		 * Devuelve el n�mero de resultados de una consulta
		 */
		public function getNumResults() {
			return $this->_results;
		}
		
		/**
		 * crea los atributos del select
		 */
		public function select ( $select='*' ) {
			if ( empty ( $select ) )
				$this->_select = '*';
			if ( is_array ( $select ) && !empty ( $select ) )
				$this->_select = explode (",", $select );
		}
		
		private function _buildPartQuery () {
			$_query = "";
			if ( !empty ( $this->_where ) )
				$_query .= $this->_where;
			if ( !empty ( $this->_order ) )
				$_query .= " $this->_order ";
			if ( !empty ( $this->_limit ) )
				$_query .= " limit $this->_limit ";
			
			return $_query;
		}
		
		/**
		 * Comprueba que todos los elementos existan en la tabla
		 *
		 * @param unknown_type $arr
		 * @return unknown
		 */
		private function _checkElements(&$arr) {
			foreach ( $arr as $key => $value ) {
				$arr[$key] = $this->_sanitize($value);
				if ( !$this->_existsField($key) ) {
					//echo "No existe: $key";
					unset($arr[$key]);
					return true;
				}
			}
			return true;
		}
		
		/**
		 * Limpia las cadenas de posibles sql injections
		 *
		 * @param unknown_type $txt
		 * @return unknown
		 */
		private function _sanitize($txt) {
			$sanitize = loadClass ( "sanitize" );
			return sprintf ( "%s", $sanitize['sanitize']->sql ( $txt ) );
		}
		
		/**
		 * Comprueba que el campo se encuentre dentro de la tabla
		 *
		 * @param unknown_type $field
		 * @return unknown
		 */
		private function _existsField ( $field ) {
			foreach ( $this->_fields as $key => $value ) {
				if ( $field == $key )
					return true;
			}
			return false;
		}
		
		/*
		 * Recoge los campos de la tabla seleccionada
		 */
		private function _getRows() {
			$sql = "SHOW COLUMNS FROM $this->_table";
			/*if ( staticcache_isset ( "app_tables_data", $this->_table ) ) {
				$this->_fields = staticcache_get ( "app_tables_data", $this->_table );
				return true;
			} else {*/
				$tables = $this->_db->get_results ( $sql, 'ARRAY_N' );
				if ( $this->_db->num_rows > 0 ) {
					for ( $i = 0; $i < $this->_db->num_rows; $i++ ) {
						$this->_fields[$tables[$i][0]]['name'] = $tables[$i][0];
						$this->_fields[$tables[$i][0]]['is_primary'] = ($tables[$i][3] == "PRI") ? true : false;
						if ($tables[$i][3] == "PRI" ) { $this->_primary_key = $tables[$i][0] ; }
						$this->_fields[$tables[$i][0]]['type'] = substr($tables[$i][1],0,3);
					}
					//staticcache_set ( "app_tables_data", $this->_table, $this->_fields );
					return true;
				} else return false;
			//}
		}
		
		/**
		 * Decidimos s� poner comillas simples o no en una consulta
		 *
		 * @param unknown_type $var
		 * @return unknown
		 */
		private function _putQuotes ( $var ) {
			switch ( $var ) {
				case 'integer':
					return false;
				break;
				case 'double':
					return false;
				break;
				case 'string':
					return true;
				break;
				default:
					return true;
				break;
			}
		}
	}
