<?php
	// include("config.php");
	// include("function.php");

	if(isset($_GET['menuitem'])) {
		$menuitem = $_GET['menuitem'];
	} else {
		$menuitem = '';
	}

	$lang = ($_COOKIE['language'] == "en") ? "en" : "hu";

	$table = $table_prefix . $menuitem;

/*	$lang_query = "SELECT DISTINCT language FROM $table";
	$lang_result = mysql_query($lang_query);
	$lastLangItem = mysql_num_rows($lang_result);
	if ($lastLangItem > 0) {
		while ($lang_result_row = mysql_fetch_array($lang_result)) {
			$lang = $lang_result_row["language"]; */

			$select = "SELECT * FROM $table ";
			$where = (isLoggedUser() === false || $lang != '') ? "WHERE " : "";
			$published = (isLoggedUser() === false) ? "published=1" : "";
			$and = (isLoggedUser() === false && $lang != '') ? " AND " : "";
			$language = ($lang != '') ? "language='$lang'" : "";
			$order = " ORDER BY date DESC";
			$menu_query = $select . $where . $published . $and . $language . $order;
			// echo $menu_query . " - " . ((isLoggedUser() === true) ? "isLoggedUser igaz": "isLoggedUser hamis") . " - " . (($lang != '') ? "lang igaz": "lang hamis");

			$menuItem = 0;
			$menu_result = mysql_query($menu_query);
			$lastMenuItem = mysql_num_rows($menu_result);
			if ($lastMenuItem > 0) {
				while ($menu_result_row = mysql_fetch_array($menu_result)) {
					$menuItem++;
					if ($menu_result_row["title"] != "") {
						echo '<h2>' . $menu_result_row["title"] . '</h2>';
					}
					echo $menu_result_row["text"];
				}
			}
		/* }
	} */
?>
