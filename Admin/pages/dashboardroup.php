<?php
error_reporting(0);
$id="";$pagetype="";
if (isset( $_GET['pagetype'])) {
  $pagetype = $_GET['pagetype'];
}
else
{

}

if (isset( $_GET['grpid'])) {
  $id = $_GET['grpid'];
}
else
{

}


//////////////////////  save ////////////////////////////////////////
if(isset($_POST['save_mul']) && $_SERVER["REQUEST_METHOD"] == "POST")
{		$groupname = cleanText($_POST["groupname"]);
		$description = cleanText($_POST["description"]);	
		$id = insertgroupdashboard($groupname, $description);
     if($id)
     {
      echo'<script> window.location="index.php?pages=dashboardnew.php&pagetype=new&grpid='.$id.'"; </script> ';
     }
     else
     {

     }
}
//////////////     update               //////////////////////////////
if(isset($_POST['update']) && $_SERVER["REQUEST_METHOD"] == "POST")
{   
      $groupname = cleanText($_POST['groupname']);
      $status =cleanText( $_POST['status']);
      $description =cleanText( $_POST['description']);
     $chk =  updategroupdashboard($id,$groupname, $description,$status=='on'?1:0);
     if($chk==1)
     {
      echo'<script> window.location="index.php?pages=dashboardrouplist.php"; </script> ';
     }
     else
     {
      echo 'error';
     }
}

////////////////////////// deleteById //////////////////////////////////
if(isset($_POST['delete']) && $_SERVER["REQUEST_METHOD"] == "POST")
{   
     $chk =  deleteById($id,'dashboardgroups');
     if($chk)
     {
      echo'<script> window.location="index.php?pages=dashboardrouplist.php"; </script> ';
     }
     else
     {
      echo 'error';
     }
}
//////////////////////////// Cancel //////////////////////////////////////
if(isset($_POST['cancel']) && $_SERVER["REQUEST_METHOD"] == "POST")
{   
     
      echo'<script> window.location="index.php?pages=dashboardrouplist.php"; </script> ';

}

if($pagetype=='new' )
{
?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            New Dashboard group
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
	<div class="row" id="divtableauTable1">
	  <div class="col-md-2">Dashboard Group name</div>
	  <div class="col-md-10"><input type="text" name="groupname" placeholder="" class='form-control' /></div>
	</div>
	</div>
	<div class="form-group">
	<div class="row" id="divtableauSheet1">
	  <div class="col-md-2">Description</div>
	  <div class="col-md-10"><textarea class="textarea"  name="description" placeholder="description" class='form-control' style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea></div>
	</div>
	</div>
	<div class="form-group">
	<div class="row">
	<div class="col-md-12 center" >
    <button type="submit" name="save_mul" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> &nbsp; Insert Command</button>
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
 } 

if($pagetype=='edit' )
{

  $rows = getSingleDashboardgroups($id);
  
?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Edit Dashboard group
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
                  <h3 class="box-title">Update Info</h3>
                </div>
                <div class="box-body">         
    <form method="post">


  <div class="form-group">
  <div class="row" id="divtableauTable1">
    <div class="col-md-2">Dashboard Group name</div>
    <div class="col-md-10"><input type="text" name="groupname" placeholder="" class='form-control' value="<?php echo htmlspecialchars_decode($rows['groupname']) ?>" /></div>
  </div>
  </div>
  <div class="form-group">
  <div class="row" id="divtableauSheet1">
    <div class="col-md-2">Description</div>
    <div class="col-md-10">
    <textarea class="textarea"  name="description" placeholder="description" class='form-control' style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; ">
      <?php echo htmlspecialchars_decode($rows['description']) ?>
    </textarea></div>
  </div>
  </div>
  <div class="form-group">
  <div class="row">
  <div class="col-md-2">Status</div>
  <div class="col-md-10">
  <label><input type="checkbox" class="minimal" name="status"  <?php echo ($row['status']=='1'?'checked':'');?> checked/> </label>
  </div>
  </div>
  <div class="form-group">
  <div class="row">
  <div class="col-md-4 center" >
    </div>
    <div class="col-md-5 center" >
    <button type="submit" name="update" class="btn btn-primary"> Update </button>
    <button type="submit" name="delete" class="btn btn-primary"> Delete</button>
    <button type="submit" name="cancel" class="btn btn-primary"> Cancel</button>

    </div>
    </div>
   </div>
   </form>
   </div>
   </div>
</div>
</div>
</div>
 </section>



<?php  
}
 ?>