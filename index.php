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
	foreach ($menuitems as $key => $value) {
		echo '
						<li>
							<a class="page-scroll" href="#'.$key.'">'.$value.'</a>
						</li>';
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
								<img src="img/profile-picture.png" alt="">
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

		<!-- About Section -->
		<section class="page" id="page1">
			<div class="cover">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 col-lg-offset-2">
							<!-- h2>Logic-Based Therapy</h2>
							<p>I am a certified consultant in the field of Logic-Based Therapy (LBT). I aim to make the life of my fellow human beings happier and more successful. My target is to promote personal empowerment through rational and logical reasoning and the correct use of language.</p>
							<p>Through Logic-Based Therapy you can benefit from the ancient knowledge of philosophy of the East and West. LBT is about tapping into the wisdom of Plato, Aristotle, Laozi, Hume, Nietzsche, Kirkegaard, Sartre, Mill, Hamvas, and Rorty, etc.</p>
							<p>You can expect to become experienced in flexing your willpower muscle, strengthen your ability to view things objectively, and learn to apply a more helpful perspective to different life situations.</p>
							<p>I would gladly be your ferryman to steer your boat clear of reefs and whirlpools and direct you towards happiness.</p>
							<p class="text-left">There are some sample problems addressed by LBT consultants</p>
							<ul class="text-left">
								<li>Moral issues; Values or Political disagreement</li>
								<li>Rejection</li>
								<li>Career, and Job or co-worker conflicts</li>
								<li>Time management issues; Procrastination</li>
								<li>Peer pressure</li>
								<li>Family relations; Family, Family planning, or In-law issues</li>
								<li>Relationship; Couples therapy, Falling in and out of love</li>
								<li>Breakups and Divorce</li>
								<li>Parenting issues; Becoming parent, Siblings, Rivalry, Adopted children</li>
								<li>Aging; Retirement, disability, Midlife, or End of life issues</li>
								<li>Financial issues</li>
								<li>Personal loss; Loss of a family member, a friend or a pet</li>
								<li>Discrimination; Religion or Race related issues</li>
							</ul -->

<?php
	$_GET['menuitem'] = 'page1';
	require('menu.php');
?>

						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- where_to Section -->
		<section class="page" id="page3">
			<div class="cover">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 col-lg-offset-2">
							<!-- h2>Other activities</h2>
							<h3>Interpreting</h3>
							<p>I'm a Face-to-face interpreter, who is bridging the gap between the English and the Hungarian languages. Most of my appointments are either in a medical or in a legal setting. However, I can utilise my expertise to aid private or business clients too. I'm precise as well as quick. I take each and every task equally seriously and handle all data confidentially.<br>Whenever I confirm your booking you can expect me to arrive on time dressed appropriately.</p>
							<h3>Teaching</h3>
							<p>I'm a teacher sometimes in a school or at the university. I trade in the classroom for a living room or for a café or maybe for a library from time to time. I'm enthusiastic about ethics and mathematics. I'm experienced in both of these fields as well as in the Hungarian and English language. I enjoy teaching people of varying abilities and I teach young and old, solo or a group, in English or in Hungarian.</p -->

<?php
	$_GET['menuitem'] = 'page3';
	require('menu.php');
?>

						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- where_from Section -->
		<section class="page" id="page4">
			<div class="cover">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 col-lg-offset-2">
							<!-- h2>Background</h2>
							<p>Soon...</p -->

<?php
	$_GET['menuitem'] = 'page4';
	require('menu.php');
?>

						</div>
					</div>
				</div>
			</div>
		</section>

		<!-- Contact Section -->
		<section class="page" id="page2">
			<div class="cover">
				<div class="container">
					<div class="row">
						<div class="col-lg-8 col-lg-offset-2">
							<!-- h2>Contact</h2>
							<p>In real life you can find me in London, UK; sometimes in Budapest, HUN, and occasionally in Sajószentpéter.</p>
							<ul class="list-inline banner-social-buttons">
								<li><a href="tel:07719612287">07719 612 287</a></li>
								<li><a href="mailto:tamas@mezei.co.uk">tamas@mezei.co.uk</a></li>
								<li><a href="https://www.linkedin.com/in/tamasmezei">Linkedin</a></li>
								<li><a href="http://npcassoc.org/philosophical-counselor-directory/">NPCA reference under UK</a></li>
							</ul -->

<?php
	$_GET['menuitem'] = 'page2';
	require('menu.php');
?>

						</div>
					</div>
				</div>
			</div>
		</section>

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