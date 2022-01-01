<?php
// 定义主配置文件
$config_file = 'config.php';

if (file_exists($config_file)) {
	// 判断用户是否有过登录操作
	if (strlen($_COOKIE["User_name"]) == 0){
		header("refresh:0;url='./login'");
		exit();
	}
	// 文件存在并登录过则跳转到用户信息界面（默认用户admin）
	header("refresh:0;url=./user");
	exit();
} else {
//	不存在则跳转到安装设置页面
	header("refresh:0;url='./setup-config/step1.html'");
}