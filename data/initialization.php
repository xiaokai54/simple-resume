<?php
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
$default_user_password = "admin@123";
$result_user_password = password_hash($default_user_password,PASSWORD_BCRYPT);
//$result_user_password = md5($default_user_password);
$sql = "create database $DB_NAME";
mysqli_query($conn,$sql);
mysqli_query($conn,"set names utf8");
$sql = "use	$DB_NAME";
mysqli_query($conn,$sql);
$sql = "CREATE TABLE `login_info`(
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`user_name` VARCHAR(20) NOT NULL COMMENT '用户名',
	`user_password` VARCHAR(100) NOT NULL COMMENT '用户密码',
	`user_email` VARCHAR(100) NOT NULL COMMENT '用户邮箱',
	PRIMARY KEY(`id`)
) ENGINE = InnoDB CHARSET = utf8";
mysqli_query($conn,$sql);
$sql = "INSERT INTO `login_info`(
	`id`,
	`user_name`,
	`user_password`,
	`user_email`
)
VALUES(
	'1',
	'admin',
	'$result_user_password',
	'admin@localhost'
)";
mysqli_query($conn,$sql);
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
mysqli_query($conn,$sql);
$sql = "INSERT INTO `user_info`(
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
	'1',
	'admin',
	'admin',
	'1970-01-01',
	'localhost',
	'admin@localhost',
	'15666666666',
	'Administrator',
	'localhost',
	'PHP（PHP: Hypertext Preprocessor）即“超文本预处理器”，是在服务器端执行的脚本语言，尤其适用于Web开发并可嵌入HTML中。PHP语法学习了C语言，吸纳Java和Perl多个语言的特色发展出自己的特色语法，并根据它们的长项持续改进提升自己，例如java的面向对象编程，该语言当初创建的主要目标是让开发人员快速编写出优质的web网站。PHP同时支持面向对象和面向过程的开发，使用上非常灵活。\r\n经过二十多年的发展，随着php-cli相关组件的快速发展和完善，PHP已经可以应用在 TCP/UDP服务、高性能Web、WebSocket服务、物联网、实时通讯、游戏、微服务等非 Web 领域的系统研发。\r\n根据W3Techs2019年12月6号发布的统计数据，PHP在WEB网站服务器端使用的编程语言所占份额高达78.9% 。在内容管理系统的网站中，有58.7%的网站使用WordPress（PHP开发的CMS系统），这占所有网站的25.0%。 '
)";
mysqli_query($conn,$sql);
mysqli_close($conn);
// 跳转
if (!$conn) {
//	连接失败跳转连接数据库错误
	header("refresh:0;url='../setup-config/con_mysql_error.html'");
}else{
//	连接成功跳转连接数据库成功
	header("refresh:0;url='../setup-config/con_mysql_success.html'");
}
?>