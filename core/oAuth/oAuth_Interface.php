<?php
/**
 * Interface to create oAuth connection with third parties.
 * @author ssola
 */
interface oAuth_Interface {
	public function login();
	public function logout( $url );
	public function getUser();
}
?>