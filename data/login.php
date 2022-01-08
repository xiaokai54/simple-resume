<?php
//header("Content-Type:text/html;charset=utf-8");
//连接数据库
include_once "../data/con_mysql.php";
$cookie_user_name = base64_decode($_COOKIE["User_name"]);
$sql = "SELECT * FROM .`user_info` where user_name = '$cookie_user_name'";
$result = mysqli_query($conn, $sql);
$info_user = mysqli_fetch_assoc($result);

// 是否为表单提交
if(!isset($_POST['submit'])) {
	header("refresh:0;url=../");
	exit();
}

//在后端获取前端表单数据的方法是使用全局数组$_GET或$_POST
$username = $_POST['username'];
$password = $_POST['password'];

//进行必须的验证
if(!strlen($username) || !strlen($password)){
	echo "<script>alert('请输入用户名和密码');history.back();</script>";
	exit();
}
else{
	if (strpos($username,'@')){
		// 正则匹配邮箱
		if (!preg_match('/^\w+([-+.]\w+)*@\w+([-.]\w+)*$/', $username)) {
			echo "<script>alert('输入的邮箱不合法\\n请重新输入');history.back();</script>";
			exit();
		}
	}else{
		// 正则匹配昵称（用户名）
		if(!preg_match('/^[\u4E00-\u9FA5A-Za-z0-9_]+$/',$username)){
			echo "<script>alert('用户名不合法\\n请重新输入');history.back();</script>";
			exit();
		}
	}  // 正则匹配密码
	if(!preg_match('/^[a-zA-Z0-9_@]{6,18}$/',$password)){
		echo "<script>alert('密码不合法\\n请重新输入');history.back();</script>";
		exit();
	}
}

//// 匹配用户输入的值，查询特定字段，针对性使用sql语句
if (strpos($username,'@')){
	$sql = "select * from .login_info where user_email = '$username'";
}elseif(preg_match('/^(13[0-9]|14[01456879]|15[0-35-9]|16[2567]|17[0-8]|18[0-9]|19[0-35-9])\d{8}$/',$username)){
	$sql = "select * from .login_info where user_tel = '$username'";
}else{
	$sql = "select * from .login_info where user_name = '$username'";
}
// 连接MySQL查询用户信息
$result = mysqli_query($conn, $sql);
mysqli_close($conn);
$result_user = mysqli_fetch_assoc($result);
// 验证密码是否正确
$confirm_password = password_verify($password,$result_user["user_password"]);
// 查询成功
if($result){
	// 密码正确
	if ($confirm_password){
		// cookie 缓存用户名
		setcookie("User_name",base64_encode($result_user['user_name']),time()+3600,'/');
		echo "<script>alert('登录成功！');location.href='../user';</script>";
		exit();
	}
}else{
	echo "<script>alert('请注册\\n即将自动跳转至注册页面');location.href='../register';</script>";
}
exit();