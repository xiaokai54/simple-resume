<?php
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
			header("refresh:0;url='./'");
			exit();
		}
		// 配置文件在，数据库在，已登录
		header("refresh:0;url=./user");
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
	<title>phphomework › 安装</title>
	<link rel="stylesheet" id="dashicons-css" href="../css/dashicons.min.css" type="text/css" media="all">
	<link rel="stylesheet" id="buttons-css" href="../css/buttons.min.css" type="text/css" media="all">
	<link rel="stylesheet" id="forms-css" href="../css/forms.min.css" type="text/css" media="all">
	<link rel="stylesheet" id="l10n-css" href="../css/l10n.min.css" type="text/css" media="all">
	<link rel="stylesheet" id="install-css" href="../css/install.min.css" type="text/css" media="all">
	<link rel="stylesheet" href="../css/noScrollbar.css">
</head>

<body class="wp-core-ui">

	<h1>欢迎</h1>
	<p>欢迎使用phphomework安装程序！</p>

	<h2>需要信息</h2>
	<p>您需要填写一些基本信息。无需担心填错，这些信息以后可以再次修改。</p>

	<form id="setup" method="post" action="../data/install.php" novalidate="novalidate">
		<table class="form-table" role="presentation">
			<tbody>
				<tr>
					<th scope="row"><label for="user_login">用户名</label></th>
					<td>
						<input name="user_login" type="text" id="user_login" size="25" value="admin">
						<p>用户名只能含有中文、英文、数字包括下划线,长度为3到16个字符</p>
					</td>
				</tr>
				<tr class="form-field form-required user-pass1-wrap">
					<th scope="row">
						<label for="pass1">密码 </label>
					</th>
					<td>
						<div class="wp-pwd">
							<input type="text" name="admin_password" id="pass1" autocomplete="off" data-reveal="1" data-pw="admin@123" aria-describedby="pass-strength-result">
							<button type="button" class="button wp-hide-pw" data-start-masked="0" data-toggle="0" aria-label="隐藏密码" style="display: inline-block;">
								<span class="dashicons dashicons-hidden"></span>
								<span class="text">hide</span>
							</button>
							<div id="pass-strength-result" aria-live="polite" class="strong">强</div>
						</div>
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="admin_password_confirm">重复密码 <span class="description">（必填）</span></label>
					</th>
					<td>
						<input name="admin_password2" type="password" id="admin_password_confirm"  value="admin@123">
					</td>
				</tr>
				<tr class="pw-weak" style="display: none;">
					<th scope="row">确认密码</th>
					<td>
						<label>
							<input type="checkbox" name="pw_weak" class="pw-checkbox">确认使用弱密码
						</label>
					</td>
				</tr>
				<tr>
					<th scope="row"><label for="admin_email">您的电子邮箱地址</label></th>
					<td><input name="admin_email" type="email" id="admin_email" size="25" value="admin@localhost">
						<p>请仔细检查电子邮箱地址后再继续。</p>
					</td>
				</tr>
			</tbody>
		</table>
		<p class="step"><input type="submit" name="Submit" id="submit" class="button button-large" value="安装WordPress"></p>
		<input type="hidden" name="language" value="zh_CN">
	</form>
	<script src="../js/zxcvbn.min.js" type="text/javascript" async=""></script>
	<script type="text/javascript" src="../js/jquery.min.js" id="jquery-core-js"></script>
	<script type="text/javascript" src="../js/jquery-migrate.min.js" id="jquery-migrate-js"></script>
	<script type="text/javascript" src="../js/zxcvbn-async.min.js" id="zxcvbn-async-js"></script>
	<script type="text/javascript" src="../js/regenerator-runtime.min.js" id="regenerator-runtime-js"></script>
	<script type="text/javascript" src="../js/wp-polyfill.min.js" id="wp-polyfill-js"></script>
	<script type="text/javascript" src="../js/hooks.min.js" id="wp-hooks-js"></script>
	<script type="text/javascript" src="../js/i18n.min.js" id="wp-i18n-js"></script>
	<script type="text/javascript" id="wp-i18n-js-after">
		wp.i18n.setLocaleData({
			'text direction\u0004ltr': ['ltr']
		});
	</script>
	<script type="text/javascript" id="password-strength-meter-js-extra">
		/* <![CDATA[ */
		var pwsL10n = {
			"unknown": "\u5bc6\u7801\u5f3a\u5ea6\u672a\u77e5",
			"short": "\u975e\u5e38\u5f31",
			"bad": "\u5f31",
			"good": "\u4e2d\u7b49",
			"strong": "\u5f3a",
			"mismatch": "\u4e0d\u5339\u914d"
		};
		/* ]]> */
	</script>
	<script type="text/javascript" id="password-strength-meter-js-translations">
		(function(domain, translations) {
			var localeData = translations.locale_data[domain] || translations.locale_data.messages;
			localeData[""].domain = domain;
			wp.i18n.setLocaleData(localeData, domain);
		})("default", {
			"locale_data": {
				"messages": {
					"": {}
				}
			}
		});
	</script>
	<script type="text/javascript" src="../js/password-strength-meter.min.js" id="password-strength-meter-js"></script>
	<script type="text/javascript" src="../js/underscore.min.js" id="underscore-js"></script>
	<script type="text/javascript" src="../js/wp-util.min.js" id="wp-util-js"></script>
	<script type="text/javascript" src="../js/user-profile.min.js" id="user-profile-js"></script>
</body>

</html>