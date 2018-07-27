<?php

	$conn = oci_connect('', '', '');
	//$conn = oci_connect('hr', 'welcome', 'localhost/XE');
	if (!$conn) {
	    $e = oci_error();
	    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
	}
?>
