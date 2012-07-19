<?php
	ini_set("memory_limit","12M");
	ob_start();
	/**
	 * TODO : 
	 *  - Alias de Controllers y Actions
	 *  - Helpers fechas, moneda, idioma, strings
	 *  - Otros sitemas de cache a parte de memcached
	 *  - Tratamiento de imagenes
	 *  - Uploads
	 */
	
	/**
	 * Fire, exclamation mark, Fire!
	 */
	include ( "core/start.php" );
	ob_end_flush();
?>