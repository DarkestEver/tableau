<?php
error_reporting(0);
include_once 'functions.php';

$grpid = "";
$rows = null;
$groupname = "";
$dashname ="";
$status=""; 
$pagetype="";
$id="";
$type ="";
$command="";
$dimension="";
$value="";
$Speech="";
$TableauTable="";
$TableauSheet="";
$status="";

if(isset($_GET['grpid']))
{
  $grpid = $_GET['grpid'];
  $grprow = getSingleDashboardgroups($grpid);
   $groupname = $grprow['groupname'];
}
else
{
  echo 'error group id dont found';
}

if(isset($_GET['dashid']))
{
	$dashid = $_GET['dashid'];
	$dashrow = getTDashboardone($dashid,$grpid);
	$dashname = $dashrow['dashboardname'];	
}
else
{
  echo 'error dashboard id dont found';
}

//////// check page type ////////////////
if (isset( $_GET['pagetype'])) 
{
  $pagetype = $_GET['pagetype'];
  if($pagetype =='edit' || $pagetype =='delete' )
  {
    //// check group id /////
      if(isset($_GET['id']))
      {
      	$id = $_GET['id'];
         

      	 $rows = getSingleCommand3($id,$dashid,$grpid);
		 $type =$rows['type'];
		 $command=$rows['command'];
		 $dimension=$rows['dimension'];
		 $value=$rows['value'];
		 $Speech=$rows['Speech'];
		 $TableauTable=$rows['TableauTable'];
		 $TableauSheet=$rows['TableauSheet'];
		 $status=$rows['status']==1?'checked':'';
		

      }
      else
      {
        echo 'error cmd id dont found';
      }
    
  }
}
else
{
    echo " eoor";
}


	if(isset($_POST['save_mul']) && $_SERVER["REQUEST_METHOD"] == "POST")
	{		$dashboardid = cleanText($id);
			$typ = cleanText($_POST["filter"]);
			$cmd = cleanText($_POST["command1"]);
			$dim = cleanText($_POST["dimension1"]);
			$val = cleanText($_POST["value1"]);		
			$spe = cleanText($_POST["speech1"]);	
			$tabTable =  cleanText($_POST["tableauTable1"]);	
			$tabSheet =  cleanText($_POST["tableauSheet1"]);	
		   $chk =	insertCommand($dashid,$grpid,$typ,$cmd,$dim,$val,$spe,$tabTable,$tabSheet );
		   if($chk != 0)
		   {
		   echo'<script> window.location="index.php?pages=cmdAdd.php&pagetype=edit&id='.$chk.'&dashid='.$dashid.'&grpid='.$grpid.'"; </script> ';
		   }
			
	}

//////////////     update               //////////////////////////////
if(isset($_POST['update']) && $_SERVER["REQUEST_METHOD"] == "POST")
	{   
			$cmd = cleanText($_POST["command1"]);
			$dim = cleanText($_POST["dimension1"]);
			$val = cleanText($_POST["value1"]);		
			$spe = cleanText($_POST["speech1"]);	
			$tabTable =  cleanText($_POST["tableauTable1"]);	
			$tabSheet =  cleanText($_POST["tableauSheet1"]);
			if(isset($_POST['status']))
			{
				$status = 1;
			}
       $chk =  updateCmd($cmd,$dim,$val,$spe,$tabTable,$tabSheet,$status,$id,$dashid,$grpid);//updateCmd($typ,$cmd,$dim,$val,$spe,$tab,$sheet,$status,$id,$dashid,$grpid)
       if($chk==1)
       { 

		 echo'<script> window.location="index.php?pages=cmdAdd.php&pagetype=edit&id='.$id.'&dashid='.$dashid.'&grpid='.$grpid.'"; </script> ';
       }
       else
       {
        echo 0;
       }
}

////////////////////////// deleteById //////////////////////////////////
if(isset($_POST['delete']) && $_SERVER["REQUEST_METHOD"] == "POST")
{   
     $chk =  deleteById($id,'dashboards');
     if($chk)
     {
      echo'<script> window.location="index.php?pages=cmdlist.php&pagetype=edit&dashid='.$dashid.'&grpid='.$grpid.'"; </script> ';
     }
     else
     {
      echo 'error';
     }
}
//////////////////////////// Cancel //////////////////////////////////////
if(isset($_POST['cancel']) && $_SERVER["REQUEST_METHOD"] == "POST")
{   
     
       echo'<script> window.location="index.php?pages=cmdlist.php&pagetype=edit&dashid='.$dashid.'&grpid='.$grpid.'"; </script> ';
}



?>


<script>

