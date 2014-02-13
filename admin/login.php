<?php

require 'include.php';

//验证是不是拿到了表单的数据
if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {

	$username = $_POST['email'];
	$password = $_POST['password'];

	if(empty($username)||empty($password)){
		$status = '请填写登录邮箱和登录密码。';
	}else{
		// 查数据库
		$user_data = login('user', $username, $password);
		if($user_data){
			$_SESSION['id'] = $user_data['id'];
			header("Location: update_info.php");
		}else {
			$status = "邮箱或密码输入错误。";
		}
	}
}

$info['tips'] = isset($status) ? $status : '';
echo replace($info, load('login'));

?>