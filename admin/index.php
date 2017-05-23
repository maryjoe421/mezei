<?php
ob_start();
session_start();

include("../config.php");
include("../function.php");
include("../language.php");

if(isset($_GET["p"])) {
	$p = $_GET['p'];
} else {
	$p = '';
}
?>

<!DOCTYPE html>
<html lang="<?php echo $_COOKIE['language']; ?>">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Tamas Mezei</title>

		<!-- Bootstrap Core CSS -->
		<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

		<!-- Custom Fonts -->
		<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		
		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Great+Vibes&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet" type="text/css">

<?php
if(isset($_SESSION["username"])) {
?>
		<!-- Theme CSS -->
		<link href="css/admin.css" rel="stylesheet">
<?php
} else {
?>
		<!-- Login CSS -->
		<link href="css/login.css" rel="stylesheet">
<?php
}
?>
	</head>
	<body id="page-top">
		<div class="container">

<?php
	$adminpath = '';
	include($adminpath . "bar.php");
?>
		<div class="content">
<?php
if(isset($_SESSION["username"])) {
	if(isset($_GET["b"])) {
		include($_GET["b"].".php");
	} else {
		include("main.php");
	}
} else {
	include("login.php");
}
?>
		</div>
		<!-- jQuery -->
		<script src="../vendor/jquery/jquery.min.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

		<!-- Theme JavaScript -->
		<script src="js/admin.js"></script>

		<script type="text/javascript" src="tiny_mce/tiny_mce.js"></script>

		<!-- tinyMCE editor -->
		<script type="text/javascript">
			tinyMCE.init({
				mode : "exact",
				theme : "advanced",
				elements : "textEntry",
				skin : "default",
				skin_variant : "black",
				plugins : "contextmenu, table",
				theme_advanced_buttons1 : "formatselect,|,bold,italic,underline,|,justifyleft,justifycenter,justifyright,justifyfull,|,bullist,|,outdent,indent,|,undo,redo,|,link,unlink,|,image,|,table,|,code",
				theme_advanced_buttons2 : "",
				theme_advanced_buttons3 : "",
				theme_advanced_buttons4 : "",
				theme_advanced_toolbar_location : "top",
				theme_advanced_toolbar_align : "left"
			});
		</script>
	</body>
</html>
<?php ob_end_flush(); ?>
