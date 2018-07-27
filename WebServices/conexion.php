<?php
	error_reporting(0);
  	ini_set('display_errors', 1);

	$conn = oci_connect('mgarcia', 'oracle', '192.168.100.120/quickdev');
	//$conn = oci_connect('hr', 'welcome', 'localhost/XE');
	if (!$conn) {
	    $e = oci_error();
	    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}
?>