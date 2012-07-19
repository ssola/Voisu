<?php
	class Login_Model extends Model {
	//	private $_load = array();
		private $_scheme = array (
							array (
								"field" => "email",
								"validation" => array (
									"email" => "",
									"empty" => ""
								)
							),
							array (
								"field" => "password",
								"validation" => array (
									"empty" => "",
									"min_length" => 6
								)
							)
						);
						
		public function __construct() {
			parent::__construct('users');
		}
		
		/**
		 * Devuelve los intentos de login de un usuario
		 */
		public function getAccess( $id ) {
			global $_load;
			
			if ( !empty ( $id ) ) {
				$user_access = loadModel ( "Users_Access" );
				$user_access->setLimit("0,3");
				$tries = $user_access->findByKey('user_id', $id );
				return $tries;
			}
		}
		
		/**
		 * Realiza el login de un usuario
		 */
		public function isLogin($email, $password) {
			global $_load;
			
			$elements = array ( "email" => $email, "password" => makeHash( $password ) );
			$_load['validation']->setElements($this->_scheme, $elements);
			$user_access = loadModel ( "Users_Access" );
			
			if ( $_load['validation']->Validate() ) {
				if ( $res = parent::findAll( $elements ) ) {
					$user_access->saveLoginAttempt ( $res[0]->id, 1 );
					return $res[0]; // return user data
				} else { 
					$user_access->saveLoginAttempt ( 0, 0 ); // attempt fail!
					return false;
				}
			} else {
				$user_access->saveLoginAttempt ( 0, 0 ); // attempt fail!
				return false;
			}
		}
		
		public function oAuthLogin($provider, $uid){
			global $_load;
			
			$elements = array ( "oauth_provider" => $provider, "oauth_userid" =>$uid );
			$user_access = loadModel("Users_Access");
			if ( $res = parent::findAll($elements)) {
				$user_access->saveLoginAttempt($res[0]->id, 1);
				return $res[0];
			}
			
			return false;
		}
		
		/**
		 * Recuperamos contrase�a
		 */
		public function recoverPass ( $email ) {
			global $_load;
			
			$elements = array ( "email" => $email );
			$_load['validation']->setElements ( $this->_scheme, $elements );
			
			if ( $_load['validation']->Validate() ) {
				if ( $user = parent::findByKey("email", $email) ) {
					// update user password and return pass
					$new_pass = newPassword(10);
					$new_user_data = array ( "email" => $email, "password" => makeHash( $new_pass ) );
					if ( parent::update($new_user_data, $user[0]->id) ) {
						return $new_pass;
					}
				}
			}
			
			return false;
		}
		
		/**
		 * Log user by key
		 */
		public function logByCookie( $key ) {
			if ( $user = parent::findByKey( 'user_key', $key ) ) {
				return $user;
			}
			
			return null;
		}
		
		/**
		 * Close current user session
		 */
		public function loginOut() {
			
		}
	}
?>