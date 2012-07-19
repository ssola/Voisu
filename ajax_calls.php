<?php
/**
 * Place to set up all the ajax calls
 * All ajax functions must be static methods
 */
global $_load;

$conf = array ( "sanitize" => true, 
				"limit_access" => true, 
				"is_ajax_request" => false,
				"is_user_logged" => true );
				
$_load['ajax']->addAction( "test_user", "Users_Controller::ajax_printText", $conf );
$_load['ajax']->addAction("send_invitation", "Login_Controller::ajax_sendInvitation", $conf );
$_load['ajax']->addAction("set_favourite", "Favourites_Controller::ajax_saveFavourite", $conf);
$_load['ajax']->addAction("upload_image", "Rooms_Controller::ajax_uploadImage", $conf );
$_load['ajax']->addAction("delete_image", "Rooms_Controller::ajax_deleteImage", $conf );
$_load['ajax']->addAction("get_notifications", "Notifications_Controller::ajax_get_notifications", $conf);
$_load['ajax']->addAction("get_user_favourites", "Favourites_Controller::ajax_get_user_favourites", $conf );
// admin calls
$_load['ajax']->addAction("update_user_role", "Users_Controller::ajax_update_user_role", $conf);
$_load['ajax']->addAction("ban_user", "Users_Controller::ajax_ban_user", $conf);
$_load['ajax']->addAction("get_cities", "Panel_Venues_Controller::ajax_get_cities", $conf);
$_load['ajax']->addAction("get_events_user", "Panel_Events_Controller::ajax_get_events", $conf);
$_load['ajax']->addAction("get_events_calendar", "Panel_Events_Controller::ajax_get_events_calendar", $conf);
$_load['ajax']->addAction("drop_venue_gallery_image", "Panel_Venues_Controller::ajax_drop_gallery_image", $conf);
$conf['is_user_logged'] = false;
$_load['ajax']->addAction("get_login", "Login_Controller::ajax_getLoginForm", $conf );
$_load['ajax']->addAction("get_cities", "Settings_Controller::ajax_get_cities", $conf );
$_load['ajax']->addAction("get_options", "Settings_Controller::ajax_get_options", $conf );
$_load['ajax']->addAction("get_boroughs", "Boroughs_Controller::ajax_get_boroughs", $conf );
$_load['ajax']->addAction("do_search", "Search_Controller::ajax_do_search", $conf );
$_load['ajax']->addAction("get_description", "Rooms_Controller::ajax_get_description", $conf );
$_load['ajax']->addAction("map_nearest", "Search_Controller::ajax_nearest_map", $conf );
$_load['ajax']->addAction("getUserLatestQueries", "Users_Controller::ajax_getLatestQueries", $conf);
$_load['ajax']->addAction("share_room", "Rooms_Controller::ajax_share_room", $conf);
$_load['ajax']->addAction("get_user_alert_settings", "Alerts_Controller::ajax_get_settings", $conf);
$_load['ajax']->addAction("update_alert_status", "Alerts_Controller::ajax_update_alert_status", $conf);
?>