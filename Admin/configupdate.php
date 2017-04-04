<?php
require_once ("functions.php"); 
$id = $_POST['id'];
$val = $_POST['val'];
$stat = $_POST['stat'];
$chkcount = count($id);
for($i=0; $i<$chkcount; $i++)
{
	//$MySQLiconn->query("UPDATE users SET first_name='$fn[$i]', last_name='$ln[$i]' WHERE id=".$id[$i]);
	updateConfigs($id[$i],$val[$i],$stat[$i]);
}
?>