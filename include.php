<?php
// 连接数据库
require 'db.php';

if(!defined('NO_CONNECT')){
	// 连接数据库
	$conn = connect($config);
	if ( !$conn ) die('Problem connecting to the db.');
	// 获取当前域名的数据
	$hostName = $_SERVER['HTTP_HOST'];
	// 第一条数据
	$info =get("user", "host", $hostName)[0];
}


// 加载模版
function load($file_name){
	// 修正文件路径
	$path = 'template/'.$file_name.'.html';

	// 获取文件内容
	$file = file_get_contents($path);

	if($file){
		$file = preg_replace_callback(
			'/{include\s*(\w*)}/',
			function ($matches) {
				return load($matches[1]);
			},
			$file
		);
		return $file;
	}else{
		return '';
	}
}

// 替换动态内容
function replace($data, $template){
	foreach ($data as $key => $value) {
		$template = preg_replace("/{\s*$key\w*}/", $value, $template);
	}
	return $template;
}

?>