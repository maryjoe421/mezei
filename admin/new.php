<?php
	if($_SESSION["privilege"] == "user") {
		if(isset($_POST["save"])) {
			$p = $_POST["p"];
			$date = date("Y-m-d H:i:s");
			$title = htmlspecialchars($_POST["title"]);
			$text = mysql_real_escape_string($_POST["text"]);
			$language = htmlspecialchars($_POST["language"]);
			$published = ($p == "publications") ? "1" : "0";
			$query = "INSERT INTO ".$table_prefix.$p." (date, title, text, language, published) VALUES ('$date', '$title', '$text', '$language', '$published')";
			mysql_query($query);
			header("location: index.php?b=list&p=$p");
		} elseif(isset($_POST["cancel"])) {
			$p = $_POST["p"];
			header("location: index.php?b=list&p=$p");
		}
?>

	<h1><?php echo $lang["ADD_NEW_POST"][$_COOKIE['language']]; ?></h1>
	<div class="row">
		<div class="col-sm-6">
			<form action="?b=new" method="post">
				<input type="hidden" name="p" value="<?php echo $_GET["p"]; ?>" />
				<div class="form-group">
					<label for="inputTitle"><?php echo $lang["POST_TITLE"][$_COOKIE['language']]; ?>:</label>
					<input type="text" id="inputTitle" class="form-control" placeholder="<?php echo $lang["POST_TITLE"][$_COOKIE['language']]; ?>" name="title" />
				</div>
				<div class="form-group">
					<label for="textEntry"><?php echo $lang["POST_TEXT"][$_COOKIE['language']]; ?>:</label>
					<div class="editor-wrapper">
						<textarea name="text" id="textEntry" class="form-control" rows="10" cols=""></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="selectLanguage"><?php echo $lang["POST_LANGUAGE"][$_COOKIE['language']]; ?>:</label>
					<select name="language" class="form-control" id="selectLanguage">
						<option value=""><?php echo $lang["OPTION_DEFAULT"][$_COOKIE['language']]; ?></option>
						<option value="hu"><?php echo $lang["OPTION_HU"][$_COOKIE['language']]; ?></option>
						<option value="en"><?php echo $lang["OPTION_EN"][$_COOKIE['language']]; ?></option>
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
		header("refresh: 2 url=index.php?b=list&p=$p");
	}
?>
