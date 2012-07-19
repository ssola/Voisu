<?php
	/**
	 * Comprime el fichero que se le pasa como valor y lo imprime aqu� mismico
	 */
	$_file = sprintf ( "%s", $_GET['f'] );
	//if ( file_exists( $_file ) ) {
		if ( extension_loaded("zlib")){
			ob_start ("ob_gzhandler");
		}

		header("Content-type: image/png");
		$buffer = file_get_contents($_file);
		echo $buffer;
		
		if ( extension_loaded("zlib") ) {
			ob_end_flush();
		}
	/*} else {
		exit();
	}*/
?>