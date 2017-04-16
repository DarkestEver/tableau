<?php
require_once ("../Library/functions.php"); 
$id = $_POST['id'];
$groupname = $_POST['groupname'];
$status = $_POST['status'];
$description = $_POST['description'];
$chkcount = count($id);
for($i=0; $i<$chkcount; $i++)
{
	//$MySQLiconn->query("UPDATE users SET first_name='$fn[$i]', last_name='$ln[$i]' WHERE id=".$id[$i]);
	//updateDashboard($id[$i],$dashboardname[$i],$url[$i],$defaultdash[$i],$status[$i]);
	updategroupdashboard($id[$i],$groupname[$i], $description[$i],$status[$i]);
}
?>