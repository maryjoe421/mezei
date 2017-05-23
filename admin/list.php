<?php
	$p = $_GET["p"];
	foreach ($menuitems as $items => $title) {
		if ($p == $items) { echo '<h1 id="'.$items.'">'.$title.'</h1>'; }
	}
	if($_SESSION["privilege"] == "user") {
		$order = " ORDER BY date DESC";
		$query = "SELECT * FROM ".$table_prefix.$p.$order;
		$result = mysql_query($query);
		$lastResultItem = mysql_num_rows($result);
		if ($lastResultItem > 0) {
			echo '
<div class="box-text">';
			$resultItem = 0;
			while ($result_row = mysql_fetch_array($result)) {
				$resultItem++;
				echo '<h2>' . $result_row["title"] . '</h2>';
				echo $result_row["text"];
				if(isset($_SESSION["username"])) {
					echo '
<div class="form-froup">';
					if ($result_row["published"] == 0) {
						echo '
	<a href="?b=pub&amp;p='.$p.'&amp;id='.$result_row["id"].'" class="btn btn-primary"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> '.$lang["PUBLISH_POST"][$_COOKIE['language']].'</a>';
					}
					echo '
	<a href="?b=mod&amp;p='.$p.'&amp;id='.$result_row["id"].'" class="btn btn-default"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> '.$lang["MODIFY_POST"][$_COOKIE['language']].'</a>
	<a href="?b=del&amp;p='.$p.'&amp;id='.$result_row["id"].'" class="btn btn-danger"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span> '.$lang["DELETE_POST"][$_COOKIE['language']].'</a>
</div>';
				}
			}
			echo '
</div>';
		}
	}
?>
