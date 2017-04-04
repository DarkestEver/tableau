<?php require_once ("Admin/functions.php"); 
if($_GET["id"])
{
	$dashboardname =($_GET["id"]);
	$filters = getTFliters($dashboardname);
}

$dashboards = getTDashboard();
	
?>
		
//////////////////////////// voice //////////////
if (annyang) {
  // These are the voice commands in quotes followed by the function
	
		  var commands = {
			'<?php echo  $keyPairCongig['startvoicecommand']; ?>': function() { tov=1;  Speech('<?php echo  $keyPairCongig['startingtableauvoice']; ?>'); startTableau();},
		 };
		 // remove all commands
		 annyang.removeCommands();
		 // Add commands to annyang
		 annyang.addCommands(commands);
  
  
<?php
if( (isset($keyPairCongig['error'])  ? $keyPairCongig['error'] : null   ) != null)
{ ?>
	annyang.addCallback('error', function() {
	Speech('<?php echo  $keyPairCongig['error']; ?>');
	});
<?php
}
?>

<?php
if( (isset($keyPairCongig['errorNetwork'])  ? $keyPairCongig['errorNetwork'] : null   ) != null)
{ ?>
annyang.addCallback('errorNetwork', function() {
Speech('<?php echo  $keyPairCongig['errorNetwork']; ?>');
});
<?php
}
?>

<?php
if( (isset($keyPairCongig['errorPermissionBlocked'])  ? $keyPairCongig['errorPermissionBlocked'] : null   ) != null)
{ ?>
annyang.addCallback('errorPermissionBlocked', function() {
Speech('<?php echo  $keyPairCongig['errorPermissionBlocked']; ?>');
});
<?php
}
?>

<?php
if( (isset($keyPairCongig['errorPermissionDenied'])  ? $keyPairCongig['errorPermissionDenied'] : null   ) != null)
{ ?>
annyang.addCallback('errorPermissionDenied', function() {
Speech('<?php echo  $keyPairCongig['errorPermissionDenied']; ?>');
});
<?php
}
?>

<?php
if( (isset($keyPairCongig['end'])  ? $keyPairCongig['end'] : null   ) != null)
{ ?>
annyang.addCallback('end', function() {
Speech('<?php echo  $keyPairCongig['end']; ?>');
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
//annyang.removeCommands(['start tableau']);
var cmd2 = {'<?php echo  $keyPairCongig['stopvoicecommand']; ?>': function() { tov=0;  Speech('<?php echo  $keyPairCongig['stopingtableauvoice']; ?>');stopTableau();},
	<?Php

	foreach ($dashboards as $dashboard)
	{
		echo "'". $dashboard['dashboardname']."' : function() { tNavigate( '".$dashboard['id']."','".$dashboard['url']."'); },";			
	}
	foreach ($filters as $filter)
	{
			 if ($filter['type'] == 'Dynamic Table Command')
				{
				
					$dynCmds = getCmdTypeSingleCol($filter['TableauTable'] , $filter['dimension'] );
					echo "'". $filter['command'].' clear'. "' : function() { tClearfilter( '".$filter['dimension']."','','".$filter['TableauSheet']."'); Speech('".$filter['Speech']."'); },";			
					echo "'". $filter['command'].' all'. "' : function() { tAllfilter( '".$filter['dimension']."','','".$filter['TableauSheet']."'); Speech('".$filter['Speech']."'); },";			
												
					foreach ($dynCmds as $dynCmd)
					{
															
						if ($filter['Speech'] != '')
						{ 
							echo "'". $filter['command'].' '. $dynCmd."' : function() { tFilter( '".$filter['dimension']."','".$dynCmd."','".$filter['TableauSheet']."'); Speech('".$filter['Speech'].' '.$dynCmd."'); },";			
							echo "'". $filter['command'].' add '. $dynCmd."' : function() { tAddfilter( '".$filter['dimension']."','".$dynCmd."','".$filter['TableauSheet']."'); Speech('".$filter['Speech'].' '.$dynCmd."'); },";			
							echo "'". $filter['command'].' remove '. $dynCmd."' : function() { tRemovefilter( '".$filter['dimension']."','".$dynCmd."','".$filter['TableauSheet']."'); Speech('".$filter['Speech'].' '.$dynCmd."'); },";			
						}
						else
						{
							echo "'". $filter['command'].' '. $dynCmd."' : function() { tFilter( '".$filter['dimension']."','".$dynCmd."','".$filter['TableauSheet']."'); },";			
							echo "'". $filter['command'].' add '. $dynCmd."' : function() { tAddfilter( '".$filter['dimension']."','".$dynCmd."','".$filter['TableauSheet']."'); },";		
							echo "'". $filter['command'].' remove '. $dynCmd."' : function() { tRemovefilter( '".$filter['dimension']."','".$dynCmd."','".$filter['TableauSheet']."'); },";		
						}
					}
									
				}
				else if ($filter['type'] == 'speech' )
						{
								echo "'". $filter['command']."' : function() {  Speech('".$filter['Speech']."');  },";
						}
						else
						{
							if ($filter['Speech'] != '')
							{
							echo "'". $filter['command']."' : function() { ". $filter['type']." ( '".$filter['dimension']."','".$filter['value']."','".$filter['TableauSheet']."'); Speech('".$filter['Speech']."'); },";			
							}
							else
							{
								echo "'". $filter['command']."' : function() { ". $filter['type']." ( '".$filter['dimension']."','".$filter['value']."','".$filter['TableauSheet']."'); },";			
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
//annyang.removeCommands(['stop tableau']);
var cmd2 = {'<?php echo  $keyPairCongig['startvoicecommand']; ?>': function() { tov=1;  Speech('<?php echo  $keyPairCongig['startingtableauvoice']; ?>'); startTableau();},};
annyang.addCommands(cmd2);
}
