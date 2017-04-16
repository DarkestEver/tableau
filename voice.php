<?php require_once ("Admin/functions.php"); 
if($_GET["id"])
{
	$dashboardname =($_GET["id"]);
	$filters = getTFliters($dashboardname);
	$cases = getcmdgroupsByDashId($dashboardname);
	
}
$commandsforalldashboard = getTFlitersWithNull();
$dashboards = getTDashboard();
	
?>
		
//////////////////////////// voice //////////////
if (annyang) {
  // These are the voice commands in quotes followed by the function
	
		  var commands = {
			'<?php echo  $keyPairCongig['startvoicecommand']; ?>': function() {tov=1;
			startTableau();  Speech('<?php echo  $keyPairCongig['startingtableauvoice']; ?>');},
			'resume voice mode': function() { tov=1;   startTableau(); Speech('<?php echo  $keyPairCongig['startingtableauvoice']; ?>');},
			'start voice mode': function() { tov=1;   startTableau(); Speech('<?php echo  $keyPairCongig['startingtableauvoice']; ?>');},
		};
		 // remove all commands
		 annyang.removeCommands();
		 // Add commands to annyang
		 annyang.addCommands(commands);
  
  
<?php
if( (isset($keyPairCongig['error'])  ? $keyPairCongig['error'] : null   ) != null)
{ ?>
	annyang.addCallback('error', function() {
	//Speech('<?php echo  $keyPairCongig['error']; ?>');
	console.log('<?php echo  $keyPairCongig['error']; ?>');
	});
<?php
}
?>

<?php
if( (isset($keyPairCongig['errorNetwork'])  ? $keyPairCongig['errorNetwork'] : null   ) != null)
{ ?>
annyang.addCallback('errorNetwork', function() {
Speech('<?php echo  $keyPairCongig['errorNetwork']; ?>');
console.log('<?php echo  $keyPairCongig['errorNetwork']; ?>');
});
<?php
}
?>

<?php
if( (isset($keyPairCongig['errorPermissionBlocked'])  ? $keyPairCongig['errorPermissionBlocked'] : null   ) != null)
{ ?>
annyang.addCallback('errorPermissionBlocked', function() {
Speech('<?php echo  $keyPairCongig['errorPermissionBlocked']; ?>');
console.log('<?php echo  $keyPairCongig['errorPermissionBlocked']; ?>');
});
<?php
}
?>

<?php
if( (isset($keyPairCongig['errorPermissionDenied'])  ? $keyPairCongig['errorPermissionDenied'] : null   ) != null)
{ ?>
annyang.addCallback('errorPermissionDenied', function() {
Speech('<?php echo  $keyPairCongig['errorPermissionDenied']; ?>');
console.log('<?php echo  $keyPairCongig['errorPermissionDenied']; ?>');
});
<?php
}
?>

<?php
if( (isset($keyPairCongig['end'])  ? $keyPairCongig['end'] : null   ) != null)
{ ?>
annyang.addCallback('end', function() {
//Speech('<?php echo  $keyPairCongig['end']; ?>');
console.log('<?php echo  $keyPairCongig['end']; ?>');
});
<?php
}
?>

}


