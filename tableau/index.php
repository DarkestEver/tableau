<?php 
require_once ("php-mysql/MysqliDb.php");
error_reporting(E_ALL);
    function conDb () {
        $mysqli = new mysqli ('localhost', 'root', 'root', 'test');
		$db = new Mysqlidb($mysqli);

		$db = new Mysqlidb(Array (
						'host' => 'localhost',
						'username' => 'root',
						'password' => 'root',
						'db' => 'test'));
		if(!$db) die("Database error");
    }

function getTFliters()
{
	 $mysqli = new mysqli ('localhost', 'root', 'root', 'test');
		$db = new Mysqlidb($mysqli);
		$jsload = $db->get("jsload");
		return $jsload;
	
}

?>
