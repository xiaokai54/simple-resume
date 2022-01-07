<?php
// 是否为表单提交
if(!isset($_POST['submit'])) {
	header("refresh:0;url=../");
	exit();
}
header("Content-Type:text/html;charset=utf-8");
//在后端获取前端表单数据的方法是使用全局数组$_GET或$_POST
$sql_user_name =  base64_decode($_COOKIE['User_name']);

// information
$user_name = $_POST['user_name'];				//昵称
$user_full_name = $_POST['user_fullname'];		//姓名
$user_d_o_f = $_POST['user_d_o_f'];				//出生日期
$user_address = $_POST['user_address'];			//用户地址
$user_email = $_POST['user_email'];				//用户邮箱
$user_tel  = $_POST['user_tel'];				//用户手机号
$user_occupation = $_POST['user_occupation'];	//用户职业
$user_website = $_POST['user_website'];
$user_intro = $_POST['user_intro'];

//连接数据库服务器
//第一步，连接数据库服务器

include_once("../data/con_mysql.php");

if (strlen($user_name) == 0){
	// 判断用户是否输入了用户名，如果没输入就将数据库内的数据再次填入
	$sql = "select * from .`user_info` where user_name = '$sql_user_name'";
	$result_user_name = mysqli_query($conn,$sql);
	$info_user = mysqli_fetch_assoc($result_user_name);
	$user_name = $info_user['user_name'];
}else{
	//判断昵称是否重复（是否被占用）
	$sql = "select * from .`user_info` where user_name = '$user_name'";
	$result_user_name_confirm = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result_user_name_confirm)){
		echo "<script>alert('此昵称已经存在\\n请重新输入');history.back();</script>";
		exit();
	}
}
if(strlen($user_email) == 0){
	// 判断用户是否输入了邮箱，如果没输入就将数据库内的数据再次填入
	$sql = "select * from .`user_info` where user_name = '$sql_user_name'";
	$result_user_email = mysqli_query($conn,$sql);
	$info_user = mysqli_fetch_assoc($result_user_email);
	$user_email = $info_user['user_email'];
}else{
	//判断邮箱是否重复（是否被占用）
	$sql = "select * from .`user_info` where user_email = '$user_email'";
	$result_user_email_confirm = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result_user_email_confirm)){
		echo "<script>alert('此邮箱已被注册\\n请重新输入');history.back();</script>";
		exit();
	}
}
if(strlen($user_tel) == 0){
	// 判断用户是否输入了网站，如果没输入就将数据库内的数据再次填入
	$sql = "select * from .`user_info` where user_name = '$sql_user_name'";
	$result_user_tel = mysqli_query($conn,$sql);
	$info_user = mysqli_fetch_assoc($result_user_tel);
	$user_tel = $info_user['user_tel'];
}else{
	//判断手机号是否重复（是否被占用）
	$sql = "select * from .`user_info` where user_tel = '$user_tel'";
	$result_user_tel_confirm = mysqli_query($conn,$sql);
	if(mysqli_num_rows($result_user_tel_confirm)){
		echo "<script>alert('此手机号已被注册\\n请重新输入');history.back();</script>";
		exit();
	}
}
if (strlen($user_full_name) == 0){
	// 判断用户是否输入了姓名，如果没输入就将数据库内的数据再次填入
	$sql = "select * from .`user_info` where user_name = '$sql_user_name'";
	$result_user_full_name = mysqli_query($conn,$sql);
	$info_user = mysqli_fetch_assoc($result_user_full_name);
	$user_full_name = $info_user['user_full_name'];
}
if (strlen($user_address) == 0){
	// 判断用户是否输入了姓名，如果没输入就将数据库内的数据再次填入
	$sql = "select * from .`user_info` where user_name = '$sql_user_name'";
	$result_user_address = mysqli_query($conn,$sql);
	$info_user = mysqli_fetch_assoc($result_user_address);
	$user_address = $info_user['user_address'];
}
if (strlen($user_occupation) == 0){
	// 判断用户是否输入了职业，如果没输入就将数据库内的数据再次填入
	$sql = "select * from .`user_info` where user_name = '$sql_user_name'";
	$result_user_occupation = mysqli_query($conn,$sql);
	$info_user = mysqli_fetch_assoc($result_user_occupation);
	$user_occupation = $info_user['user_occupation'];
}
if (strlen($user_d_o_f) == 0){
	// 判断用户是否输入了出身日期，如果没输入就将数据库内的数据再次填入
	$sql = "select * from .`user_info` where user_name = '$sql_user_name'";
	$result_user_d_o_f = mysqli_query($conn,$sql);
	$info_user = mysqli_fetch_assoc($result_user_d_o_f);
	$user_d_o_f = $info_user['user_d_o_f'];
}
if (strlen($user_website) == 0){
	// 判断用户是否输入了站点，如果没输入就将数据库内的数据再次填入
	$sql = "select * from .`user_info` where user_name = '$sql_user_name'";
	$result_user_website = mysqli_query($conn,$sql);
	$info_user = mysqli_fetch_assoc($result_user_website);
	$user_website = $info_user['user_website'];
}
if (strlen($user_intro) == 0){
	// 判断用户是否输入了站点，如果没输入就将数据库内的数据再次填入
	$sql = "select * from .`user_info` where user_name = '$sql_user_name'";
	$result_user_intro = mysqli_query($conn,$sql);
	$info_user = mysqli_fetch_assoc($result_user_intro);
	$user_intro = $info_user['user_intro'];
}
// 正则匹配用户名
if (!preg_match('/^[\u4E00-\u9FA5A-Za-z0-9_]{3,16}$/', $user_name)) {
	echo "<script>alert('用户名不合法\\n只能是中文、英文、数字包括下划线\\n长度为3到16个字符');history.back();</script>";
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
if (!preg_match('/[a-zA-Z0-9][-a-zA-Z0-9]{0,62}(\.[a-zA-Z0-9][-a-zA-Z0-9]{0,62})+\.?/', $user_website)) {
	echo "<script>alert('网站域名不合法\\n请重新输入');history.back();</script>";
}


////sql语句
$sql = "UPDATE . `user_info` SET
    `user_name` = '$user_name',
    `user_full_name` = '$user_full_name',
    `user_address` = '$user_address',
    `user_email` = '$user_email',
    `user_tel` = '$user_tel',
    `user_occupation` = '$user_occupation',
    `user_intro` = '$user_intro',
    `user_d_o_f` = '$user_d_o_f',
    `user_website` = '$user_website'
WHERE
    `user_name` = '$sql_user_name'";
$result = mysqli_query($conn,$sql);
mysqli_close($conn);
if($result){
	echo "<script>alert('更新个人资料成功');location.href='../user'</script>";
	setcookie("User_name",base64_encode($user_name),time()+1200,'/');
}
else{
	echo "<script>alert('更新个人资料失败');history.back();</script>";
}
exit();
?>