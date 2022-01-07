<?php
// 定义主配置文件
$config_file = 'config.php';

if (file_exists($config_file)) {
	include_once "config.php";
	$DB_NAME = DB_NAME;
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
	$sql = "USE $DB_NAME";
	$result_index = mysqli_query($conn,$sql);
	mysqli_close($conn);
	if (!$result_index){
		// 配置文件但数据库不存在
//		header("refresh:0;url='./install'");
		require "install.php";
		exit();
	}
	// 判断用户是否有过登录操作
	if (strlen($_COOKIE["User_name"]) == 0){
//		header("refresh:0;url='./login'");
		require "login.php";
		exit();
	}
	// 文件存在并登录过则跳转到用户信息界面（默认用户admin）
	header("refresh:0;url=./user");
} else {
//	不存在则跳转到安装设置页面
//	header("refresh:0;url='./install'");
	require "install.php";
}
exit();