function startTableau()
{
$("#micIndicator").show();
$("#micIndicatorOff").hide();
annyang.removeCommands();
//'*tag': capture,
//annyang.removeCommands(['start tableau','resume voice mode','start voice mode']);
var cmd2 = {'<?php echo  $keyPairCongig['stopvoicecommand']; ?>': function() { tov=0;  Speech('<?php echo  $keyPairCongig['stopingtableauvoice']; ?>');stopTableau();},
'abort voice mode': function() { stopTableau();Speech('<?php echo  $keyPairCongig['stopingtableauvoice']; ?>');},
'stop voice mode': function() { stopTableau();Speech('<?php echo  $keyPairCongig['stopingtableauvoice']; ?>');},
	<?Php
//$commandsforalldashboard
	foreach ($commandsforalldashboard as $row)
	{
		
		if ($row['Speech'] != '')
		{
			echo "'". $row['command']."' : function() { ". $row['type']." ( '".$row['dimension']."','".$row['value']."','".htmlspecialchars_decode($row['TableauSheet'])."'); Speech('".$row['Speech']."'); },";			
		}
		else
		{
			echo "'". $row['command']."' : function() { ". $row['type']." ( '".$row['dimension']."','".$row['value']."','".htmlspecialchars_decode($row['TableauSheet'])."'); },";			
		}
	}
	foreach ($dashboards as $dashboard)
	{
		echo "'navigate ". $dashboard['dashboardname']."' : function() { tNavigate( '".$dashboard['id']."','".$dashboard['url']."'); },";			
	}
	foreach ($cases as $case) {
		echo "'". $case['command']."' : function() { ".$case['listofcommands']."},";			
	}
	foreach ($filters as $filter)
	{
		//// voice////
		
			//
			if ($filter['type'] == 'tparameter' )
			{
				echo tparameter($filter['dimension'],$filter['command'],$filter['value']);
			}
			else if ($filter['type'] == 'DynamicTableCommandtHierarchyfilter' )
			{
				echo DynamicTableCommandtHierarchyfilter($filter['dimension'],$filter['TableauTable'],htmlspecialchars_decode(htmlspecialchars_decode($filter['TableauSheet'])),$filter['command'],$filter['Speech']);
			}
			else if ($filter['type'] == 'tHierarchyfilter' )
			{
				echo "'". strtolower($filter['command'])."' : function() {";
				echo tHierarchyfilter($filter['dimension'],$filter['value'],$filter['TableauSheet']);
				//"  Speech('".$filter['Speech']);
				echo " },";
			}else 
			 if ($filter['type'] == 'DynamicTableCommand-tfilter')
				{
				
					$dynCmds = getCmdTypeSingleCol($filter['TableauTable'] , $filter['dimension'] );
					echo "'". 'clear '.$filter['command']. "' : function() { tClearfilter( '".$filter['dimension']."','','".htmlspecialchars_decode(htmlspecialchars_decode($filter['TableauSheet']))."'); Speech('".$filter['Speech']."'); },";			
					echo "'".'select all '.$filter['command']. "' : function() { tAllfilter( '".$filter['dimension']."','','".htmlspecialchars_decode($filter['TableauSheet'])."'); Speech('".$filter['Speech']."'); },";			
												
					foreach ($dynCmds as $dynCmd)
					{
															
						if ($filter['Speech'] != '')
						{ 
							echo "' select ". strtolower($filter['command']).' '. $dynCmd."' : function() { tFilter( '".$filter['dimension']."','".$dynCmd."','".htmlspecialchars_decode($filter['TableauSheet'])."'); Speech('".$filter['Speech'].' '.$dynCmd."'); },";			
							//echo "'". $filter['command'].' add '. $dynCmd."' : function() { tAddfilter( '".$filter['dimension']."','".$dynCmd."','".htmlspecialchars_decode($filter['TableauSheet'])."'); Speech('".$filter['Speech'].' '.$dynCmd."'); },";			
							echo "'remove ". strtolower($filter['command']).' '. $dynCmd."' : function() { tRemovefilter( '".$filter['dimension']."','".$dynCmd."','".htmlspecialchars_decode($filter['TableauSheet'])."'); Speech('".$filter['Speech'].' '.$dynCmd."'); },";			
						}
						else
						{
							echo "' select ". strtolower($filter['command']).' '. $dynCmd."' : function() { tFilter( '".$filter['dimension']."','".$dynCmd."','".htmlspecialchars_decode($filter['TableauSheet'])."'); },";			
							//echo "'". $filter['command'].' add '. $dynCmd."' : function() { tAddfilter( '".$filter['dimension']."','".$dynCmd."','".htmlspecialchars_decode($filter['TableauSheet'])."'); },";		
							echo "'remove ". strtolower($filter['command']).' '. $dynCmd."' : function() { tRemovefilter( '".$filter['dimension']."','".$dynCmd."','".htmlspecialchars_decode($filter['TableauSheet'])."'); },";		
						}
					}
									
				}
				else if ($filter['type'] == 'DynamicTableCommand-tMark')
				{				
					$dynCmds = getCmdTypeSingleCol($filter['TableauTable'] , $filter['dimension'] );
					echo "'". 'clear all '.$filter['command']. "' : function() { clearSelection( '".$filter['dimension']."','','".htmlspecialchars_decode(htmlspecialchars_decode($filter['TableauSheet']))."'); Speech('".$filter['Speech']."'); },";			
												
					foreach ($dynCmds as $dynCmd)
					{
															
						if ($filter['Speech'] != '')
						{ 
							echo "' select ". strtolower($filter['command']).' '. $dynCmd."' : function() { tMarkSelection( '".$filter['dimension']."','".$dynCmd."','".htmlspecialchars_decode($filter['TableauSheet'])."'); Speech('".$filter['Speech'].' '.$dynCmd."'); },";			
							//echo "'". $filter['command'].' add '. $dynCmd."' : function() { addValuestMarkSelection( '".$filter['dimension']."','".$dynCmd."','".htmlspecialchars_decode($filter['TableauSheet'])."'); Speech('".$filter['Speech'].' '.$dynCmd."'); },";			
							echo "'remove ". strtolower($filter['command']).' '. $dynCmd."' : function() { removeFromtMarkSelection( '".$filter['dimension']."','".$dynCmd."','".htmlspecialchars_decode($filter['TableauSheet'])."'); Speech('".$filter['Speech'].' '.$dynCmd."'); },";			
						}
						else
						{
							echo "' select ". strtolower($filter['command']).' '. $dynCmd."' : function() { tMarkSelection( '".$filter['dimension']."','".$dynCmd."','".htmlspecialchars_decode($filter['TableauSheet'])."'); },";			
							//echo "'". $filter['command'].' add '. $dynCmd."' : function() { addValuestMarkSelection( '".$filter['dimension']."','".$dynCmd."','".htmlspecialchars_decode($filter['TableauSheet'])."'); },";		
							echo "'remove ". strtolower($filter['command']).' '. $dynCmd."' : function() { removeFromtMarkSelection( '".$filter['dimension']."','".$dynCmd."','".htmlspecialchars_decode($filter['TableauSheet'])."'); },";		
						}
					}
									
				}
				else if ($filter['type'] == 'speech' )
						{
								echo "'". $filter['command']."' : function() {  Speech('".$filter['Speech']."');  },";
						}
						//  
						else if ($filter['type'] == 'tMarlSelectionAnonymusVoiceADD' || $filter['type'] == 'tMarlSelectionAnonymusVoiceRemove' || $filter['type'] == 'tMarlSelectionAnonymusVoiceSingle' || $filter['type'] == 'tRadioButtonAnonymusVoice' || $filter['type'] == 'tMultiBoxAnonymusVoiceAdd' || $filter['type'] == 'tMultiBoxAnonymusVoiceRemove' )
						{
							
							echo "'". $filter['command']." *fvalue' : kvariable".$filter['id']." ,";			
							
						}
						
						else
						{
							if ($filter['Speech'] != '')
							{
							echo "'". $filter['command']."' : function() { ". $filter['type']." ( '".$filter['dimension']."','".$filter['value']."','".htmlspecialchars_decode($filter['TableauSheet'])."'); Speech('".$filter['Speech']."'); },";			
							}
							else
							{
								echo "'". $filter['command']."' : function() { ". $filter['type']." ( '".$filter['dimension']."','".$filter['value']."','".htmlspecialchars_decode($filter['TableauSheet'])."'); },";			
							}
						}
			
							
	}			
	?>
		};
		
annyang.addCommands(cmd2);


<?php
if( (isset($keyPairCongig['resultNoMatch'])  ? $keyPairCongig['resultNoMatch'] : null   ) != null)
{ ?>
	annyang.addCallback('resultNoMatch', function() {
	Speech('<?php echo  $keyPairCongig['resultNoMatch']; ?>');
	console.log('Command not recognized');
	});
<?php
}
?>



}
function stopTableau()
{
$("#micIndicator").hide();
$("#micIndicatorOff").show();
annyang.removeCommands();
//annyang.removeCommands(['stop tableau','abort voice mode','stop voice mode']);
var cmd2 = {'<?php echo  $keyPairCongig['startvoicecommand']; ?>': function() { tov=1; 
startTableau();  Speech('<?php echo  $keyPairCongig['startingtableauvoice']; ?>');},
'resume voice mode': function() { tov=1;   startTableau(); Speech('<?php echo  $keyPairCongig['startingtableauvoice']; ?>');},
'start voice mode': function() { tov=1;   startTableau(); Speech('<?php echo  $keyPairCongig['startingtableauvoice']; ?>');},
};
annyang.addCommands(cmd2);
}

