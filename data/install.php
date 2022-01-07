<?php
header("Content-Type:text/html;charset=utf-8");
// 是否为表单提交
if(!isset($_POST['Submit'])) {
	header("refresh:0;url=../");
	exit();
}
//在后端获取前端表单数据的方法是使用全局数组$_GET或$_POST
$admin_name = $_POST["user_login"];
$admin_password = $_POST["admin_password"];
$admin_password_confirm = $_POST["admin_password2"];
$admin_email = $_POST["admin_email"];
//进行必须的验证
if (!strlen($admin_name) || !strlen($admin_password) || !strlen($admin_password_confirm) || !strlen($admin_email)){
	echo "<script>alert('请输入信息后提交');history.back();</script>";
	exit();
}
else{
	// 正则匹配昵称（用户名）
	if(!preg_match('/^[\u4E00-\u9FA5A-Za-z0-9_]+$/',$admin_name)){
		echo "<script>alert('用户名不合法\\n请重新输入！');history.back();</script>";
		exit();
	}
	// 正则匹配邮箱
	if (!preg_match('/^\w+([-+.]\w+)*@\w+([-.]\w+)*$/', $admin_email)){
		echo "<script>alert('输入的邮箱不合法\\n请重新输入！');history.back();</script>";
		exit();
	}
	// 确认密码
	if (!($admin_password == $admin_password_confirm)){
		echo "<script>alert('两次输入的密码不一样\\n请重新输入！');history.back();</script>";
		exit();
	}else{
		// 正则匹配密码
		if(!preg_match('/^[a-zA-Z0-9_@]{6,18}$/',$admin_password)){
			echo "<script>alert('密码不合法\\n请重新输入！');history.back();</script>";
			exit();
		}
	}
}

//密码加密
$result_admin_password = password_hash($admin_password,PASSWORD_BCRYPT);
//连接数据库
include_once "con_mysql.php";
// 匹配用户输入的值，查询特定字段，针对性使用sql语句
$sql_login_info = "INSERT INTO `login_info`(
	`id`,
	`user_name`,
	`user_password`,
	`user_email`
)
VALUES(
	'1',
	'$admin_name',
	'$result_admin_password',
	'$admin_email'
)";
$sql_user_info = "INSERT INTO `user_info`(
	`id`,
	`user_name`,
	`user_full_name`,
	`user_d_o_f`,
	`user_address`,
	`user_email`,
	`user_tel`,
	`user_occupation`,
	`user_website`,
	`user_intro`
)
VALUES(
	'1',
	'$admin_name',
	'$admin_name',
	'1970-01-01',
	'localhost',
	'$admin_email',
	'15666666666',
	'Administrator',
	'localhost',
	'PHP（PHP: Hypertext Preprocessor）即“超文本预处理器”，是在服务器端执行的脚本语言，尤其适用于Web开发并可嵌入HTML中。PHP语法学习了C语言，吸纳Java和Perl多个语言的特色发展出自己的特色语法，并根据它们的长项持续改进提升自己，例如java的面向对象编程，该语言当初创建的主要目标是让开发人员快速编写出优质的web网站。PHP同时支持面向对象和面向过程的开发，使用上非常灵活。\r\n经过二十多年的发展，随着php-cli相关组件的快速发展和完善，PHP已经可以应用在 TCP/UDP服务、高性能Web、WebSocket服务、物联网、实时通讯、游戏、微服务等非 Web 领域的系统研发。\r\n根据W3Techs2019年12月6号发布的统计数据，PHP在WEB网站服务器端使用的编程语言所占份额高达78.9% 。在内容管理系统的网站中，有58.7%的网站使用WordPress（PHP开发的CMS系统），这占所有网站的25.0%。 '
)";
// 连接MySQL新建管理员用户
$result_login_install = mysqli_query($conn, $sql_login_info);
$result_user_install = mysqli_query($conn, $sql_user_info);
mysqli_close($conn);
// success
if ($result_login_install && $result_user_install){
	header("refresh:0;url='../'");

}else{
	echo "<script>alert('安装失败\\n联系网站管理员');history.back();</script>";
}
exit();