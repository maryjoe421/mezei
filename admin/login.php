<?php
if (isset($_POST["save"])) {
	$username = htmlspecialchars($_POST["username"]);
	$password = md5($_POST["password"]);
	$query = "SELECT * FROM sys_user WHERE (username='$username' AND password='$password')";
	$result = mysql_query($query);
	if (mysql_num_rows($result) > 0) {
		$result_row = mysql_fetch_array($result);
		$_SESSION["userid"] = $result_row["id"];
		$_SESSION["username"] = $result_row["username"];
		$_SESSION["privilege"] = $result_row["privilege"];
		header("location: index.php");
	} else {
		echo '<p class="warning">'.$lang["ERROR_LOGIN"][$_COOKIE['language']].'</p>';
	}
}
?>

	<form action="?b=login" method="post" class="form-signin">
		<h2 class="form-signin-heading text-center">mezei.co.uk</h2>
		<label for="inputUsername" class="sr-only"><?php echo $lang["LOGIN_USERNAME"][$_COOKIE['language']]; ?></label>
		<input type="text" name="username" id="inputUsername" class="form-control" placeholder="<?php echo $lang["LOGIN_USERNAME"][$_COOKIE['language']]; ?>" autofocus>
		<label for="inputPassword" class="sr-only"><?php echo $lang["LOGIN_PASSWORD"][$_COOKIE['language']]; ?></label>
		<input type="password" name="password" id="inputPassword" class="form-control" placeholder="<?php echo $lang["LOGIN_PASSWORD"][$_COOKIE['language']]; ?>">
		<button class="btn btn-lg btn-primary btn-block" type="submit" name="save"><?php echo $lang["LOGIN"][$_COOKIE['language']]; ?></button>
	</form>