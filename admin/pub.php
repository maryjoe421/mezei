<?php
include("../config.php");

$p = $_GET["p"];

if($_SESSION["privilege"] == "user") {
	if(isset($_GET["id"])) {
		$id = $_GET["id"];
		$id_check = "SELECT * FROM ".$table_prefix.$p." WHERE id='$id'";
		if($is_id = mysql_query($id_check) and mysql_num_rows($is_id) > 0){
			$pub_post = "UPDATE ".$table_prefix.$p." SET published='1' WHERE id='$id'";
			mysql_query($pub_post);
			header("location: index.php?b=list&p=$p");
		} else {
			echo '<p>'.$lang["ERROR_NOTEXISTID"][$_COOKIE['language']].' ($id)</p>';
			header("refresh: 2 url=index.php?b=list&p=$p");
		}
	} else {
		echo '<p>'.$lang["ERROR_EMPTYID"][$_COOKIE['language']].'</p>';
		header("refresh: 2 url=index.php?b=list&p=$p");
	}
} else {
	header("location: index.php?b=list&p=$p");
}
?>