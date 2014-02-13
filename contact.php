<?php

require 'include.php';

$info['title'] = '联系方式';
$info['act'] = 'contact';
$info['contact'] = @file_get_contents("data/".$info['id']."/contact.html");

echo replace($info, load('contact'));

?>
