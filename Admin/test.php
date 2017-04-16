
<?php 

echo  $_SERVER['DOCUMENT_ROOT'];


/*
$arr = array(
	"host" => "localhost",
"username" => "root",
"password" => "root",
"db" => "tableau",
"port" => "3306",
"prefix" => "",
"charset" => "utf8"
);

file_put_contents('conf.json',json_encode($arr));
require_once ("functions.php");

function groupcommand($gid)
{
$db->join("jsload jsload", "jsload.id=cng.cmdid", "LEFT");
$db->Where( "cnf.grpid",$gid);
$rows = $db->get ("cmdngrpmaping cng", null, "");
}

function getcmdgroup()
	{
			$db = MysqliDb::getInstance();
			$db->where("status","1");
			$jsload = $db->get("cmdgroups");
			return $jsload;
	}


$grows = groupcommand();

foreach ($grow as $key => $value) {
	
}

function getCmdTiggers()
	{
			$db = MysqliDb::getInstance();
			$db->where("status","1");
			$jsload = $db->get("cmdtriggers");
			return $jsload;
	}


$rows = getCmdTiggers();
foreach ($rows as $key => $value) {
	echo "annyang.trigger(['".$value['mainvalue']."', '".$value['triggervalue']."']);";
}





/////////// function ///////////////////
function tHierarchyfilter($dimension,$fvalue,$TableauSheet)
{

$dim= array();
$strng = "";
$size = 0;
$dim= explode(",", $dimension);

for ($i=0; $i < sizeof($dim)-1 ; $i++) { 				
	$strng = $strng."tAllfilter( '".$dim[$i]."','','".$TableauSheet."');";
	$size = $size+1;
}
echo $strng = $strng."tFilter( '".$dim[$size]."','".$fvalue."','".$TableauSheet."');";
}


//// voice////
if ($filter['type'] == 'tHierarchyfilter' )
				{
	echo "'". $filter['command']."' : function() {";
	echo tHierarchyfilter($filter['dimension'],$filter['value'],$filter['TableauSheet']);
	//"  Speech('".$filter['Speech']);
	echo " },";
}

 */
?>

