<?php 
$configs = getTCong();
?>

<?php

if(isset($_POST['save_mul']) && $_SERVER["REQUEST_METHOD"] == "POST")
{ 
	$id = $_POST['id'];
	$val = $_POST['val'];
	$stat = $_POST['stat'];
	$chkcount = count($id);
	for($i=0; $i<$chkcount; $i++)
	{
		$status = 0;
		if (isset($stat[$i]) )
		{
		$status = 1;
		}	
		//$MySQLiconn->query("UPDATE users SET first_name='$fn[$i]', last_name='$ln[$i]' WHERE id=".$id[$i]);
		//echo $id[$i].$val[$i].$status;
		updateConfigs($id[$i],$val[$i],$status);
	}
}
?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Update configuration
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
                  <h3 class="box-title">Info - disabling or modifing the config may cause damage to your website</h3>
                </div>
                <div class="box-body">	
	
<form method="post">
<div class="form-group">
	<div class="row">
	<div class="col-md-2">
	<h4>Key</h4>
	</div>
	<div class="col-md-5">
	<h4>Value</h4>
	</div>
	<div class="col-md-2">
	<H4>Status</H4>
	</div>
	</div>
	</div>

		<?php	
	foreach ($configs as $config)
	{
		 ?>
		 
<div class="form-group">
	<div class="row">
	<div class="col-md-2">
		<input type="hidden" name="id[]" value="<?php echo $config['id'];?>" />
		<label><?php echo $config['congkey'];?> </label>
	</div>
	<div class="col-md-5">
		<input  type="text" name="val[]" value="<?php echo $config['congvalues'];?>" class="form-control" />
	</div>
	<div class="col-md-2">
	<label><input type="checkbox" class="minimal" name="stat[]"  <?php echo ($config['status']=='1'?'checked':'');?> /> </label>
	</div>
	</div>
	</div>
	
		
		
		
<?php
}	
?>
<button type="submit" name="save_mul" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> &nbsp; Update all</button>&nbsp;
		</form>

</div>
</div>
</div>
</div>
 </section>