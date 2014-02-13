<?php
define('NO_CONNECT', TRUE);

require 'include.php';

if ( !is_logged_in() ) {
	header('location: login.php');
	die();
}else{
	$id = $_SESSION['id'];
}

// 页面名
$pagename = isset($_GET['page']) ? $_GET['page'] : 'product';
if($pagename != 'contact'){
	$pagename = 'product';
}

// 读取产品介绍页的内容
$path = "../data/$id/$pagename.html";
$info['contents'] = file_get_contents($path);

// 从表单获取数据
if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {
	$data=array(
		"contents"=>$_POST["contents"]
	);

	// 保存进文件目录
	if(file_put_contents($path, $data["contents"])){
		$status = '保存成功！';
	}

	$info['contents'] = $data["contents"];
}

$info['act'] = "update_pages";
$info['title'] = "上传页面";
$info['page'] = $pagename;
$info['tips'] = isset($status) ? $status : '';

echo replace($info, load('update_pages'));

?>