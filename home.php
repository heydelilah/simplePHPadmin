<?php

require 'include.php';

// 替换动态内容
$info['title'] = '首页';
$info['act'] = 'home';
echo replace($info, load('home'));

?>