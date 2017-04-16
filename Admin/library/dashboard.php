<?php require_once ("functions.php"); 
$rows = getTDashboard(); ?>

<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Update Dashboard
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
                  <h3 class="box-title">Update DashBoard</h3>
                </div>
                <div class="box-body">	
				<form method="post" action="dashbordUpdate.php">
						<?php	
					foreach ($rows as $row)
					{
						 ?>
						 
						
						<div class="row">
						<div class="col-md-1">
						<label><input type="checkbox" class="minimal" name="defaultdash[]"  <?php echo ($row['defaultdash']=='1'?'checked':'');?> checked/> </label>
						</div>
						<div class="col-md-1">
						<label><input type="checkbox" class="minimal" name="status[]"  <?php echo ($row['status']=='1'?'checked':'');?> checked/> </label>
						</div>
						<div class="col-md-3">
						<input type="hidden" name="id[]" value="<?php echo $row['id'];?>" />
						<input  type="text" name="dashboardname[]" value="<?php echo $row['dashboardname'];?>" class="form-control" />
						</div>
						<div class="col-md-5">
						<input  type="text" name="url[]" value="<?php echo $row['url'];?>" class="form-control" />
						</div>
						<div class="col-md-2">
						<input  type="text" name="help[]" value="<?php echo $row['url'];?>" class="form-control" />
						</div>
					<div class="clear"></div>
					</div>
				<?php
				}	
				?>
				<button type="submit" name="savemul" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> &nbsp; Update all</button>&nbsp;
		</form>

</div>
</div>
</div>
</div>
 </section>