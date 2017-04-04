<?php
include_once 'dbcon.php';
$id = $_POST['id'];
$typ = $_POST['typ'];
$cmd = $_POST['cmd'];
$dim = $_POST['dim'];
$val = $_POST['val'];
$chk = $_POST['chk'];
$chkcount = count($id);
for($i=0; $i<$chkcount; $i++)
{
	$MySQLiconn->query("UPDATE jsload SET type='$typ[$i]', command='$cmd[$i]', dimension = '$dim[$i]', value = '$val[$i]'  WHERE id=".$id[$i]);
}
header("Location: index.php");
?>