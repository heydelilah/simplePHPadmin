<?php

require 'include.php';

// 替换动态内容
$info['title'] = '在线申请';
$info['act'] = 'apply';

//验证是不是拿到了表单的数据
if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {

	if(empty($_POST["company"])||empty($_POST["mobile"])||empty($_POST["contact"])){
		$status = 'Please fill out all inputs.';
	}else{

		//从表单获取数据
		$data=array(
			"user_id" => $info['id'],
			"company" => $_POST["company"],
			"mobile" => $_POST["mobile"],
			"email" => $_POST["email"],
			"address" => $_POST["address"],
			"contact" => $_POST["contact"],
			"phone" => $_POST["phone"],
			"site" => $_POST["site"]
		);

		// 往数据库里插入数据
		add('apply', $data);

	}
}else{
	//TODO 应该return false么？
}

echo replace($info, load('apply'));

?>
