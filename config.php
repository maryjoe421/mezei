<?php
header("content-type: text/html; charset=utf-8");
// Itt állítsd be a MySQL-hez való kapcsolódást!

$sql_host = "localhost";    // MySQL szerver ***Ez általában localhost!***
$sql_felhasznalo = "mezei.co.uk";  // MySQL felhasználónév
$sql_jelszo = "2u5Ke7795xdV";    // MySQL jelszó
$sql_adatbazis = "mezei_db";    // MySQL adatbázis

// kapcsolódás a MYSQL szerverhez... Ezt a részt ne változtasd meg!
// mysql_connect("$sql_host", "$sql_felhasznalo", "$sql_jelszo") or die("Nem lehet csatlakozni a MySQL kiszolgálóhoz!");
// mysql_select_db("$sql_adatbazis") or die("Nem tudtam kiválasztani az adatbázist! (<b>$sql_adatbazis</b>)");

mysql_connect("$sql_host", "$sql_felhasznalo", "$sql_jelszo") or die('<h2>MySql hiba</h2><p>Nem lehet csatlakozni a MySQL kiszolgálóhoz!</p>');
mysql_select_db("$sql_adatbazis") or die('<h2>Adatbázis hiba</h2><p>Nem tudtam kiválasztani az adatbázist!</p>');
mysql_query('SET NAMES utf8');

$menuitems = array(
	"page1" => "Logic-Based Therapy",
	"page3" => "Background",
	"page4" => "Contact",
	"page2" => "Other activities"
);

$languages = array(
	"hu" => "magyar",
	"en" => "english"
);

$table_prefix = "mt_";

?>