<?php
$cookie_user_name = $_COOKIE["User_name"];
// 判断用户是否登录过
if (strlen($cookie_user_name) == 0){
    header("refresh:0;url='../login'");
    exit();
}
include_once "../data/con_mysql.php";

$str = "SELECT * FROM .`user_info` where user_name = '$cookie_user_name'";
$result = mysqli_query($conn, $str);
$info_user = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="zh-CN" class="ace ace-card-on ace-tab-nav-on ace-main-nav-on ace-sidebar-on" data-theme-color="#c0e3e7">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>search</title>
	<meta name="description" content="">

<!--	<link rel="apple-touch-icon" href="apple-touch-icon.png">-->
<!--	<link rel="shortcut icon" href="favicon.ico">-->

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Quicksand:400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Pacifico" rel="stylesheet">

	<!-- Icon Fonts -->
	<link href="fonts/icomoon/style.css" rel="stylesheet">

	<!-- Styles -->
	<link href="js/plugins/highlight/solarized-light.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet">
	<link href="../css/noScrollbar.css" rel="stylesheet">

	<!-- Modernizer -->
	<script type="text/javascript" src="js/vendor/modernizr-3.3.1.min.js"></script>
</head>

<body>
	<div class="ace-wrapper">
		<header id="ace-header" class="ace-container-shift ace-logo-in ace-head-boxed ace-nav-right">
			<div class="ace-head-inner">
				<div class="ace-head-container ace-container">
					<div class="ace-head-row">
						<div id="ace-head-col1" class="ace-head-col text-left">
							<a id="ace-logo" class="ace-logo" href="index.php">
								<img src="img/uploads/brand/logo.svg" alt="ace resume"><span>search</span>
							</a>
						</div>

						<div id="ace-head-col2" class="ace-head-col text-right">
							<div class="ace-nav-container ace-container hidden-sm hidden-xs">
								<nav id="ace-main-nav">
									<ul class="clear-list">
										<li><a href="index.php">关于我</a></li>
										<!--<li><a href="portfolio.html">portfolio</a>-->
										<li><a href="reference.php">参考</a></li>
										<li><a href="search.php">搜索</a></li>
										<li><a href="change-information.php">信息修改</a></li>
										<li><a href="log-out.php"><button class="btn btn-sm">退出登录</button></a></li>
									</ul>
								</nav>
							</div>
						</div>

						<div id="ace-head-col3" class="ace-head-col text-right">
							<button id="ace-sidebar-btn" class="btn btn-icon btn-light btn-shade">
								<span class="ace-icon ace-icon-side-bar-icon"></span>
							</button>
						</div>
					</div>
				</div><!-- .ace-container -->
			</div><!-- .ace-head-inner -->
		</header><!-- #ace-header -->


	<nav id="ace-nav-sm" class="ace-nav hidden-lg hidden-md">
			<ul class="clear-list">
				<li>
					<a href="#" data-tooltip="Home"><img class="avatar avatar-42"
														 src="img/uploads/avatar/avatar-42x42.png" alt=""></a>
				</li>
				<li>
					<a href="#" data-tooltip="Experience"><span
							class="ace-icon ace-icon-experience"></span></a>
				</li>
				<li>
					<a href="#" data-tooltip="Portfolio"><span
							class="ace-icon ace-icon-portfolio"></span></a>
				</li>
				<li class="#">
					<a href="#" data-tooltip="References"><span
							class="ace-icon ace-icon-references"></span></a>
				</li>
			
				<li>
					<a href="#" data-tooltip="Blog"><span class="ace-icon ace-icon-blog"></span></a>
				</li>
			</ul>
		</nav><!-- #ace-tab-nav-sm -->

		<article id="ace-card" class="ace-card bg-primary">
			<div class="ace-card-inner text-center">
				<img class="avatar avatar-195" src="img/uploads/avatar/avatar-195x195.png" width="195" height="195"
					 alt="">
				<h1><?php echo $info_user['user_name'];?></h1>
				<p class="text-muted"><?php echo $info_user['user_name'];?> | <?php echo $info_user['user_email'];?></p>
				<ul class="ace-social clear-list">
					<li><a><span class="ace-icon ace-icon-facebook"></span></a></li>
					<li><a><span class="ace-icon ace-icon-twitter"></span></a></li>
					<li><a><span class="ace-icon ace-icon-google-plus"></span></a></li>
					<li><a><span class="ace-icon ace-icon-instagram"></span></a></li>
					<li><a><span class="ace-icon ace-icon-pinterest"></span></a></li>
				</ul>
			</div>

			<footer class="ace-card-footer">
				<a class="btn btn-lg btn-block btn-thin btn-upper " href="http://<?php echo $info_user['user_website'];?>">my website</a>
			</footer>
		</article><!-- #ace-card -->

		<div id="ace-content" class="ace-container-shift">
			<div class="ace-container">


				<div id="ace-nav-wrap" class="hidden-sm hidden-xs">
					<div class="ace-nav-cont">
						<div id="ace-nav-scroll">
							<nav id="ace-nav" class="ace-nav">
								<ul class="clear-list">
									<li>
										<a href="" data-tooltip="Home"><img class="avatar avatar-42"
																					 src="img/uploads/avatar/avatar-42x42.png" alt=""></a>
									</li>
									<li>
										<a href="" data-tooltip="Experience"><span
												class="ace-icon ace-icon-experience"></span></a>
									</li>
									<li>
										<a href="" data-tooltip="Portfolio"><span
												class="ace-icon ace-icon-portfolio"></span></a>
									</li>
									<li>
										<a href="" data-tooltip="References"><span
												class="ace-icon ace-icon-references"></span></a>
									</li>
									<li>
										<a href="" data-tooltip="Contact"><span
												class="ace-icon ace-icon-contact"></span></a>
									</li>
									<li>
										<a href="" data-tooltip="Blog"><span
												class="ace-icon ace-icon-blog"></span></a>
									</li>
								</ul>
							</nav>
						</div>

						<div id="ace-nav-tools" class="hidden">
							<span class="ace-icon ace-icon-dots-three-horizontal"></span>

							<button id="ace-nav-arrow" class="clear-btn">
								<span class="ace-icon ace-icon-chevron-thin-down"></span>
							</button>
						</div>
					</div>
					<div class="ace-nav-btm"></div>
				</div><!-- .ace-nav-wrap -->

				<div class="ace-paper-stock">
					<main class="ace-paper clearfix">
						<div class="ace-paper-cont clear-mrg">

							<!-- START: PAGE CONTENT -->

							<div class="padd-box-sm">
								<header class="search-for">
									<h1 class="search-title">搜索引擎
										<span></span>
									</h1>
								</header>
								<div class="search-result">
									<strong class="title-lg text-upper"></strong>
									<form class="search-again" action="https://www.baidu.com/baidu">
									    <a href="https://www.baidu.com/">
											<img src="../img/baidu.png" alt="Baidu" width="35%">
										</a>
									    <input name="tn" type="hidden" value="baidu">
										<div class="form-item-wrap">
											<input class="form-item" id="searchInput" name="word" type="text" value="Wordpress" size="30" maxlength="80"
												required="required">
										</div>
										<div class="form-submit form-item-wrap">
											<input class="btn btn-primary" name="submit" type="submit" id="submit" value="点击搜索">
										</div>
									</form>
									

								</div>
							</div>

							<!-- END: PAGE CONTENT -->

						</div><!-- .ace-paper-cont -->
					</main><!-- .ace-paper -->
				</div><!-- .ace-paper-stock -->

			</div><!-- .ace-container -->
		</div><!-- #ace-content -->

		<div id="ace-sidebar">
			<button id="ace-sidebar-close" class="btn btn-icon btn-light btn-shade">
				<span class="ace-icon ace-icon-close"></span>
			</button>

			<div id="ace-sidebar-inner">
				<article class="ace-card bg-primary">
					<div class="ace-card-inner text-center">
						<img class="avatar avatar-195" src="img/uploads/avatar/avatar-195x195.png" width="195"
							 height="195" alt="">
						<h1><?php echo $info_user['user_name'];?></h1>
						<p class="text-muted"><?php echo $info_user['user_name'];?> | <?php echo $info_user['user_email'];?></p>
						<ul class="ace-social clear-list">
							<li><a><span class="ace-icon ace-icon-facebook"></span></a></li>
							<li><a><span class="ace-icon ace-icon-twitter"></span></a></li>
							<li><a><span class="ace-icon ace-icon-google-plus"></span></a></li>
							<li><a><span class="ace-icon ace-icon-instagram"></span></a></li>
							<li><a><span class="ace-icon ace-icon-pinterest"></span></a></li>
						</ul>
					</div>
				</article><!-- #ace-card -->

				<aside class="widget-area">
					<section class="widget widget_search">
						<form role="search" class="search-form" action="https://www.baidu.com/baidu">
							<label>
								<span class="screen-reader-text">Search for:</span>
								<input type="search" class="search-field" value="Wordpress" name="s" required="required">
							</label>

							<button type="submit" class="search-submit">
								<span class="screen-reader-text">Search</span>
								<span class="ace-icon ace-icon-search"></span>
							</button>
						</form>
					</section>
				</aside>

			</div><!-- #ace-sidebar-inner -->
		</div><!-- #ace-sidebar -->

		<footer id="ace-footer" class="ace-container-shift">
			<div class="ace-container">
				<div class="ace-footer-cont clear-mrg">
					<p class="text-center">Copyright &copy; 2021.phphomework All rights reserved.</p>
				</div>
			</div><!-- .ace-container -->
		</footer><!-- #ace-footer -->

		<!-- Triangle Shapes -->
		<svg id="ace-bg-shape-1" class="hidden-sm hidden-xs" height="519" width="758">
			<polygon points="0,455,693,352,173,0,92,0,0,71"
				style="fill:#d2d2d2;stroke:purple;stroke-width:0; opacity: 0.5">
		</svg>

		<svg id="ace-bg-shape-2" class="hidden-sm hidden-xs" height="536" width="633">
			<polygon points="0,0,633,0,633,536" style="fill:#c0e3e7;stroke:purple;stroke-width:0" />
		</svg>
	</div><!-- .ace-wrapper -->

	<!-- Scripts -->
	<script type="text/javascript" src="js/vendor/jquery-1.12.4.min.js"></script>


	<!---<script type="text/javascript" src="http://ditu.google.cn/maps/api/js?key=AIzaSyDiwY_5J2Bkv2UgSeJa4NOKl6WUezSS9XA"></script>--->
	<script type="text/javascript" src="js/plugins/highlight/highlight.pack.js"></script>
	<script type="text/javascript" src="js/plugins/jquery.mCustomScrollbar.min.js"></script>
	<script type="text/javascript" src="js/plugins/isotope.pkgd.min.js"></script>
	<script type="text/javascript" src="js/plugins/progressbar.min.js"></script>
	<script type="text/javascript" src="js/plugins/slick.min.js"></script>

	<script type="text/javascript" src="js/options.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</body>

</html>
