<?php
$cookie_user_name = base64_decode($_COOKIE["User_name"]);
// 判断用户是否登录过
if (strlen(base64_decode($cookie_user_name)) == 0){
	header("refresh:0;url='../'");
	exit();
}
include_once "../data/con_mysql.php";
$sql = "SELECT * FROM .`user_info` where user_name = '$cookie_user_name'";
$result = mysqli_query($conn, $sql);
$info_user = mysqli_fetch_assoc($result);
if ($info_user['user_full_name'] == "default" || $info_user['user_intro'] == "default text"){
	header("refresh:0;url='../user/change-information.php'");
	exit();
}
?>
<!DOCTYPE html>
<html lang="zh-CN" class="ace ace-card-on ace-tab-nav-on ace-main-nav-on ace-sidebar-on" data-theme-color="#c0e3e7">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>About </title>
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
							<a id="ace-logo" class="ace-logo" href="">
								<img src="img/uploads/brand/logo.svg" alt="ace resume"><span>about</span>
							</a>
						</div>

						<div id="ace-head-col2" class="ace-head-col text-right">
							<div class="ace-nav-container ace-container hidden-sm hidden-xs">
								<nav id="ace-main-nav">
									<ul class="clear-list">
										<li><a href="index.php">关于我</a></li>
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
							<div class="padd-box clear-mrg">
								<section class="section brd-btm">
									<div class="row">
										<div class="col-sm-12 clear-mrg text-box">
											<h2 class="title-lg text-upper">About Me</h2>
											<p><b>Helo, I’m <?php echo $info_user['user_full_name'];?>!</b><br>
												<?php echo $info_user['user_intro'];?></p>

											<p class="text-right">
												<img src="img/uploads/signature.png" alt="">
											</p>
										</div>
									</div>
								</section><!-- .section -->

								<section class="section brd-btm">
									<div class="row">
										<div class="col-sm-6 clear-mrg">
											<h2 class="title-thin text-muted">个人信息</h2>

											<dl class="dl-horizontal clear-mrg">
												<dt class="text-upper">姓名</dt>
												<dd><?php echo $info_user['user_name'];?></dd>

												<dt class="text-upper">出生日期</dt>
												<dd><?php echo $info_user['user_d_o_f'];?></dd>

												<dt class="text-upper">地址信息</dt>
												<dd><?php echo $info_user['user_address'];?></dd>

												<dt class="text-upper">e-mail</dt>
												<dd><a href="mailto:<?php echo $info_user['user_email'];?>"><?php echo $info_user['user_email'];?></a>
												</dd>

												<dt class="text-upper">手机号</dt>
												<dd><?php echo $info_user['user_tel'];?></dd>

												<dt class="text-upper">职业</dt>
												<dd><?php echo $info_user['user_occupation'];?></dd>
											</dl>
										</div><!-- .col-sm-6 -->

										<div class="col-sm-6 clear-mrg">
											<h2 class="title-thin text-muted">语言</h2>

											<div class="progress-bullets ace-animate" role="progressbar"
												aria-valuenow="10" aria-valuemin="0" aria-valuemax="10">
												<strong class="progress-title">web前端</strong>
												<span class="progress-bar">
													<span class="bullet fill"></span>
													<span class="bullet fill"></span>
													<span class="bullet fill"></span>
													<span class="bullet fill"></span>
													<span class="bullet fill"></span>
													<span class="bullet fill"></span>
													<span class="bullet fill"></span>
													<span class="bullet fill"></span>
													<span class="bullet fill"></span>
													<span class="bullet fill"></span>
												</span>
												<span class="progress-text text-muted">指数</span>
											</div>

											<div class="progress-bullets ace-animate" role="progressbar"
												aria-valuenow="8" aria-valuemin="0" aria-valuemax="10">
												<strong class="progress-title">PHP</strong>
												<span class="progress-bar">
													<span class="bullet fill"></span>
													<span class="bullet fill"></span>
													<span class="bullet fill"></span>
													<span class="bullet fill"></span>
													<span class="bullet fill"></span>
													<span class="bullet fill"></span>
													<span class="bullet fill"></span>
													<span class="bullet fill"></span>
													<span class="bullet"></span>
													<span class="bullet"></span>
												</span>
												<span class="progress-text text-muted">指数</span>
											</div>

											<div class="progress-bullets ace-animate" role="progressbar"
												aria-valuenow="7" aria-valuemin="0" aria-valuemax="10">
												<strong class="progress-title">MySql</strong>
												<span class="progress-bar">
													<span class="bullet fill"></span>
													<span class="bullet fill"></span>
													<span class="bullet fill"></span>
													<span class="bullet fill"></span>
													<span class="bullet fill"></span>
													<span class="bullet fill"></span>
													<span class="bullet fill"></span>
													<span class="bullet"></span>
													<span class="bullet"></span>
													<span class="bullet"></span>
												</span>
												<span class="progress-text text-muted">指数</span>
											</div>
										</div><!-- .col-sm-6 -->
									</div><!-- .row -->
								</section><!-- .section -->

								<section class="section brd-btm">
									<div class="row">
										<div class="col-sm-6 clear-mrg">
											<!-- 专业技能 -->
											<h2 class="title-thin text-muted">专业技能</h2>

											<div class="row">
												<div class="col-xs-4">
													<div class="progress-chart ace-animate" role="progressbar"
														aria-valuenow="90" aria-valuemin="0" aria-valuemax="100">
														<div class="progress-bar" data-text="90%" data-value="0.9">
														</div>
														<strong class="progress-title">web前端</strong>
													</div>
												</div><!-- .col-xs-4 -->

												<div class="col-xs-4">
													<div class="progress-chart ace-animate" role="progressbar"
														aria-valuenow="88" aria-valuemin="0" aria-valuemax="100">
														<div class="progress-bar" data-text="81%" data-value="0.81">
														</div>
														<strong class="progress-title">PHP</strong>
													</div>
												</div><!-- .col-xs-4 -->

												<div class="col-xs-4">
													<div class="progress-chart ace-animate" role="progressbar"
														aria-valuenow="66" aria-valuemin="0" aria-valuemax="100">
														<div class="progress-bar" data-text="66%" data-value="0.66">
														</div>
														<strong class="progress-title">MySql</strong>
													</div>
												</div><!-- .col-xs-4 -->
											</div><!-- .row -->
										</div><!-- .col-sm-6 -->

										<div class="col-sm-6 clear-mrg">


											<div class="progress-line ace-animate" role="progressbar" aria-valuenow="90"
												aria-valuemin="0" aria-valuemax="100">
												<strong class="progress-title">web前端</strong>
												<div class="progress-bar" data-text="90%" data-value="0.9"></div>
											</div>

											<div class="progress-line ace-animate" role="progressbar" aria-valuenow="80"
												aria-valuemin="0" aria-valuemax="100">
												<strong class="progress-title">PHP</strong>
												<div class="progress-bar" data-text="80%" data-value="0.8"></div>
											</div>

											<div class="progress-line ace-animate" role="progressbar" aria-valuenow="80"
												aria-valuemin="0" aria-valuemax="100">
												<strong class="progress-title">MySQL</strong>
												<div class="progress-bar" data-text="80%" data-value="0.8"></div>
											</div>

											<div class="progress-line ace-animate" role="progressbar" aria-valuenow="70"
												aria-valuemin="0" aria-valuemax="100">
												<strong class="progress-title">网络设计</strong>
												<div class="progress-bar" data-text="70%" data-value="0.7"></div>
											</div>
										</div><!-- .col-sm-6 -->
									</div><!-- .row -->
								</section><!-- .section -->

								<section class="section brd-btm">
									<div class="row">
										<div class="col-sm-6 clear-mrg">
											<h2 class="title-thin text-muted">其余专业技能</h2>

											<div class="progress-line ace-animate" role="progressbar" aria-valuenow="90"
												aria-valuemin="0" aria-valuemax="100">
												<strong class="progress-title">数据通信</strong>
												<div class="progress-bar" data-text="90%" data-value="0.9"></div>
											</div>

											<div class="progress-line ace-animate" role="progressbar" aria-valuenow="80"
												aria-valuemin="0" aria-valuemax="100">
												<strong class="progress-title">网络架构</strong>
												<div class="progress-bar" data-text="80%" data-value="0.8"></div>
											</div>

											<div class="progress-line ace-animate" role="progressbar" aria-valuenow="80"
												aria-valuemin="0" aria-valuemax="100">
												<strong class="progress-title">网络安全</strong>
												<div class="progress-bar" data-text="80%" data-value="0.8"></div>
											</div>
										</div><!-- .col-sm-6 -->

										<div class="col-sm-6 clear-mrg">
											<h2 class="title-thin text-muted">个人特征</h2>

											<ul class="styled-list clear-mrg">
												<li>专升本</li>
												<li>华为<code>HCIE-Datacom</code>认证</li>
												<li>NISP二级</li>
												<li>比赛拿个一等奖</li>
											</ul>
										</div><!-- .col-sm-6 -->
									</div><!-- .row -->
								</section><!-- .section -->

								<section class="section brd-btm">
									<div class="row">
										<div class="col-sm-12 clear-mrg">
											<h2 class="title-thin text-muted">兴趣爱好</h2>

											<ul class="icon-list icon-list-col3 clearfix">
												<li><span class="ace-icon ace-icon-music"></span> 听音乐</li>
												<li><span class="ace-icon ace-icon-safari"></span>  打篮球</li>
												<li><span class="ace-icon ace-icon-gamepad"></span>  打游戏</li>
												<li><span class="ace-icon ace-icon-instagram"></span>  弹吉他</li>
												<li><span class="ace-icon ace-icon-github"></span>  敲代码</li>
												<li><span class="ace-icon ace-icon-random"></span> 渗透网络</li>
												<li><span class="ace-icon ace-icon-magic"></span>  学习网络</li>
												<li><span class="ace-icon ace-icon-book"></span>  读书</li>
											</ul>
										</div>
									</div>
								</section><!-- .section -->
							</div><!-- .padd-box -->
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
								<input type="search" class="search-field" value="Wordpress" name="word" required="required">
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