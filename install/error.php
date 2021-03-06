<?php
/* 防止用户直接访问该文件 */

// 定义主配置文件
$config_file = '../config.php';

if (file_exists($config_file)) {
	// 当配置文件存在时检查数据库是否存在，如果不存在就执行安装
	include_once "../config.php";
	$DB_NAME = DB_NAME;
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD,DB_NAME);
	$sql = "SELECT * FROM .`user_info` where id= 1";
	$result = mysqli_query($conn, $sql);
	$user_id = mysqli_fetch_assoc($result);
	mysqli_close($conn);
	if (!strlen($user_id) == 0) {
		// 配置文件在，数据库正常，未登录
		if (strlen(base64_decode($_COOKIE["User_name"])) == 0) {
			header("refresh:0;url='../'");
			exit();
		}
		// 配置文件在，数据库正常，已登录
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
	<meta name="robots" content="noindex, nofollow">
	<title>phphomework › 错误</title>
	<style type="text/css">
		html {
			background: #f1f1f1;
		}

		body {
			background: #fff;
			border: 1px solid #ccd0d4;
			color: #444;
			font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen-Sans, Ubuntu, Cantarell, "Helvetica Neue", sans-serif;
			margin: 2em auto;
			padding: 1em 2em;
			max-width: 700px;
			-webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .04);
			box-shadow: 0 1px 1px rgba(0, 0, 0, .04);
		}

		h1 {
			border-bottom: 1px solid #dadada;
			clear: both;
			color: #666;
			font-size: 24px;
			margin: 30px 0 0 0;
			padding: 0;
			padding-bottom: 7px;
		}

		#error-page {
			margin-top: 50px;
		}

		#error-page p,
		#error-page .wp-die-message {
			font-size: 14px;
			line-height: 1.5;
			margin: 25px 0 20px;
		}

		#error-page code {
			font-family: Consolas, Monaco, monospace;
		}

		ul li {
			margin-bottom: 10px;
			font-size: 14px;
		}

		a {
			color: #0073aa;
		}

		a:hover,
		a:active {
			color: #006799;
		}

		a:focus {
			color: #124964;
			-webkit-box-shadow:
				0 0 0 1px #5b9dd9,
				0 0 2px 1px rgba(30, 140, 190, 0.8);
			box-shadow:
				0 0 0 1px #5b9dd9,
				0 0 2px 1px rgba(30, 140, 190, 0.8);
			outline: none;
		}

		.button {
			background: #f3f5f6;
			border: 1px solid #016087;
			color: #016087;
			display: inline-block;
			text-decoration: none;
			font-size: 13px;
			line-height: 2;
			height: 28px;
			margin: 0;
			padding: 0 10px 1px;
			cursor: pointer;
			-webkit-border-radius: 3px;
			-webkit-appearance: none;
			border-radius: 3px;
			white-space: nowrap;
			-webkit-box-sizing: border-box;
			-moz-box-sizing: border-box;
			box-sizing: border-box;

			vertical-align: top;
		}

		.button.button-large {
			line-height: 2.30769231;
			min-height: 32px;
			padding: 0 12px;
		}

		.button:hover,
		.button:focus {
			background: #f1f1f1;
		}

		.button:focus {
			background: #f3f5f6;
			border-color: #007cba;
			-webkit-box-shadow: 0 0 0 1px #007cba;
			box-shadow: 0 0 0 1px #007cba;
			color: #016087;
			outline: 2px solid transparent;
			outline-offset: 0;
		}

		.button:active {
			background: #f3f5f6;
			border-color: #7e8993;
			-webkit-box-shadow: none;
			box-shadow: none;
		}
	</style>
</head>

<body id="error-page">
	<div class="wp-die-message">
		<h1>建立数据库连接时出错</h1>
		<p>您看到此页面，则表示您提交的用户名和密码信息不正确，或是我们无法与数据库服务器<code>localhost</code>进行通信。也可能是您主机的数据库服务器已关闭。</p>
		<ul>
			<li>您确定用户名和密码正确吗？</li>
			<li>您确定输入的主机名正确吗？</li>
			<li>您确定数据库服务器在运行吗？</li>
		</ul>
		<p></p>
		<p class="step"><a href="init.php" class="button button-large">重试</a></p>
	</div>

</body>

</html>