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
$user_name = $_POST['user_name'];				//昵称
$user_fullname = $_POST['user_fullname'];		//姓名
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

// 进行验证

// 判断用户是否填写了数据
if (
	(strlen($user_name) == 0) ||
	(strlen($user_fullname) == 0) ||
	(strlen($user_d_o_f) == 0) ||
	(strlen($user_address) == 0) ||
	(strlen($user_tel) == 0) ||
	(strlen($user_occupation) == 0) ||
	(strlen($user_intro) == 0)
){
	echo "<script>alert('请填写要修改的信息后再提交！');history.back();</script>";
	exit();
}elseif(strlen($user_email) == 0){
	// 判断用户是否输入了邮箱，如果没输入就将数据库内的数据再次填入
	$sql = "select * from .`user_info` where user_name = '$sql_user_nane'";
	$result_user_email = mysqli_query($conn,$sql);
	$info_user = mysqli_fetch_assoc($result_user_email);
	$user_email = $info_user['user_email'];
}elseif(strlen($user_website) == 0){
	// 判断用户是否输入了网站，如果没输入就将数据库内的数据再次填入
	$sql = "select * from .`user_info` where user_name = '$sql_user_nane'";
	$result_user_website = mysqli_query($conn,$sql);
	$info_user = mysqli_fetch_assoc($result_user_website);
	$user_website = $info_user['user_website'];
}else{
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
	if (!preg_match('/[a-zA-Z0-9][-a-zA-Z0-9]{0,62}(\.[a-zA-Z0-9][-a-zA-Z0-9]{0,62})+\.?/', $user_website)) {
		echo "<script>alert('网站域名不合法\\n请重新输入');history.back();</script>";
	}
}

//判断昵称是否修改
$str = "UPDATE .`login_info` SET `user_name`='$user_name',`user_email`='$user_email' WHERE user_name='$sql_user_nane'";
$result_update_user_nickname = mysqli_query($conn,$str);
if(!$result_update_user_nickname){
	echo "<script>alert('昵称修改失败');history.back()</script>";
	exit();
}
////sql语句
$sql = "UPDATE . `user_info` SET
    `user_name` = '$user_name',
    `user_full_name` = '$user_fullname',
    `user_address` = '$user_address',
    `user_email` = '$user_email',
    `user_tel` = '$user_tel',
    `user_occupation` = '$user_occupation',
    `user_intro` = '$user_intro',
    `user_d_o_f` = '$user_d_o_f',
    `user_website` = '$user_website'
WHERE
    `user_name` = '$sql_user_nane'";
$result = mysqli_query($conn,$sql);
mysqli_close($conn);
if($result){
	echo "<script>alert('更新个人资料成功');location.href='../user'</script>";
	setcookie("User_name",$user_name,time()+1200,'/');
}
else{
	echo "<script>alert('更新个人资料失败');history.back();</script>";
}
exit();
?>