<?php 
require_once ("php-mysql/MysqliDb.php");
error_reporting(E_ALL);
   
	
	//conDb ();
	$db = new MysqliDb (Array (
						'host' => 'localhost',
						'username' => 'root',
						'password' => 'root',
						'db' => 'test',
						'port' => 3306,
						'prefix' => '',
						'charset' => 'utf8'
						));
		
	function getTFliters()
	{
			$db = MysqliDb::getInstance();
			$jsload = $db->get("jsload");
			return $jsload;
	}
	
	function getSingleCommand($id)
	{
			$db = MysqliDb::getInstance();
			$db->where("status","1");
			$db->where("id",$id);
			$result = $db->getOne("jsload");
			return $result;
	}
	
	function getCmdTypeSingleCol($tableName, $colName)
	{
			$db = MysqliDb::getInstance();
			$qyr = 'SELECT distinct ' . $colName .  ' from  ' . $tableName ;
			$result =  $db->rawQueryValue ($qyr);
			return $result;
	}
	
	function getCmdType()
	{
			$db = MysqliDb::getInstance();
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
	
	 function insertCommand($typ,$cmd,$dim,$val,$spe,$tab,$sheet)
	 {
			   $db = MysqliDb::getInstance();
			   $data = Array ("type" => $typ,
               "command" => $cmd,
               "dimension" => $dim,
			   "value" => $val,
               "speech" => $spe,
               "TableauTable" => $tab,
			   "TableauSheet" => $sheet
				);
				$id = $db->insert ('jsload', $data);
				if($id)
					return 1;
				else
					return 'insert failed: ' . $db->getLastError();
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
	 
	 function updateCmd($typ,$cmd,$dim,$val,$spe,$tab,$sheet,$id)
	 {
		 $db = MysqliDb::getInstance();
			   $data = Array ("type" => $typ,
               "command" => $cmd,
               "dimension" => $dim,
			   "value" => $val,
               "speech" => $spe,
               "TableauTable" => $tab,
			   "TableauSheet" => $sheet
				);

		$db->where ('id', $id);
		if ($db->update ('jsload', $data))
			 return 1;
		 else
			 return 0;
	 }
	 
	 function getTypeDropdown()
	 {
		 $db = MysqliDb::getInstance();
		 $s = '';
		 $cmdTypes = getCmdType();
		 foreach ($cmdTypes as $types)
		 {
			 $s .= "<option value='".$types['type']."'>" .    $types['type']. ' - ' . $types['description']. "</option>";
		 }
		 return  "<select name='filter' id='filter' class='form-control'>" . $s . "</select>";
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

	?>
