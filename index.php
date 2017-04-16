<?php
require_once ("Admin/functions.php"); 

if(isset($_GET['group']))
{
	$groupname= $_GET['group'];
}
$dashrows = null;
$groupname= "";
$groupid = "";
$url = "";
$urlid = "";
if(isset($_GET['group']))
{
	$groupname= $_GET['group'];
	$row = getTDashboardgroupOnebyname($groupname);
	$groupid = $row['id'];
	if($groupid)
	{
		$dashrows = getdashboardsByGroupId($groupid);
		
	}
}
else
{

}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" href="Admin/bootstrap/css/bootstrap.min.css" type="text/css" />
<script src="Admin/bootstrap/js/jquery.min.js"></script>
<script src="Admin/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/annyang.min.js" id="annyang"></script>
<script src='https://code.responsivevoice.org/responsivevoice.js'></script>
<script src="js/tableau-2.min.js" type="text/javascript"></script> 

<script type="text/javascript">
$( document ).ready(function() {
	$("#micIndicator").hide();
	$("#micIndicatorOff").hide();
	 
	$('#imgStart').click(function() {
       
		stopTableau();
		console.log('start');
	 });
	 $('#imgStop').click(function() {
		
		console.log('stop');
		startTableau();
	 });
});



</script>
<style type="text/css">
           
			#wrapper {
				width: 100%;
			}	
			.navbar-default {
				background-color: <?php echo  $keyPairCongig['headercolor']; ?>;
			}
			
        </style>
<script type="text/javascript" src="tableau.php?group=<?php echo $groupname; ?>"></script> 


</head>

<body onload="initViz('')">

<div id="wrapper">

<nav class="navbar navbar-default" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
              <a class="navbar-brand" href="#" style="color:#efeded"> <?php 
           echo    $keyPairCongig['logourl']==""?$keyPairCongig['AppName']:'<img src='.$keyPairCongig['logourl'].' alt="'.$keyPairCongig['AppName'].'" />';
                ?></a>
            </div>
            <!-- /.navbar-header -->

            <!-- /.navbar-static-side -->



	
			<ul class = "nav navbar-top-links navbar-right" style="margin-right:15px; margin-top:10px;" >
				<li id="micIndicatorOff"  >
					<img style="background: url(./images/off.png) no-repeat;cursor:pointer;border: none;" id="imgStop" src="./images/off.png" />
					<!-- <input type="image" name="button"  onclick="manualStopTableau()"  style="background: url(./images/off.png) no-repeat;cursor:pointer;border: none;"></input> -->
				</li>
				<li id="micIndicator"  >
					<img style="background: url(./images/on.png) no-repeat;cursor:pointer;border: none;disabled:none;" id="imgStart" src="./images/on.png" />
					<!-- <input type="image" name="button" text=""  onclick="manualStarTableau()" style="background: url(./images/on.png) no-repeat;cursor:pointer;border: none;"></input> -->
				</li>
				</ul>
</nav>	
<div class="row">
<?php

$count = count($dashrows);
if($count <= 12)
{
	$count = 12/$count;
}

foreach ($dashrows as $key => $value) {
	
$onclick =" onclick=".""."tNavigate('".$value['id']."','".$value['url']."');"."";
	echo '<div class="col-md-'.$count.'" ><button class="btn btn-block btn-default btn-xs"'.$onclick.' >'.$value['dashboardname'].'</button></div>';

}
?>
</div>
<div class="row">
<div class="col-md-12">
<div id="vizContainer" ></div>
<div id="audio"></div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">TOV Help</h4>
      </div>
		  <div class="modal-body">
			<p>	Help page:- I am Kacie please read the Instruction to select your favorite selection fields</p>
				
             <p>           When you will say below commands then voice command will be activated and  you will see the simulation in dashboard</p>
<p>
•	Say:- select nomination Leonardo DiCaprio
•	Say:- select year 2016
•	Say:- select movie American Sniper
•	Say:- select category Best Actor
•	Say:- clear all films
•	Say:- clear all year
•	Say:- clear all nomination
•	Say:- clear all category
•	Say:- select all year
•	Say:- select all category
•	Say:- add category Best Actor
•	Say:- remove category Best Actor
•	Say:- reset all, start over
</p>
		  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


</div>
<script>
// Start listening.
 annyang.start();
</script>
</body>
</html>