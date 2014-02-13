<?php
session_start();

session_destroy();
$_SESSION = array();
// todo:delete the cookie.

header('Location: login.php');

?>