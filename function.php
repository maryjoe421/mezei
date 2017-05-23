<?php
	function isLoggedUser() {
		if (isset($_SESSION["privilege"]) && $_SESSION["privilege"] == "user") {
			return true;
		} else {
			return false;
		}
	}

	function setLanguage() {
		if (!empty($_GET['language'])) {
			$_COOKIE['language'] = $_GET['language'] === 'en' ? 'en' : 'hu';
		} else {
			$_COOKIE['language'] = 'hu';
		}
		setcookie('language', $_COOKIE['language']);
	}

?>