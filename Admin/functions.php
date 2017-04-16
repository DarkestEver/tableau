<?php 
require_once ("php-mysql/MysqliDb.php");
error_reporting(E_ALL);
 $root = $_SERVER['DOCUMENT_ROOT'];
 $installationDir = "tableau";
$json = json_decode(file_get_contents($root."/".$installationDir."/admin/dbconf.json"),TRUE);

	//conDb ();
	$db = new MysqliDb (Array (
						'host' =>  $json['host'],
						'username' =>  $json['username'],
						'password' => $json['password'],
						'db' =>  $json['db'],
						'port' =>  $json['port'],
						'prefix' => $json['prefix'],
						'charset' => $json['charset']
						));
	
	function getTAllFliters($nameofdashboard)
	{
			$db = MysqliDb::getInstance();
			$jsload = $db->get("jsload");
			return $jsload;
	}
	
	function getTFliters($nameofdashboard)
	{
			$db = MysqliDb::getInstance();
			$db->where("status","1");
			$db->where("dashboardid",$nameofdashboard);
			$jsload = $db->get("jsload");
			return $jsload;
	}
	function getTFlitersWithNull()
	{
			$db = MysqliDb::getInstance();
			$db->where("status","1");
			$db->where("dashboardid","0");
			$jsload = $db->get("jsload");
			return $jsload;
	}
	function getTDashboardone($id,$grpid)
	{
			$db = MysqliDb::getInstance();
			$db->where("id",$id);
			$db->where("groups",$grpid);
			$jsload = $db->getOne("dashboards");
			return $jsload;
	}
	function getTDashboard2($grpid)
	{
			$db = MysqliDb::getInstance();
			$db->orderBy("status","desc");
			$db->where("groups",$grpid);
			$jsload = $db->get("dashboards");
			return $jsload;
	}
	function getTDashboard()
	{
			$db = MysqliDb::getInstance();
			$db->orderBy("status","desc");
			$db->where("status","1");
			$jsload = $db->get("dashboards");
			return $jsload;
	}
	function getTDashboardgroup()
	{
			$db = MysqliDb::getInstance();
			$jsload = $db->get("dashboardgroups");
			return $jsload;
	}
	function getTDashboardgroupOnebyname($groupname)
	{
			$db = MysqliDb::getInstance();
			$jsload = $db->getOne("dashboardgroups");
			return $jsload;
	}
	function getTCong()
	{
			$db = MysqliDb::getInstance();
			$jsload = $db->get("config");
			return $jsload;
	}
	//cmdgroups
	function getcmdgroupsByDashId($dashid)
	{
			$db = MysqliDb::getInstance();
			$db->where("status","1");
			$db->where("dashboardid",$dashid);
			$result = $db->get("cmdgroups");
			return $result;
	}
	function getdashboardsByGroupId($groupid)
	{
			$db = MysqliDb::getInstance();
			$db->where("status","1");
			$db->where("groups",$groupid);
			$result = $db->get("dashboards");
			return $result;
	}
	function getdashboardsByGroupIdone($groupid)
	{
			$db = MysqliDb::getInstance();
			$db->where("status","1");
			$db->where("groups",$groupid);
			$db->where("defaultdash",'1');
			$result = $db->getOne("dashboards");
			return $result;
	}
	function getSingleCommand($id)
	{
			$db = MysqliDb::getInstance();
			$db->where("status","1");
			$db->where("id",$id);
			$result = $db->getOne("jsload");
			return $result;
	}
	function getSingleCommand3($id,$dashid,$grpid)
	{
			$db = MysqliDb::getInstance();
			$db->where("id",$id);
			$db->where("dashboardid",$dashid);
			$db->where("grpid",$grpid);
			$result = $db->getOne("jsload");
			return $result;
	}
	function getCmdTypeSingleCol($tableName, $colName)
	{
			$db = MysqliDb::getInstance();
			$qyr = 'SELECT distinct `' . $colName .  '` from  ' . $tableName .' order by `' . $colName . '` desc';
			$result =  $db->rawQueryValue ($qyr);
			return $result;
	}
	
	function getCmdType()
	{
			$db = MysqliDb::getInstance();
			$db->orderBy("type","asc");
			$db->where("status","1");
			$result = $db->get("type");
			return $result;
	}
	
	function getCmdCong()
	{
			$db = MysqliDb::getInstance();
			$db->where("status","1");
			$result = $db->get("config");
			return $result;
	}
	
	 function insertCommand($dashboardid,$grpid, $typ,$cmd,$dim,$val,$spe,$tab,$sheet)
	 {
			   $db = MysqliDb::getInstance();
			   $data = Array (
			   "dashboardid" => $dashboardid,
			   "grpid" => $grpid,
			   "type" => $typ,
               "command" => $cmd,
               "dimension" => $dim,
			   "value" => $val,
               "speech" => $spe,
               "TableauTable" => $tab,
			   "TableauSheet" => $sheet
				);
				$id = $db->insert ('jsload', $data);
				if($id)
					return $id;
				else
					0;
	 }
	 function getSingleDashboardgroups($id)
		{
				$db = MysqliDb::getInstance();
				$db->where("id",$id);
				$result = $db->getOne("dashboardgroups");
				return $result;
		}
	 function insertgroupdashboard($groupname, $description)
	 {
			   $db = MysqliDb::getInstance();
			   $data = Array (
			   "groupname" => $groupname,
			   "description" => $description,
               "status" => 1
				);
				$id = $db->insert ('dashboardgroups', $data);
				if($id)
					return $id;
				else
					return 0;
	 }
	  function insertdashboard($groups, $dashboardname,$url,$defaultdash )
	 {
			   $db = MysqliDb::getInstance();
			   $data = Array (
			   "groups" => $groups,
			   "dashboardname" => $dashboardname,
			   "url" => $url,
			   "defaultdash" => $defaultdash,
               "status" => 1
				);
				$id = $db->insert ('dashboards', $data);
				if($id)
					return $id;
				else
					return 0;
	 }
	 function deleteCmd($id)
	 {
		 $db = MysqliDb::getInstance();
		 $db->where('id', $id);
		 if($db->delete('jsload'))
			 return true;
		 else
			 return false;
	 }
	 
	function deleteById($id,$tableName)
	 {
		 $db = MysqliDb::getInstance();
		 $db->where('id', $id);
		 if($db->delete($tableName))
			 return true;
		 else
			 return false;
	 }

	 function updateCmd($cmd,$dim,$val,$spe,$tab,$sheet,$status,$id,$dashid,$grpid)
	 {
		 $db = MysqliDb::getInstance();
			   $data = Array (
			   
               "command" => $cmd,
               "dimension" => $dim,
			   "value" => $val,
               "speech" => $spe,
               "TableauTable" => $tab,
			   "TableauSheet" => $sheet,
			   "status" => $status,

				);

		$db->where ("id", $id);
		$db->where("grpid",$grpid);
		$db->where("dashboardid",$dashid);
		if ($db->update ('jsload', $data))
			 return 1;
		 else
			 return 0;
	 }
	 
	 function updateConfigs($id,$val,$status)
	 {
		 $db = MysqliDb::getInstance();
			   $data = Array (
               "congvalues" => $val,
               "status" => $status
				);
		$db->where ('id', $id);
		if ($db->update ('config', $data))
			 return 1;
		 else
			 return 0;
	 }
	 
