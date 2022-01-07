<?php
/* 防止用户直接访问该文件 */

// 定义主配置文件
$config_file = '../config.php';

if (file_exists($config_file)) {
	// 当配置文件存在时检查数据库是否存在，如果不存在就执行安装
	include_once "../config.php";
	$DB_NAME = DB_NAME;
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD);
	$sql = "USE $DB_NAME";
	$result_index = mysqli_query($conn, $sql);
	mysqli_close($conn);
	if ($result_index) {
		// 配置文件在，数据库在，未登录
		if (strlen($_COOKIE["User_name"]) == 0) {
			header("refresh:0;url='../login'");
			exit();
		}
		// 配置文件在，数据库在，已登录
		header("refresh:0;url=../user");
		exit();
	}
}
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
	<h1>配置您的数据库连接</h1>
	<form method="post" action="">
		<p>请在下方填写您的数据库连接信息。如果您不确定，请您完全卸载小皮面板重新安装。</p>
		<table class="form-table" role="presentation">
			<tbody>
				<tr>
					<th scope="row"><label for="dbname">数据库名</label></th>
					<td><input name="dbname" id="dbname" type="text" aria-describedby="dbname-desc" size="25" value="phphomework" autofocus=""></td>
					<td id="dbname-desc">希望将phphomework安装到的数据库名称。注意：不要有<code>-</code></td>
				</tr>
				<tr>
					<th scope="row"><label for="uname">用户名</label></th>
					<td><input name="uname" id="uname" type="text" aria-describedby="uname-desc" size="25" value="username"></td>
					<td id="uname-desc">您的数据库用户名。</td>
				</tr>
				<tr>
					<th scope="row"><label for="pwd">密码</label></th>
					<td><input name="pwd" id="pwd" type="text" aria-describedby="pwd-desc" size="25" value="password" autocomplete="off"></td>
					<td id="pwd-desc">您的数据库密码。</td>
				</tr>
				<tr>
					<th scope="row"><label for="dbhost">数据库主机</label></th>
					<td><input name="dbhost" id="dbhost" type="text" aria-describedby="dbhost-desc" size="25" value="localhost"></td>
					<td id="dbhost-desc">
						如果<code>localhost</code>不能用，您通常可以从网络上寻找到解决办法。 </td>
				</tr>
			</tbody>
		</table>
		<input type="hidden" name="language" value="zh_CN">
		<p class="step"><input name="submit" type="submit" value="提交" class="button button-large"></p>
	</form>
	<script type="text/javascript" src="../js/jquery.min.js" id="jquery-core-js"></script>
	<script type="text/javascript" src="../js/jquery-migrate.min.js" id="jquery-migrate-js"></script>
	<script type="text/javascript" src="../js/language-chooser.min.js" id="language-chooser-js"></script>
	<script type="text/javascript" src="../js/ban_dev.js"></script>
</body>

</html>
<?php
if (isset($_POST['submit'])) {
	// MYSQL INFO
	$DB_NAME = $_POST["dbname"];
	$DB_USER = $_POST["uname"];
	$DB_PASSWORD = $_POST["pwd"];
	$DB_HOST = $_POST["dbhost"];
	$DB_PORT = $_POST["dbport"];

	// 创建主配置文件
	$config_file = "../config.php";
	$create_config_file = fopen($config_file, "w") or die("Unable to open file!");
	// 创建写入字符
	$config = "<!--  MySQL settings - You can get this info from your web host  -->
<?php
/*
 * MySQL settings 代码参考 Wordpress
 * https://cn.wordpress.org/
 */

/** The name of the database */
define('DB_NAME', '$DB_NAME');
/** MySQL database username */
define('DB_USER', '$DB_USER');
/** MySQL database password */
define('DB_PASSWORD', '$DB_PASSWORD');
/** MySQL hostname */
define('DB_HOST', '$DB_HOST');
?>
";
	// 将配置写入config.php
	fwrite($create_config_file, $config);
	// 关闭连接
	fclose($create_config_file);

	// 检测数据库连接
	$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD);
	// 初始化数据库
	$sql = "create database $DB_NAME";
	mysqli_query($conn, $sql);
	mysqli_query($conn, "set names utf8");
	$sql = "use	$DB_NAME";
	mysqli_query($conn, $sql);
	$sql = "CREATE TABLE `login_info`(
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`user_name` VARCHAR(20) NOT NULL COMMENT '用户名',
	`user_password` VARCHAR(100) NOT NULL COMMENT '用户密码',
	`user_email` VARCHAR(100) NOT NULL COMMENT '用户邮箱',
	PRIMARY KEY(`id`)
) ENGINE = InnoDB CHARSET = utf8";
	mysqli_query($conn, $sql);
	$sql = "CREATE TABLE `user_info`(
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`user_name` VARCHAR(20) NOT NULL COMMENT '用户名',
	`user_full_name` VARCHAR(100) NOT NULL COMMENT '姓名',
	`user_d_o_f` DATE NOT NULL COMMENT '用户出生日期',
	`user_address` VARCHAR(200) NOT NULL COMMENT '用户地址',
	`user_email` VARCHAR(100) NOT NULL COMMENT '用户邮箱',
	`user_tel` BIGINT(11) NOT NULL COMMENT '用户手机号',
	`user_occupation` VARCHAR(50) NOT NULL COMMENT '用户职业',
	`user_website` VARCHAR(200) NOT NULL COMMENT '用户网站',
	`user_intro` TEXT NOT NULL COMMENT '用户个性说明',
	PRIMARY KEY(`id`)
) ENGINE = InnoDB CHARSET = utf8";
	mysqli_query($conn, $sql);
	mysqli_close($conn);
	// 跳转
	if (!$conn) {
		//	连接失败跳转连接数据库错误
		header("refresh:0;url='error.php'");
	} else {
		//	连接成功跳转连接数据库成功
		header("refresh:0;url='success.php'");
	}
}
?>