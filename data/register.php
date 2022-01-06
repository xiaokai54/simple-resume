<?php
if(!isset($_POST['submit'])) {
	header("refresh:0;url=../");
	exit();
}
header("Content-Type:text/html;charset=utf-8");
//在后端获取前端表单数据的方法是使用全局数组$_GET或$_POST
$user_name = $_POST['user_name'];
$user_password = $_POST['user_password'];
$user_confirm_password = $_POST['user_confirm_password'];
$user_email = $_POST['user_email'];
$user_tel = $_POST['user_tel'];

include_once("../data/con_mysql.php");
//进行必须的验证
if (strlen($user_name) == 0 ||
	strlen($user_password) == 0 ||
	strlen($user_confirm_password) == 0 ||
	strlen($user_email) == 0 ||
	strlen($user_tel) == 0
){
	echo "<script>alert('请填写注册信息！');history.back();</script>";
	exit();
} else {
	// 正则匹配用户名
	if (!preg_match('/^[\u4E00-\u9FA5A-Za-z0-9_]{3,16}$/', $user_name)) {
		echo "<script>alert('用户名不合法\\n只能是中文、英文、数字包括下划线\\n长度为3到16个字符');history.back();</script>";
		exit();
	}
	// 正则匹配密码
	if (!preg_match('/^[a-zA-Z0-@]{6,18}$/', $user_password)) {
		echo "<script>alert('密码不合法\\n只能是大小写字符和数字\\n以及@构成\\n长度为6到18个字符');history.back();</script>";
		exit();
	}
	// 正则匹配邮箱
	if (!preg_match('/^\w+([-+.]\w+)*@\w+([-.]\w+)*$/', $user_email)) {
		echo "<script>alert('邮箱不合法\\n请重新输入');history.back();</script>";
		exit();
	}
	// 正则匹配手机号
	if(!preg_match('/^(13[0-9]|14[01456879]|15[0-35-9]|16[2567]|17[0-8]|18[0-9]|19[0-35-9])\d{8}$/',$user_tel)){
		echo "<script>alert('手机号不合法\\n请重新输入');history.back();</script>";
		exit();
	}
	// 确认密码
	if (!($user_password == $user_confirm_password)) {
		echo "<script>alert('两次输入的密码不一样\\n请重新输入');history.back();</script>";
		exit();
	}
	//判断昵称是否重复（是否被占用）
	$sql = "select * from .`user_info` where user_name = '$user_name'";
	$result_user_nickname = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result_user_nickname)){
		echo "<script>alert('此昵称已经存在\\n请重新输入');history.back();</script>";
		exit();
	}
	//判断邮箱是否重复（是否被占用）
	$sql = "select * from .`user_info` where user_email = '$user_email'";
	$result_user_email = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result_user_email)){
		echo "<script>alert('此邮箱已被注册\\n请重新输入');history.back();</script>";
		exit();
	}
}
// 连接数据库
include_once "../data/con_mysql.php";

// 查询 login_info 和 user_info 表数据量是否相同
$sql = "select count(*) from .login_info";
$result_count_login_info = mysqli_query($conn,$sql);
$count_login_info = mysqli_fetch_assoc($result_count_login_info);
$sql = "select count(*) from .user_info";
$result_count_user_info = mysqli_query($conn,$sql);
$count_user_info = mysqli_fetch_assoc($result_count_user_info);

// 当两个表的数据量不同时无法进行注册操作
if (!($count_user_info == $count_login_info)){
	echo "<script>alert('数据库数据错误\\n请联系网站管理员!!!');history.back();</script>";
	exit();
}

// 判断两个表有多少数据，我下一次插入的 ID + 1
$count_id = $count_login_info['count(*)'] + 1;
// 密码hash加密
$pwd=password_hash($user_password ,PASSWORD_BCRYPT);

// 插入数据到 login_info 表
$sql = "INSERT INTO .`login_info`(
	`id`,
	`user_name`,
	`user_password`,
	`user_email`
)
VALUES(
	'$count_id',
	'$user_name',
	'$pwd',
	'$user_email'
)";
$result_login_info = mysqli_query($conn,$sql);

// 插入数据到 user_info 表
$sql = "INSERT INTO .`user_info`(
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
	'$count_id',
	'$user_name',
	'default',
	'1970-01-01',
	'default',
	'$user_email',
	'$user_tel',
	'default',
	'default',
	'default text'
)";
$result_user_info = mysqli_query($conn,$sql);
mysqli_close($conn);

// 判断注册操作是否成功
if ($result_login_info && $result_user_info){
	echo "<script>alert('注册成功!!!');location.href='../login';</script>";
}else{
	echo "<script>alert('注册失败\\n请联系网站管理员!!!');history.back();</script>";
}
exit();
?>