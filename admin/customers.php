<?php

require 'include.php';

if ( !is_logged_in() ) {
	header('location: login.php');
	die();
}else{
	$id = $_SESSION['id'];
}

// 分页大小
$size = 5;
// 总记录数
$len = get_total('apply', 'user_id', $id);

// 无记录
if ($len <= 0){
	$page = 1;
	$data = array();
}else {
	// 当前页
	$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
	// 总页数
	$total = ceil(($len / $size));
	// page 有效范围
	if($page<0){
		$page = 1;
	}elseif ($page > $total) {
		$page = $total;
	}

	$data = get('apply', 'user_id', $id, ($page-1)*$size, $size);
}

$menu['act'] = "customers";
$menu['title'] = "客户列表";
// 头部
echo replace($menu, load('header'));

// 表格
include 'template/customers.view.php';

// 尾部
echo replace($menu, load('footer'));
?>