<?php
	ob_start();
	session_start();

	include("config.php");
	include("function.php");

	setLanguage();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Tamas Mezei</title>

		<!-- Bootstrap Core CSS -->
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom Fonts -->
		<link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		
		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Great+Vibes&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css">

		<!-- Theme CSS -->
		<link href="css/main.min.css" rel="stylesheet">
	</head>
	<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">

		<!-- Navigation -->
		<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
						<i class="fa fa-bars"></i>
					</button>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-right navbar-main-collapse">
					<ul class="nav navbar-nav">
						<!-- Hidden li included to remove active class from about link when scrolled up past about section -->
						<li class="hidden">
							<a href="#page-top"></a>
						</li>
<?php
	foreach ($menuitems as $key => $menuitem) {
		foreach ($menuitem as $subkey => $page) {
			echo '
						<li>
							<a class="page-scroll" href="#'.$key.'">'.$subkey.'</a>
						</li>';
		}
	}
?>
						<li>
							<?php if ($_COOKIE['language'] == "en") { ?><a href="index.php?language=hu">HU</a><?php } else { ?><a href="index.php?language=en">EN</a><?php } ?>
						</li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container -->
		</nav>

		<!-- Intro Header -->
		<header class="intro">
			<div class="intro-body">
				<div class="container">
					<div class="row">
						<div class="col-sm-4 col-md-3">
							<div class="box-image">
								<a href="#" data-toggle="modal" data-target=".prezi-modal"><img src="img/profile-picture.png" alt=""></a>
							</div>
						</div>
						<div class="col-sm-8 col-md-9">
							<h1 class="brand-heading">Mr. Tamás Mezei</h1>
							<p class="intro-text">Philosophical Consultant</p>
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12 text-center">
							<a href="#page1" class="text-center btn btn-circle page-scroll">
								<i class="fa fa-angle-double-down animated"></i>
							</a>
						</div>
					</div>
				</div>
			</div>
		</header>

<?php
	foreach ($menuitems as $key => $menuitem) {
		foreach ($menuitem as $subkey => $page) {
			echo '

		<!-- '.$subkey.' page -->
		<section class="page" id="'.$key.'">
			<div class="cover">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 col-lg-offset-2">';


			$_GET['menuitem'] = $menuitems[$key][$subkey];
			require('menu.php');

			echo '

						</div>
					</div>
				</div>
			</div>
		</section>';

		}
	}
?>

		<!-- Modal -->
		<div class="modal fade prezi-modal" id="preziModal" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<div class="modal-body">
						<div class="frame-wrapper">
							<?php if ($_COOKIE['language'] == "en") { ?><iframe id="iframe_container" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" width="940" height="480" src="https://prezi.com/embed/xaswm-l8eo4m/?bgcolor=ffffff&amp;lock_to_path=0&amp;autoplay=0&amp;autohide_ctrls=0&amp;landing_data=bHVZZmNaNDBIWnNjdEVENDRhZDFNZGNIUE1IRC9YYk9DR3JMSi9LMWdDSUhycjNISm9SOWhGQ3dib1l2Qm1BUXB3PT0&amp;landing_sign=scI-FDn7hYCpywNeY9D6-5G4GNN-v1wP7CD5z4dGcIg"></iframe><?php } else { ?><iframe id="iframe_container" frameborder="0" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen="" width="940" height="480" src="https://prezi.com/embed/cuw7-egre-6j/?bgcolor=ffffff&amp;lock_to_path=0&amp;autoplay=0&amp;autohide_ctrls=0&amp;landing_data=bHVZZmNaNDBIWnNjdEVENDRhZDFNZGNIUE1IRC9YYk9DR3JMSi9LMWdDOTFYMGtJM2hvR1ZKUzFLQUFUb2VQV3lRPT0&amp;landing_sign=tJaieiaKVEeOqifjEWn559zcPS5w6sHw_DBIEJc-8f4"></iframe><?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Footer -->
		<footer>
			<div class="container text-center">
				<p>Copyright &copy; mezei.co.uk 2017 - design &amp; development by Mario leszko </p>
			</div>
		</footer>

		<!-- jQuery -->
		<script src="vendor/jquery/jquery.min.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>

		<!-- Plugin JavaScript -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>

		<!-- Theme JavaScript -->
		<script src="js/main.min.js"></script>
	</body>
</html>

<?php
	ob_end_flush();
?>