<?php

if($_SESSION["privilege"] == "admin") {
	if(isset($_POST["save"])) {
		$id = $_POST["id"];
		$password = md5($_POST["password"]);
		$email = htmlspecialchars($_POST["email"]);
		$privilege = htmlspecialchars($_POST["privilege"]);
		$query = "UPDATE sys_user SET password='$password', email='$email', privilege='$privilege' WHERE id='$id'";
		mysql_query($query);
		header("location: index.php");
	} elseif(isset($_POST["cancel"])) {
		header("location: index.php");
	}
?>

<h1><?php echo $lang["MODIFY_USER_DATA"][$_COOKIE['language']]; ?></h1>
<div class="row">
	<div class="col-sm-6 col-lg-4">
		<form action="?b=set" method="post">

<?php
		$query = "SELECT * FROM sys_user WHERE privilege='user'";
		$result = mysql_query($query);
		while ($result_row = mysql_fetch_array($result)) {
?>

			<div class="form-group">
				<div class="radio">
					<label for="pass_<?php echo $result_row["id"]?>">
						<input type="radio" name="id" value="<?php echo $result_row["id"]?>" id="pass_<?php echo $result_row["id"]?>" /><?php echo $result_row["username"]?>
					</label>
				</div>
			</div>
			<div class="form-group">
				<label for="inputPassword"><?php echo $lang["LOGIN_PASSWORD"][$_COOKIE['language']]; ?></label>
				<input type="password" id="inputPassword" class="form-control" placeholder="Jelszó" name="password" />
			</div>
			<div class="form-group">
				<label for="inputEmail"><?php echo $lang["USER_EMAIL"][$_COOKIE['language']]; ?>:</label>
				<input type="text" id="inputEmail" class="form-control" placeholder="E-mail" name="email" value="<?php echo $result_row["email"]?>" />
			</div>
			<div class="form-group">
				<label for="selectPrivilege"><?php echo $lang["PRIVILEGE"][$_COOKIE['language']]; ?>:</label>
				<select class="form-control" id="selectPrivilege" name="privilege">
					<option value="user"<?php if ($result_row["privilege"] == "user") { echo ' selected="selected"'; } ?>><?php echo $lang["PRIVILEGE_USER"][$_COOKIE['language']]; ?></option>
					<option value="admin"<?php if ($result_row["privilege"] == "admin") { echo ' selected="selected"'; } ?>><?php echo $lang["PRIVILEGE_ADMIN"][$_COOKIE['language']]; ?></option>
				</select>
			</div>
			<hr>

<?php
		}
?>

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
	header("refresh: 2 url=index.php");
}
?>
