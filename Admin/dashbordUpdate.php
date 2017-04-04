<?php
require_once ("functions.php"); 
$id = $_POST['id'];
$dashboardname = $_POST['dashboardname'];
$status = $_POST['status'];
$url = $_POST['url'];
$defaultdash = $_POST['defaultdash'];
$chkcount = count($id);
for($i=0; $i<$chkcount; $i++)
{
	//$MySQLiconn->query("UPDATE users SET first_name='$fn[$i]', last_name='$ln[$i]' WHERE id=".$id[$i]);
	updateDashboard($id[$i],$dashboardname[$i],$url[$i],$defaultdash[$i],$status[$i]);
}
?>