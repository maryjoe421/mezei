<?php
if($_SESSION["privilege"] != "") {
	if(isset($_GET["userid"])) {
		$userid = $_GET["userid"];
		$query = "SELECT * FROM sys_user WHERE id='$userid'";
		$result = mysql_query($query);
		$result_row = mysql_fetch_array($result);
?>

<h1><?php echo $lang["USER_PROFILE"][$_COOKIE['language']]; ?></h1>
<div class="row">
	<div class="col-sm-6 col-lg-4">
		<h4 class="media-heading"><a href="mailto:<?php echo $result_row["email"]?>"><?php echo $result_row["username"]?></a></h4>
		<p><?php echo ($result_row["privilege"] == "admin") ? $lang["PRIVILEGE_ADMIN"][$_COOKIE['language']] : $lang["PRIVILEGE_USER"][$_COOKIE['language']]; ?></p>
	</div>
</div>

<?php
	}
} else {
	echo '<p>'.$lang["ERROR_PRIVILEGE"][$_COOKIE['language']].'</p>';
	header("refresh: 2 url=index.php");
}
?>