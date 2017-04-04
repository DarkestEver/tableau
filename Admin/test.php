<?php 
require_once ("functions.php");

$keyPairCongig = array();
$keyPairCongig = keyPairValue('config','congkey','congvalues');
echo  isset($keyPairCongig['1'])  ? $keyPairCongig['1'] : null  ;

?>