function updateDashboard2($id,$grpid,$dashboardname,$url,$defaultdash,$status)
	 {
		 $db = MysqliDb::getInstance();
			   $data = Array (
               "dashboardname" => $dashboardname,
			   "url" => $url,
			   "defaultdash" => $defaultdash,
               "status" => $status
				);
		$db->where ('id', $id);
		$db->where ('groups', $grpid);
		if ($db->update ('dashboards', $data))
			 return 1;
		 else
			 return 0;
	 }

	 function updateDashboard($id,$dashboardname,$url,$defaultdash,$status)
	 {
		 $db = MysqliDb::getInstance();
			   $data = Array (
               "dashboardname" => $dashboardname,
			   "url" => $url,
			   "defaultdash" => $defaultdash,
			   
               "status" => $status
				);
		$db->where ('id', $id);
		if ($db->update ('dashboards', $data))
			 return 1;
		 else
			 return 0;
	 }
	  function updategroupdashboard($id,$groupname, $description,$status)
	 {
		 $db = MysqliDb::getInstance();
			   $data = Array (
               "id" => $id,
			   "groupname" => $groupname,
			   "description" => $description,
               "status" => $status
				);
		$db->where ('id', $id);
		if ($db->update ('dashboardgroups', $data))
			 return 1;
		 else
			 return 0;
	 }

	 function getTypeDropdown($selected="")
	 {
		 $db = MysqliDb::getInstance();
		 $s = '';
		 $cmdTypes = getCmdType();
		 foreach ($cmdTypes as $types)
		 {
		 	if ($selected != null && $types ==$selected)
		 	{
		 		$s .= "<option value='".$types['type']." selected='selected'>" .    $types['type']. ' - ' . $types['description']. "</option>";
		 	}
		 	else
		 	{
			 $s .= "<option value='".$types['type']."'>" .    $types['type']. ' - ' . $types['description']. "</option>";
		 	}
		 }
		 return  "<select name='filter' id='filter' class='form-control'>" . $s . "</select>";
		 	
	 }
	 
	  function getDashboardDropdown()
	 {
		 $db = MysqliDb::getInstance();
		 $s = '';
		 $cmdTypes = getTDashboard();
		 foreach ($cmdTypes as $types)
		 {
			 $s .= "<option value='".$types['id']."'>" .    $types['dashboardname']."</option>";
		 }
		 return  "<select name='dashboardid' id='dashboardid' class='form-control'>" . $s . "</select>";
	 }
	 
	 function keyPairValue($tableName, $keyCol, $valCol)
	 {
		 $keyPairArray = array();
		 $db = MysqliDb::getInstance();
		 $congifs = getCmdCong();
		 foreach ($congifs as $congif)
		 {
			 $keyPairArray[$congif[$keyCol]] = $congif[$valCol];
		 }
		 return $keyPairArray;
	 }
	 
	 function cleanText($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
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

//DynamicTableCommand-tHierarchyfilter
function DynamicTableCommandtHierarchyfilter($dimension,$TableauTable,$TableauSheet,$command,$speech)
{

$dim= array();
$strng = "";
$constr = "";
$size = 0;
$dim = explode(",", $dimension);
$extualDim = $dim[sizeof($dim)-1];

$dynCmds = getCmdTypeSingleCol($TableauTable ,$extualDim );
foreach ($dynCmds as $dynCmd)
{
$strng = "";
if ($speech != '')
	{ 
		for ($i=0; $i < sizeof($dim)-1 ; $i++) 
		{ 				
			$strng = $strng."tAllfilter( '".$dim[$i]."','','".$TableauSheet."');";
		}
		$constr .=  "'". $command.' '.$dynCmd."' : function() {".$strng."tFilter( '".$extualDim."','".$dynCmd."','".$TableauSheet."');Speech('".$speech.' '.$dynCmd."')},";
	}
	else
	{
		for ($i=0; $i < sizeof($dim)-1 ; $i++) 
		{ 				
			$constr =  $strng ."tAllfilter( '".$dim[$i]."','','".$TableauSheet."');";
		}
		$constr .=  $constr."'". $command.' '.$dynCmd."' : function() {".$strng."tFilter( '".$extualDim."','".$dynCmd."','".$TableauSheet."');},";
		//$strng = "'". $command.' '.$dynCmd."' : function() {". $strng."tFilter( '".$extualDim."','".$dynCmd."','".$TableauSheet."');},";
	}

}

return $constr;
}

//str_replace("world","Peter","Hello world!");
function tparameter($dimension,$command,$fvalue)
{
$strng = "";
for ($i=1;$i<=$fvalue;$i++)
{	
     $cmd =  str_replace("{number}",$i,$command);
	//changeParameterValueAsync(dimension, fvalue)
	 // "tSetParameter( '".$dim[$size]."','','".$TableauSheet."');";
	  $strng .= "'".$cmd."' : function() { tSetParameter( '" .$dimension."','".$i."'); Speech('".$cmd."')},";
}
return $strng;
}


		$keyPairCongig = array();
		$keyPairCongig = keyPairValue('config','congkey','congvalues');

	?>