<?php


require 'include.php';

//验证是不是拿到了表单的数据
if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {

	if(empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["host"])){
		$status = 'Please fill out both inputs.';
	}else{
		//从表单获取数据
		$data=array(
			"username"=>$_POST["username"],
			"password"=>$_POST["password"],
			"host"=>$_POST["host"],
			"logo"=>$_POST["logo"],
			"telephone"=>$_POST["telephone"],
			"footer_left"=>$_POST["footer_left"],
			"footer_right"=>$_POST["footer_right"]
		);


		//往数据库里插入数据
		upload('user', $data);

		//成功
		header("location:index.php");
	}
}else{
	//TODO 应该return false么？
}
include "views/publish.view.php";

?>