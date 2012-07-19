<?php
	//include_once ('../includes.php' );
	
	class Users_Model extends Model {
		private $_validation = array();
		private $_scheme = array (
							array (
								"field" => "email",
								"validation" => array (
									"email" => "",
									"empty" => ""
								),
								"msg" => "Email exists or not is valid"
							),
							array (
								"field" => "password",
								"validation" => array (
									"empty" => "",
									"min_length" => 6
								),
								"msg" => "Password too short or invalid"
							),
							/*array (
								"field" => "name",
								"validation" => array (
									"empty" => ""
								)*
							)*/
						);
						
		public function __construct() {
			parent::__construct('users');
			$this->_validation = new Validation();
		}

		public function getLatestQueries($uid) {
			global $_load;

			$results = false;
			if ( $this->current_user ) {
				$_load['memcached']->connect();
				$queries = loadModel("Queries");
				$results = $_load['memcached']->get(setKeyName("user_last_queries_".$uid));
				if ( empty ( $results ) ) {
					$results = $queries->getUserQueries($uid);
					$_load['memcached']->set(setKeyName("user_last_queries_".$uid), $results, 600);
				}
			}
			
			return $results;			
		}

		public function getLatestsVisits($uid) {
			global $_load;

			$results = false;
			if ( $uid ) {
				$_load['memcached']->connect();
				$queries = loadModel("Visits");
				$results = $_load['memcached']->get(setKeyName("user_last_visits_".$uid));
				if ( empty ( $results ) ) {
					$results = $queries->getLastVisited($uid,10);
					$_load['memcached']->set(setKeyName("user_last_visits_".$uid), $results, 1);
				}
			}
			
			return $results;
		}
		
		public function getAllUsers ($limit) {
			if ( !empty ( $limit ) ) {
				parent::setLimit($limit);	
			}
			
			$users = parent::findAll();
			if ( parent::getNumResults() > 0 )
				return $users;
			else return null;
		}

		public function getUser($id) {
			if (!empty ( $id ) ) {
				$user = parent::findByPrimary($id);
				if ( $user ) {
					return $user;
				}
			}
		}

		public function updateRole($uid, $val ) {
			$user = array("id"=>$uid,"is_admin"=>$val);
			if ( parent::update ( $user, $uid) ) {
				return true;
			}

			return false;
		}

		public function banUser($uid, $ban=true) {
			$user = array("status" => "banned");
			if ( parent::update($user, $uid)) {
				return true;
			}

			return false;
		}
		
		public function checkUser ( $email ) {
			$elements = array ( "email" => $email, "password" => makeHash("marihuana"));
			$this->_validation->setElements($this->_scheme, $elements );
			if ( $this->_validation->Validate() ) {
				parent::findAll($elements);
				if ( parent::getNumResults() > 0 )
					echo "Existe";
				else 
					echo "No existe";
			} else {
				echo "Error con el email";
			}
		}
		
		public function create ( $user, $mode = '') {
			// comprueba que el email no exista ya
			$this->_validation->setElements ( $this->_scheme, $user );
			if ( $this->_validation->Validate() ) {
				// todo valida, comprobamos que no exista el email
				if ( $mode == 'oauth' ) {
					$user_tmp = parent::findByKey("oauth_userid", $user['oauth_userid'] );
				} else {
					$user_tmp = parent::findByKey("email", $user['email'] );
				}
				
				if ( !$user_tmp ) {
					//encrimptamos la contrase�a y a�adimos campos
					$user['password'] = makeHash($user['password']);
					$user['created'] = time();
					$user['user_key'] = makeHash( $user['email'].$user['password'].$user['created'] );
					
					//guardamos
					if ( $uid = parent::save($user) ) {
						$user['id'] = $uid;
						return $user; // no se pudo crear
					}
				} else {
					return false; //El usuario ya existe
				}
			} else {
				return $this->_validation->getErrors();
			}
		
			return false;
		}
		
		public function getUsers($start=0, $end=10) {
			$sql = sprintf("select * from users limit %d, %d", $start, $end);
			$users = parent::findByQuery($sql);
			if ( $users ) {
				return $users;
			}
			
			return false;
		}
		
		public function getFavourites($uid) {
			$sql = sprintf(
				"select count(favourites.id) as favourites from favourites where favourites.user_id = %d", intval($uid)
			);
			
			$result = parent::findByQuery($sql);
			if ( $result ) {
				return $result[0]->favourites;
			}
		}
	}
?>