<?php
/* 防止用户直接访问该文件 */

// 定义主配置文件
$config_file = '../config.php';

//if (file_exists($config_file)) {
//	// 当配置文件存在时检查数据库是否存在，如果不存在就执行安装
//	include_once "../config.php";
//	$DB_NAME = DB_NAME;
//	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);
//	$sql = "SELECT * FROM .`user_info` where id= 1";
//	$result = mysqli_query($conn, $sql);
//	$user_id = mysqli_fetch_assoc($result);
//	mysqli_close($conn);
//	if (!strlen($user_id) == 0) {
//		// 配置文件在，数据库正常，未登录
//		if (strlen(base64_decode($_COOKIE["User_name"])) == 0) {
//			header("refresh:0;url='../'");
//			exit();
//		}
//		// 配置文件在，数据库正常，已登录
//		header("refresh:0;url=../user");
//		exit();
//	}
//}
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width">

	<meta name="robots" content="noindex,nofollow">
	<title>phphomework › 安装配置文件</title>
	<link rel="stylesheet" id="dashicons-css" href="../css/dashicons.min.css" type="text/css" media="all">
	<link rel="stylesheet" id="buttons-css" href="../css/buttons.min.css" type="text/css" media="all">
	<link rel="stylesheet" id="forms-css" href="../css/forms.min.css" type="text/css" media="all">
	<link rel="stylesheet" id="l10n-css" href="../css/l10n.min.css" type="text/css" media="all">
	<link rel="stylesheet" id="install-css" href="../css/install.min.css" type="text/css" media="all">
</head>

<body class="wp-core-ui">
	<h1>数据库连接成功</h1>
	<p>不错。您完成了安装过程中重要的一步，phphomework现在已经可以连接数据库了。如果您准备好了的话，现在就…</p>

	<p class="step"><a href="../user/install.php" class="button button-large">点击安装</a></p>
	<script type="text/javascript" src="../js/jquery.min.js" id="jquery-core-js"></script>
	<script type="text/javascript" src="../js/jquery-migrate.min.js" id="jquery-migrate-js"></script>
	<script type="text/javascript" src="../js/language-chooser.min.js" id="language-chooser-js"></script>
	<script type="text/javascript" src="../js/ban_dev.js"></script>
</body>

</html>