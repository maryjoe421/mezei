<?php

if($_SESSION["privilege"] == "admin") {
	if(isset($_POST["save"])) {
		$username = htmlspecialchars($_POST["username"]);
		$password = md5($_POST["password"]);
		$email = htmlspecialchars($_POST["email"]);
		$privilege = htmlspecialchars($_POST["privilege"]);
		$query = "INSERT INTO sys_user (username, password, email, privilege) VALUES ('$username', '$password', '$email', '$privilege')";
		mysql_query($query);
		header("location: index.php");
	} elseif(isset($_POST["cancel"])) {
		header("location: index.php");
	}
?>

<h1><?php echo $lang["ADD_NEW_USER"][$_COOKIE['language']]; ?></h1>
<div class="row">
	<div class="col-sm-6 col-lg-4">
		<form action="?b=user" method="post">
			<div class="form-group">
				<label for="inputUsername"><?php echo $lang["LOGIN_USERNAME"][$_COOKIE['language']]; ?>:</label>
				<input type="text" id="inputUsername" class="form-control" placeholder="<?php echo $lang["LOGIN_USERNAME"][$_COOKIE['language']]; ?>" name="username" />
			</div>
			<div class="form-group">
				<label for="inputPassword"><?php echo $lang["LOGIN_PASSWORD"][$_COOKIE['language']]; ?>:</label>
				<input type="password" id="inputPassword" class="form-control" placeholder="<?php echo $lang["LOGIN_PASSWORD"][$_COOKIE['language']]; ?>" name="password" />
			</div>
			<div class="form-group">
				<label for="inputEmail"><?php echo $lang["USER_EMAIL"][$_COOKIE['language']]; ?>:</label>
				<input type="text" id="inputEmail" class="form-control" placeholder="<?php echo $lang["USER_EMAIL"][$_COOKIE['language']]; ?>" name="email" />
			</div>
			<div class="form-group">
				<label for="selectPrivilege"><?php echo $lang["PRIVILEGE"][$_COOKIE['language']]; ?>:</label>
				<select class="form-control" id="selectPrivilege" name="privilege">
					<option value="user"><?php echo $lang["PRIVILEGE_USER"][$_COOKIE['language']]; ?></option>
					<option value="admin"><?php echo $lang["PRIVILEGE_ADMIN"][$_COOKIE['language']]; ?></option>
				</select>
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
	echo '<p>'.$lang["ERROR_PRIVILEGE"][$_COOKIE['language']].'</p>';
	header("refresh: 3 url=index.php");
}
?>
