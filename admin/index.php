<?php
require 'include.php';

if ( !is_logged_in() ) {
	header('location: login.php');
	die();
}
header('location: update_info.php');
?>
