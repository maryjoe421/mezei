<?php

if(isset($_SESSION["username"])) {
	if(isset($_POST["save"])) {
		$userid = $_POST["userid"];
		$password0 = md5($_POST["password0"]);
		$password1 = md5($_POST["password1"]);
		$password2 = md5($_POST["password2"]);

		$pwd_query = "SELECT * FROM sys_user WHERE id='$userid'";
		$pwd_result = mysql_query($pwd_query);
		$pwd_result_row = mysql_fetch_array($pwd_result);

		if ($password0 == "" && $password1 == "" && $password2 == "") {
			echo '<p>'.$lang["WARNING_EMPTYFIELD"][$_COOKIE['language']].'</p>';
			header("refresh: 2 url=index.php?b=pwd");
		} elseif ($pwd_result_row["password"] != $password0) {
			echo '<p>'.$lang["WARNING_PASSWORDNOTEXISTS"][$_COOKIE['language']].'</p>';
			header("refresh: 2 url=index.php?b=pwd");
		} elseif ($password1 != $password2) {
			echo '<p>'.$lang["WARNING_PASSWORDSNOTEQUAL"][$_COOKIE['language']].'</p>';
			header("refresh: 2 url=index.php?b=pwd");
		} else {
			$query = "UPDATE sys_user SET password='$password' WHERE id='$userid'";
			mysql_query($query);
			header("location: index.php");
		}
	} elseif(isset($_POST["cancel"])) {
		header("location: index.php");
	} else {
		if(isset($_GET["userid"])) {
			$userid = $_GET["userid"];
			$query = "SELECT * FROM sys_user WHERE id='$userid'";
			$result = mysql_query($query);
			$result_row = mysql_fetch_array($result);
?>

<h1><?php echo $lang["MODIFY_PASSWORD"][$_COOKIE['language']]; ?></h1>
<div class="row">
	<div class="col-sm-6 col-lg-4">
		<form action="?b=pwd" method="post">
			<input type="hidden" name="userid" value="<?php echo $userid?>" />
			<div class="form-group">
				<label><?php echo $lang["LOGIN_USERNAME"][$_COOKIE['language']]; ?>:</label><br>
				<span><?php echo $result_row["username"]?></span>
			</div>
			<div class="form-group">
				<label><?php echo $lang["USER_EMAIL"][$_COOKIE['language']]; ?>:</label><br>
				<span><?php echo $result_row ["email"]?></span>
			</div>
			<div class="form-group">
				<label for="inputPassword0"><?php echo $lang["LOGIN_PASSWORD"][$_COOKIE['language']]; ?></label>
				<input type="password" id="inputPassword0" class="form-control" placeholder="<?php echo $lang["LOGIN_PASSWORD"][$_COOKIE['language']]; ?>" name="password0" />
			</div>
			<div class="form-group">
				<label for="inputPassword1"><?php echo $lang["NEW_PASSWORD"][$_COOKIE['language']]; ?></label>
				<input type="password" id="inputPassword1" class="form-control" placeholder="<?php echo $lang["NEW_PASSWORD"][$_COOKIE['language']]; ?>" name="password1" />
			</div>
			<div class="form-group">
				<label for="inputPassword2"><?php echo $lang["RETYPE_PASSWORD"][$_COOKIE['language']]; ?></label>
				<input type="password" id="inputPassword2" class="form-control" placeholder="<?php echo $lang["RETYPE_PASSWORD"][$_COOKIE['language']]; ?>" name="password2" />
			</div>
			<div class="form-group">
				<div class="row">
					<div class="col-xs-6">
						<button type="submit" class="btn btn-block btn-lg btn-primary" name="save"><?php echo $lang["FORM_SAVE"][$_COOKIE['language']]; ?></button>
					</div>
					<div class="col-xs-6">
						<button type="submit" class="btn btn-block btn-lg" name="cancel"><?php echo $lang["FORM_CANCEL"][$_COOKIE['language']]; ?></button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<?php
		} else {
			echo '<p>'.$lang["ERROR_NOTEXISTID"][$_COOKIE['language']].' ($userid)</p>';
			header("refresh: 2 url=index.php");
		}
	}
} else {
	echo '<p>'.$lang["ERROR_PRIVILEGE"][$_COOKIE['language']].'</p>';
	header("refresh: 2 url=index.php");
}
?>
