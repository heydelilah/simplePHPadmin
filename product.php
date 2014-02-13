<?php

require 'include.php';

$info['title'] = '产品介绍';
$info['act'] = 'product';
$info['product'] = @file_get_contents("data/".$info['id']."/product.html");

echo replace($info, load('product'));

?>