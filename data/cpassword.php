<?php
// 是否为表单提交
if(!isset($_POST['submit'])) {
	header("refresh:0;url=../");
	exit();
}
header("Content-Type:text/html;charset=utf-8");
//在后端获取前端表单数据的方法是使用全局数组$_GET或$_POST
$sql_user_nane =  $_COOKIE['User_name'];

// information
$user_name = $_POST['user_name'];
$user_password = $_POST['user_password'];
$user_confirm_password = $_POST['user_confirm_password'];

//连接数据库服务器
//第一步，连接数据库服务器

include_once("../data/con_mysql.php");

// 进行验证

// 判断用户是否填写了数据
if (
	(strlen($user_name) == 0) ||
	(strlen($user_password) == 0) ||
	(strlen($user_confirm_password) == 0)
){
	echo "<script>alert('请输入用户名或邮箱和密码！');history.back();</script>";
	exit();
}else{
	if (strpos($user_name,'@')){
		// 正则匹配邮箱
		if (!preg_match('/^\w+([-+.]\w+)*@\w+([-.]\w+)*$/', $user_name)) {
			echo "<script>alert('输入的邮箱不合法\\n请重新输入！');history.back();</script>";
			exit();
		}
		//判断邮箱是否存在
		$sql = "select * from .`login_info` where user_email = '$user_name'";
		$result_user_email = mysqli_query($conn,$sql);
		if(!mysqli_num_rows($result_user_email)){
			echo "<script>alert('用户不存在\\n请重新输入');history.back();</script>";
			exit();
		}
	}else{
		// 正则匹配昵称（用户名）
		if(!preg_match('/^[\u4E00-\u9FA5A-Za-z0-9_]{3,16}$/',$user_name)){
			echo "<script>alert('用户名不合法\\n只能是中文、英文、数字包括下划线\\n长度为3到16个字符');history.back();</script>";
			exit();
		}
		//判断昵称是否存在
		$sql = "select * from .`login_info` where user_name = '$user_name'";
		$result_user_nickname = mysqli_query($conn,$sql);
		if(!mysqli_num_rows($result_user_nickname)){
			echo "<script>alert('用户不存在\\n请重新输入');history.back();</script>";
			exit();
		}
	}  // 正则匹配密码
	if(!preg_match('/^[a-zA-Z0-9@]{6,18}$/',$user_password)){
		echo "<script>alert('密码不合法\\n只能是大小写字符和数字以及@构成\\n长度为6到18个字符');history.back();</script>";
		exit();
	}
	// 确认密码
	if (!($user_password == $user_confirm_password)) {
		echo "<script>alert('两次输入的密码不一样\\n请重新输入');history.back();</script>";
		exit();
	}
}

// 密码hash加密
$pwd=password_hash($user_password ,PASSWORD_BCRYPT);

// sql语句
$sql = "UPDATE . `login_info` SET
    `user_name` = '$user_name',
    `user_password` = '$pwd'
WHERE
    `user_name` = '$sql_user_nane'";
$result = mysqli_query($conn,$sql);
mysqli_close($conn);
if($result){
	echo "<script>alert('更新密码成功');location.href='../login'</script>";
	setcookie("User_name",base64_encode($user_name),time()+3600,'/');
}
else{
	echo "<script>alert('更新密码失败');history.back();</script>";
}
exit();
?>