//////////////////////////////////////// dynamic javascript function //////////////

<?php
////// anonymous char //////////////
//// radio button
foreach ($filters as $filter)
	{
		if ($filter['type'] == 'tRadioButtonAnonymusVoice' )
		{
			echo "var kvariable".$filter['id']." =  function(fvalue) {";
			echo "tFilter( '".$filter['dimension']."',fvalue,'".htmlspecialchars_decode($filter['TableauSheet'])."'); Speech('".$filter['Speech']. "' + fvalue); ";			
			echo "console.log(fvalue)};";
		}
		if ($filter['type'] == 'tMultiBoxAnonymusVoiceAddSingle' )
		{
			echo "var kvariable".$filter['id']." =  function(fvalue) {";
			echo "tMarkSelection( '".$filter['dimension']."',fvalue,'".htmlspecialchars_decode($filter['TableauSheet'])."'); Speech('".$filter['Speech']. "' + fvalue); ";			
			echo "console.log(fvalue)};";
		}
		if ($filter['type'] == 'tMultiBoxAnonymusVoiceAdd' )
		{
			echo "var kvariable".$filter['id']." =  function(fvalue) {";
			echo "tAddfilter( '".$filter['dimension']."',fvalue,'".htmlspecialchars_decode($filter['TableauSheet'])."'); Speech('".$filter['Speech']. "' + fvalue); ";			
			echo "console.log(fvalue)};";
		}
		if ($filter['type'] == 'tMultiBoxAnonymusVoiceRemove' )
		{
			echo "var kvariable".$filter['id']." =  function(fvalue) {";
			echo "tRemovefilter( '".$filter['dimension']."',fvalue,'".htmlspecialchars_decode($filter['TableauSheet'])."'); Speech('".$filter['Speech']. "' + fvalue); ";		
			echo "console.log(fvalue)};";
		}
		if ($filter['type'] == 'tMarlSelectionAnonymusVoiceADD' )
		{
			//addValuestMarkSelection
			echo "var kvariable".$filter['id']." =  function(fvalue) {";
			echo "addValuestMarkSelection( '".$filter['dimension']."',fvalue,'".htmlspecialchars_decode($filter['TableauSheet'])."'); Speech('".$filter['Speech']. "' + fvalue); ";		
			echo "console.log(fvalue)};";
			
		}
		if ($filter['type'] == 'tMarlSelectionAnonymusVoiceRemove' )
		{
			//removeFromtMarkSelection
			echo "var kvariable".$filter['id']." =  function(fvalue) {";
			echo "removeFromtMarkSelection( '".$filter['dimension']."',fvalue,'".htmlspecialchars_decode($filter['TableauSheet'])."'); Speech('".$filter['Speech']. "' + fvalue); ";		
			echo "console.log(fvalue)};";
		}
		if ($filter['type'] == 'tMarlSelectionAnonymusVoiceSingle' )
		{
			//tMarlSelectionAnonymusVoiceSingle
			echo "var kvariable".$filter['id']." =  function(fvalue) {";
			echo "tMarlSelectionAnonymusVoiceSingle( '".$filter['dimension']."',fvalue,'".htmlspecialchars_decode($filter['TableauSheet'])."'); Speech('".$filter['Speech']. "' + fvalue); ";		
			echo "console.log(fvalue)};";
		}
	}
	
?>

////////////////////////////////////////////////////////////////////////////////