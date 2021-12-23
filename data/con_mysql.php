<?php
include_once "../config.php";
// 连接MySQL
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}
// 设置字符集
mysqli_query($conn,"set names utf8");