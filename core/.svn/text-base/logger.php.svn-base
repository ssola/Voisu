<?php
class Logger {
	
	static	$instance;
	var		$path;
	var		$log_name = "app.log";
	static 	$fp;
	var 	$save_log = SAVE_LOG;
	
	function Logger( ) {}
	
	function setLog ( $name = "app.log" ) {
		if ( !empty ( $name ) ) {
			// check if file is open yet (useful when we switch the log file)
			if ( isset ( self::$fp ) )
				fclose ( self::$fp );
			$this->log_name = $name;
			if ( $this->save_log ) {
				$this->path = LOG_PATH;
				if ( is_dir ( $this->path ) ) {
					if ( is_writable ( $this->path ) ) {
						if ( self::$fp = fopen ( $this->path.'/'.$this->log_name, "a" ) ) {
							return true;
						}
					}
				}
				return false;
			}
		}
	}
	
	function log ( $type = "Message", $msg, $page = "", $line = "" ) {
		global $current_user;
		
		if ( $this->save_log ) {
			if ( !empty ( $msg ) ) {
				
				$time = date ( "H:i:s d/m/Y", time() );
				$msg = "\r\n[$type] $time\r\n IP: ".$this->getIP()."\r\n$msg\r\n";
				if ( !empty ( $page ) || !empty ( $line ) )
					$msg .= "Page: $page | Line: $line\r\n";
				
				if ( @fwrite( self::$fp, $msg ) ) {
					return true;
				}
			}
			
			@fclose ( self::$fp );
			
			return false;
		}
	}
	
	function getIP() {
		if ($_SERVER['HTTP_X_FORWARD_FOR']) {
			$ip = $_SERVER['HTTP_X_FORWARD_FOR'];
		} else {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		return $ip;
	}
	
	function getInstance() {
		if ( !isset ( self::$instance ) ) {
			$class = __CLASS__;
			self::$instance = new $class;
		}
		return self::$instance;
	}
	
	function  __destruct() {
	}
	
	function __clone() {
		trigger_error('Clone is not allowed.', E_USER_ERROR);
	}
}
?>