$(function() {
	 if ($("#filter").val() == 'tFilter')
		{
			showalldiv();
			$("#divtableauTable1").hide();	
		};
	$("#filter").change(function () {
        if ($("#filter").val() == 'tFilter')
		{
			showalldiv();
			$("#divtableauTable1").hide();	
		}
		else if ($("#filter").val() == 'tNavigate')
		{
			showalldiv();
			$("#divdimension1").hide();
			$("#divtableauSheet1").hide();
			$("#divtableauTable1").hide();
			
		}
		else if ($("#filter").val() == 'startOver')
		{
			hidealldiv();
			$("#divcommand1").show();
			$("#divspeech1").show();
		}
		else if ($("#filter").val() == 'speech')
		{
			hidealldiv();
			$("#divspeech1").show();
			$("#divcommand1").show();
		}
		else if ($("#filter").val() == 'tMarkSelection')
		{
			showalldiv();
			$("#divtableauTable1").hide();	
		}
		else if ($("#filter").val() == 'dynamic dable command')
		{
			showalldiv();
			$("#divvalue1").hide();
		}
		else if ($("#filter").val() == 'tMultifilter')
		{
			showalldiv();
			$("#divtableauTable1").hide();	
			
		}
		else if ($("#filter").val() == 'tAddfilter')
		{
			showalldiv();
			$("#divtableauTable1").hide();	
		}
		else if ($("#filter").val() == 'tRemovefilter')
		{
			showalldiv();
			$("#divtableauTable1").hide();	
		}
		else if ($("#filter").val() == 'tAllfilter')
		{
			showalldiv();
			$("#divtableauTable1").hide();	
			$("#divvalue1").hide();
		}
		else if ($("#filter").val() == 'tClearfilter')
		{
			showalldiv();
			$("#divtableauTable1").hide();	
		}
		else
		{
			showalldiv();
		}
		
	});
});

	
function showalldiv()
{
	$("#divspeech1").show();
	$("#divvalue1").show();
	$("#divdimension1").show();
	$("#divcommand1").show();
	$("#divtableauSheet1").show();
	$("#divtableauTable1").show();
}
function hidealldiv()
{
	$("#divspeech1").hide();
	$("#divvalue1").hide();
	$("#divdimension1").hide();
	$("#divcommand1").hide();
	$("#divtableauSheet1").hide();
	$("#divtableauTable1").hide();
}
</script>


<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Update Commands
            <small></small>
          </h1>
        <!--  <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Advanced Elements</li>
          </ol> -->
        </section>
        <section class="content">

<div class="row">
            <div class="col-md-12">

              <div class="box box-danger">
                <div class="box-header">
              <h3 class="box-title">Info</h3> 
                </div>
                <div class="box-body">	       
    <form method="post">
    <div class="form-group">
	<div class="row">
	  <div class="col-md-2">Group </div>
	  <div class="col-md-10"><?php echo $groupname?></div>
	</div>
	</div> 
	<div class="form-group">
	<div class="row">
	  <div class="col-md-2">Dashboard </div>
	  <div class="col-md-10"><?php echo $dashname?></div>
	</div>
	</div> 
	<div class="form-group">
	<div class="row">
	  <div class="col-md-2">Type </div>
	  <div class="col-md-10"><?php if($pagetype=='new'){
	   echo  getTypeDropdown();
	   } 
	   else 
	   {
	   	echo $type;
	   } ?></div>
	</div>
	</div>

	<div class="form-group">
	<div class="row" id="divtableauTable1">
	  <div class="col-md-2"> Tableau Table</div>
	  <div class="col-md-10"><input type="text" name="tableauTable1" placeholder="" class='form-control' value="<?php echo $TableauTable?>"/></div>
	</div>
	</div>
	<div class="form-group">
	<div class="row" id="divtableauSheet1">
	  <div class="col-md-2">Tableau Sheet </div>
	  <div class="col-md-10"><input type="text" name="tableauSheet1" value="<?php echo $TableauSheet?>"" class='form-control' /></div>
	</div>
	</div>
	<div class="form-group">	
	<div class="row" id="divcommand1">
	  <div class="col-md-2">Command</div>
	  <div class="col-md-10"><input type="text" name="command1" value="<?php  echo $command?>" class='form-control' /></div>
	</div>
	</div>
	<div class="form-group">
	<div class="row" id="divdimension1">
	  <div class="col-md-2">Dimension</div>
	  <div class="col-md-10"><input type="text" name="dimension1" value="<?php echo $dimension?>" class='form-control' /></div>
	</div>
	</div>
	<div class="form-group">
	<div class="row" id="divvalue1">
	  <div class="col-md-2">Value</div>
	  <div class="col-md-10"><input type="text" name="value1" value="<?php echo $value?>" class='form-control' /></div>
	</div>
	</div>
	<div class="form-group">
	<div class="row" id="divspeech1">
	  <div class="col-md-2">Speech</div>
	  <div class="col-md-10"><input type="text" name="speech1" value="<?php echo $Speech?>" class='form-control' /></div>
	</div>
	</div>
	<div class="form-group">
	<div class="row" id="divspeech1">
	  <div class="col-md-2">Status</div>
	  <div class="col-md-10">
	   <label> <input type="checkbox" class="minimal" name="status"  <?php echo $status; ?> /> </label>
      </div>
	</div>
	</div>
	<div class="form-group">
	<div class="row">
	<div class="col-md-12 center" >
     <?php if($pagetype=='new'){ ?>
    <button type="submit" name="save_mul" class="btn btn-primary"> Submit </button>
  <?php }  if($pagetype=='delete' || $pagetype=='edit') { ?>
   <button type="submit" name="update" class="btn btn-primary"> Update </button>
    <button type="submit" name="delete" class="btn btn-primary"> Delete</button>
    
  <?php } ?> 
  <button type="submit" name="cancel" class="btn btn-primary"> Cancel</button>   </div></div>
   </div>
   </form>
   </div>
   </div>
</div>
</div>
</div>
 </section>