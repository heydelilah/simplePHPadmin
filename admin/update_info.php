<?php
require 'include.php';

if ( !is_logged_in() ) {
	header('location: login.php');
	die();
}else{
	$id = $_SESSION['id'];
}

// 从表单获取数据
if ( $_SERVER['REQUEST_METHOD'] === 'POST' ) {

	if(empty($_POST["telephone"])){
		$status = 'Please fill out inputs.';
	}else{

		// 获取上传的logo文件信息
		// logo图片格式检测
		$allowedExts = array("gif", "jpeg", "jpg", "png");
		$temp = explode(".", $_FILES["file"]["name"]);
		$extension = end($temp);
		$uploads_dir = '';
		if (in_array($extension, $allowedExts)){
			if ($_FILES["file"]["error"] > 0){
				switch ($_FILES["file"]["error"]) {
					case 1:
					case 2:
						$status = "上传的文件太大。";
					break;
					case 3:
						$status = "文件只有部分被上传。";
					break;
					case 4:
						$status = "没有文件被上传。";
					break;
				}
			}else{
				// 新保存路径地址
				$uploads_dir = "../data/" . "$id/logo." . $extension;
				move_uploaded_file($_FILES["file"]["tmp_name"],$uploads_dir);
			}
		}

		//从表单获取数据
		$data=array(
			"telephone"=>$_POST["telephone"],
			"footer_left"=>$_POST["footer_left"],
			"footer_right"=>$_POST["footer_right"]
		);
		// 如果logo文件没修改，则保持不变
		if($uploads_dir){
			$data['logo'] = $uploads_dir;
			$info["logo"] = $uploads_dir;
		}

		// 模版内容
		$info["telephone"] = $_POST["telephone"];
		$info["footer_left"] = $_POST["footer_left"];
		$info["footer_right"] = $_POST["footer_right"];


		// 往数据库里插入数据
		if(update('user', $data, $id)){
			$status = '保存成功！';
		}

	}
}

// 错误提示
$info['tips'] = isset($status) ? $status : '';
$info['act'] = "update_info";
$info['title'] = "上传信息";
echo replace($info, load('update_info'));

?>