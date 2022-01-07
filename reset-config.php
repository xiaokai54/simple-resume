<!DOCTYPE html>
<html>

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta name="viewport" content="width=device-width">

	<meta name="robots" content="noindex,nofollow">
	<title>phphomework › 重置</title>
	<link rel="stylesheet" id="dashicons-css" href="css/dashicons.min.css" type="text/css" media="all">
	<link rel="stylesheet" id="buttons-css" href="css/buttons.min.css" type="text/css" media="all">
	<link rel="stylesheet" id="forms-css" href="css/forms.min.css" type="text/css" media="all">
	<link rel="stylesheet" id="l10n-css" href="css/l10n.min.css" type="text/css" media="all">
	<link rel="stylesheet" id="install-css" href="css/install.min.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/noScrollbar.css" type="text/css">
</head>

<body class="wp-core-ui">
	<form method="post" action="">
		<input type="submit" name="submit" value="确认重置">
	</form>
	<script type="text/javascript" src="js/jquery.min.js" id="jquery-core-js"></script>
	<script type="text/javascript" src="js/jquery-migrate.min.js" id="jquery-migrate-js"></script>
	<script type="text/javascript" src="js/language-chooser.min.js" id="language-chooser-js"></script>
</body>

</html>
<?php
include_once "config.php";
$database_name = DB_NAME;
if (isset($_POST['submit'])){
	// 连接MySQL
	$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	// 设置字符集
	mysqli_query($conn,"set names utf8");
	$sql = "DROP DATABASE $database_name";
	mysqli_query($conn,$sql);
	unlink("config.php");
	header("refresh:0;url='./'");
}