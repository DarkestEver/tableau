<?php
error_reporting(0);

$grpid = "";
$rows = null;
$groupname = "";
$dashboardname=""; $status=""; $url="";
$pagetype="";$id="";
//// check group id /////
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


  //// check group id /////
      if(isset($_GET['id']))
      {
        $id = $_GET['id'];
       
      }
      else
      {
        echo 'error id dont found';
      }
      
//////// check page type ////////////////
if (isset( $_GET['pagetype'])) 
{
  $pagetype = $_GET['pagetype'];
  if($pagetype =='edit' || $pagetype =='delete' )
  {
  
       $rows = getTDashboardone($id,$grpid);
        $dashboardname=$rows['dashboardname'];
        $status=$rows['status']==1?'checked':'';
        $defaultdash = $rows['defaultdash']==1?'checked':'';
        $url=htmlspecialchars_decode( $rows['url']);
    
  }
}
else
{
    echo " eoor";
}


//////////////////////  save ////////////////////////////////////////
if(isset($_POST['save_mul']) && $_SERVER["REQUEST_METHOD"] == "POST")
{   
        $dashboardname = cleanText($_POST["dashboardname"]);  
        $url = cleanText($_POST["url"]); 
        $defaultdash = cleanText($_POST["defaultdash"])=='on'?'1':''; 
        $id = insertdashboard($grpid, $dashboardname,$url,$defaultdash );  
        if($id)
         {
          echo'<script> window.location="index.php?pages=cmdAdd.php&pagetype=new&dashid='.$id.'&grpid='.$grpid.'"; </script> ';
         }
         else
         {
          echo "error";
         }
}
//////////////     update               //////////////////////////////
if(isset($_POST['update']) && $_SERVER["REQUEST_METHOD"] == "POST")
{   //updateDashboard2($id,$grpid,$dashboardname,$url,$defaultdash,$status)
      $groups = cleanText($id);
      $dashboardname = cleanText($_POST["dashboardname"]);  
      $url = cleanText($_POST["url"]); 
      $defaultdash = cleanText($_POST["defaultdash"])=='on'?1:0; 
      $status = cleanText($_POST["status"])=='on'?1:0; 
       $chk =  updateDashboard2($id,$grpid,$dashboardname,$url,$defaultdash,$status);
       if($chk==1)
       { 
        $rows = getTDashboardone($id,$grpid);
        $dashboardname=$rows['dashboardname'];
        $status=$rows['status']==1?'checked':'';
        $defaultdash = $rows['defaultdash']==1?'checked':'';
        $url=htmlspecialchars_decode( $rows['url']);
           
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
      echo'<script> window.location="index.php?pages=dashboardlist.php&id='.$id.'&grpid='.$grpid.'"; </script> ';
     }
     else
     {
      echo 'error';
     }
}
//////////////////////////// Cancel //////////////////////////////////////
if(isset($_POST['cancel']) && $_SERVER["REQUEST_METHOD"] == "POST")
{   
     echo'<script> window.location="index.php?pages=dashboardlist.php&id='.$id.'&grpid='.$grpid.'"; </script> ';
}

?>


<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            New Dashboard 
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
                  <h3 class="box-title">Add Info</h3>
                </div>
                <div class="box-body">	       
    <form method="post">


  <div class="form-group">
  <div class="row" >
    <div class="col-md-2">Group name</div>
    <div class="col-md-10"><label><?php echo $groupname?></label></div>
  </div>
  </div>
	<div class="form-group">
	<div class="row" id="divtableauTable1">
	  <div class="col-md-2">Dashboard name</div>
	  <div class="col-md-10"><input type="text" name="dashboardname" placeholder="" class='form-control'  value="<?php echo $dashboardname ?>" /></div>
	</div>
	</div>
	<div class="form-group">
	<div class="row" id="divtableauSheet1">
	  <div class="col-md-2">url</div>
	  <div class="col-md-10"><textarea class="textarea"  name="url" placeholder="url" class='form-control' style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
     <?php echo $url ?> 
    </textarea></div>
	</div>
	</div>
  <div class="form-group">
   <div class="row">
   <div class="col-md-2">Default</div>
            <div class="col-md-10">
            <label> <input type="checkbox" class="minimal" name="defaultdash" <?php echo $defaultdash; ?> />  </label>
            </div>
            </div>
  </div>
  <div class="form-group">
   <div class="row">
    <div class="col-md-2">Status</div>
            <div class="col-md-10">
            <label> <input type="checkbox" class="minimal" name="status"  <?php echo $status;?> /> </label>
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
  <button type="submit" name="cancel" class="btn btn-primary"> Cancel</button>
  	</div></div>
   </div>

   </form>
   </div>
   </div>
</div>
</div>
</div>
 </section>
 <?php

