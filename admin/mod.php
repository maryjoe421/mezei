<?php
	if($_SESSION["privilege"] == "user") {
		if(isset($_POST["save"])) {
			$p = $_POST["p"];
			$id = $_POST["id"];
			$date = ($_POST["date"] != '') ? $_POST["date"] : date("Y-m-d H:i:s");
			$title = htmlspecialchars($_POST["title"]);
			$text = mysql_real_escape_string($_POST["text"]);
			$language = htmlspecialchars($_POST["language"]);
			$published = ($p == "publications") ? "1" : "0";
			$id_check = "SELECT * FROM ".$table_prefix.$p." WHERE id='$id'";
			if($is_id = mysql_query($id_check) and mysql_num_rows($is_id) > 0){
				$query = "UPDATE ".$table_prefix.$p." SET date='$date', title='$title', text='$text', language='$language', published='$published' WHERE id='$id'";
				mysql_query($query);
				header("Location: index.php?b=list&p=$p");
			} else {
				echo '<p>'.$lang["ERROR_NOTEXISTID"][$_COOKIE['language']].' ($id)</p>';
				header("Refresh: 2 url=index.php?b=list&p=$p");
			}
		} elseif(isset($_POST["cancel"])) {
			$p = $_POST["p"];
			header("Location: index.php?b=list&p=$p");
		} else {
			if(isset($_GET["id"])) {
				$p = $_GET["p"];
				$id = $_GET["id"];
				$query = "SELECT * FROM ".$table_prefix.$p." WHERE id='$id'";
				$result = mysql_query($query);
				$result_row = mysql_fetch_array($result);
?>

	<h1><?php echo $lang["MODIFY_POST"][$_COOKIE['language']]; ?></h1>
	<div class="row">
		<div class="col-sm-6">
			<form action="?b=mod" method="post">
				<input type="hidden" name="p" value="<?php echo $_GET["p"]; ?>" />
				<input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>" />
				<div class="form-group">
					<label for="inputTitle"><?php echo $lang["POST_TITLE"][$_COOKIE['language']]; ?>:</label>
					<input type="text" id="inputTitle" class="form-control" name="title" placeholder="<?php echo $lang["POST_TITLE"][$_COOKIE['language']]; ?>" value="<?php echo $result_row["title"]?>" />
				</div>
				<div class="form-group">
					<label for="inputDate"><?php echo $lang["POST_DATE"][$_COOKIE['language']]; ?>:</label>
					<input type="text" id="inputDate" class="form-control" name="date" placeholder="<?php echo $lang["POST_DATE"][$_COOKIE['language']]; ?>" value="<?php echo $result_row["date"]?>" />
				</div>
				<div class="form-group">
					<label for="textEntry"><?php echo $lang["POST_TEXT"][$_COOKIE['language']]; ?>:</label>
					<textarea name="text" id="textEntry" class="form-control" rows="10" cols=""><?php echo $result_row["text"]?></textarea>
				</div>
				<div class="form-group">
					<label for="selectLanguage"><?php echo $lang["POST_LANGUAGE"][$_COOKIE['language']]; ?>:</label>
					<select name="language" class="form-control" id="selectLanguage">
						<option value=""><?php echo $lang["OPTION_DEFAULT"][$_COOKIE['language']]; ?></option>
						<option value="hu"<?php if ($result_row["language"] == "hu") { echo ' selected="selected"'; } ?>><?php echo $lang["OPTION_HU"][$_COOKIE['language']]; ?></option>
						<option value="en"<?php if ($result_row["language"] == "en") { echo ' selected="selected"'; } ?>><?php echo $lang["OPTION_EN"][$_COOKIE['language']]; ?></option>
					</select>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-xs-6">
							<button type="submit" class="btn btn-lg btn-block btn-primary" name="save"><?php echo $lang["FORM_SAVE"][$_COOKIE['language']]; ?></button>
						</div>
						<div class="col-xs-6">
							<button type="submit" class="btn btn-lg btn-block btn-default" name="cancel"><?php echo $lang["FORM_CANCEL"][$_COOKIE['language']]; ?></button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>

<?php
			} else {
				echo '<p>'.$lang["ERROR_NOTEXISTID"][$_COOKIE['language']].' ($id)</p>';
				header("Refresh: 2 url=index.php?b=list&p=$p");
			}
		}
	} else {
		echo '<p>'.$lang["ERROR_PRIVILEGE"][$_COOKIE['language']].'</p>';
		header("Refresh: 2 url=index.php?b=list&p=$p");
	}
?>
