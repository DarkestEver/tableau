<?php
include_once 'functions.php';
$id = $_POST['id'];
$typ = $_POST['typ'];
$cmd = $_POST['cmd'];
$dim = $_POST['dim'];
$val = $_POST['val'];
$spe = $_POST['spe'];
$tabtable = $_POST['TableauTable1'];
$tabSheet = $_POST['spe'];
updateCmd($typ,$cmd,$dim,$val,$spe,$tabtable,$tabSheet,$id)
header("Location: index.php");
?>