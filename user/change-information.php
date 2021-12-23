﻿<?php
$cookie_user_name = $_COOKIE["User_name"];
// 判断用户是否登录过
if (strlen($cookie_user_name) == 0){
    header("refresh:0;url='../login'");
    exit();
}
?>
<!DOCTYPE html>
<html lang="zh-CN" class="ace ace-card-on ace-tab-nav-on ace-main-nav-on ace-sidebar-on" data-theme-color="#c0e3e7">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Change Information</title>
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
							<a id="ace-logo" class="ace-logo" href="../user">
								<img src="img/uploads/brand/logo.svg" alt="ace resume"><span>changes</span>
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
					</div>
				</div><!-- .ace-container -->
			</div><!-- .ace-head-inner -->
		</header><!-- #ace-header -->


		<nav id="ace-nav-sm" class="ace-nav hidden-lg hidden-md">
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
				<li class="active">
					<a href="" data-tooltip="Contact"><span
							class="ace-icon ace-icon-contact"></span></a>
				</li>
				<li>
					<a href="" data-tooltip="Blog"><span class="ace-icon ace-icon-blog"></span></a>
				</li>
			</ul>
		</nav><!-- #ace-tab-nav-sm -->



		<div id="ace-content" class="ace-container-shift">
			<div class="ace-container">


				<div class="ace-paper-stock">
					<main class="ace-paper clearfix" text-align：center；>
						<div class="ace-paper-cont clear-mrg">

							<!-- START: PAGE CONTENT -->

							<h2 class="title-lg text-upper padd-box">后台编辑</h2>

							<div class="padd-box-xs">
								<header class="contact-head">
									<br>
									<center>
										<p class="title text-upper">信息修改</p>
									</center>
								</header>
							</div>

							<div class="padd-box-sm">
								<form action="../data/change-information.php" method="post" class="contact-form">
									<div class="form-group">
										<label class="form-label" for="user_name">昵称</label>
										<div class="form-item-wrap">
											<input id="user_name" class="form-item" type="text" name="user_name">
										</div>
									</div>
									<div class="form-group">
										<label class="form-label" for="user_fullname">姓名</label>
										<div class="form-item-wrap">
											<input id="user_fullname" class="form-item" type="text" name="user_fullname">
										</div>
									</div>
									<div class="form-group">
										<label class="form-label" for="user_address">用户地址</label>
										<div class="form-item-wrap">
											<input id="user_address" class="form-item" type="text" name="user_address">
										</div>
									</div>

									<div class="form-group">
										<label class="form-label" for="user_tel">手机号码</label>
										<div class="form-item-wrap">
											<input id="user_tel" class="form-item" type="tel" name="user_tel">
										</div>
									</div>

									<div class="form-group">
										<label class="form-label" for="user_email">用户邮箱</label>
										<div class="form-item-wrap">
											<input id="user_email" class="form-item" type="email" name="user_email">
										</div>
									</div>

									<div class="form-group">
										<label class="form-label" for="user_occupation">用户职业</label>
										<div class="form-item-wrap">
											<input id="user_occupation" class="form-item" type="text" name="user_occupation">
										</div>
									</div>

									<div class="form-group">
										<label class="form-label" for="user_d_o_f">出生日期</label>
										<div class="form-item-wrap">
											<input id="user_d_o_f" class="form-item" type="date" name="user_d_o_f">
										</div>
									</div>
									<div class="form-group">
										<label class="form-label" for="user_website">个人网站</label>
										<div class="form-item-wrap">
											<input id="user_website" class="form-item" type="text" name="user_website">
										</div>
									</div>

									<div class="form-group">
										<label class="form-label" for="user_intro">个性签名</label>
										<div class="form-item-wrap">
											<textarea id="user_intro" class="form-item" name="user_intro"></textarea>
										</div>
									</div>
									<div class="form-submit form-item-wrap">
										<input class="btn btn-primary btn-lg" type="submit" value="提交修改">
									</div>
								</form>
								<div class="form-submit form-item-wrap">
									<a href="../cpassword">
										<input class="btn btn-primary btn-lg" type="submit" value="修改密码">
									</a>
								</div>
							</div>

                            <div style="height: 100px"></div>

<!--							<div id="map" data-latitude="50.84592" data-longitude="4.366859999999974"></div>-->

							<!-- END: PAGE CONTENT -->

						</div><!-- .ace-paper-cont -->
					</main><!-- .ace-paper -->

				</div><!-- .ace-paper-stock -->

			</div><!-- .ace-container -->
		</div><!-- #ace-content -->
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