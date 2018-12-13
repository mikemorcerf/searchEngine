<?php
ob_start();

try {

	$con = new PDO("mysql:dbname=search_engine;host=localhost", "root", "");
	$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
}
catch(PDOExeption $e) {
	echo "Connection failed: " . $e->getMessage();
}
?>