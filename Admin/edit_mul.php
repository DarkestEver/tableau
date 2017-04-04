<?php
	
	error_reporting(0);

	include_once 'functions.php';

	if(isset($_GET['id'])=="")
	{
		?>
        <script>
		alert('select command to edit!!!');
		window.location.href='index.php';
		</script>
        <?php
	}
	$id = htmlspecialchars($_GET["id"]);
	
	
 

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Update</title>
<!--<link rel="stylesheet" href="style.css" type="text/css" />-->
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" />
<script src="bootstrap/js/jquery.min.js" type="text/javascript"></script>
</head>

<body>

<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
 
        <div class="navbar-header">
        </div>
 
    </div>
</div>
<div class="clearfix"></div>



<div class="clearfix"></div><br />

<div class="container">
<form method="post" action="update_mul.php">

<?php	
		$row =	getSingleCommand($id);
?>
		
	<div class="row">
	  <div class="col-md-2"> Tableau Table</div>
	  <div class="col-md-10">
    	<input type="hidden" name="id" value="<?php echo $row['id'];?>" />
		<input type="text" name="typ" value="<?php echo $row['type'];?>" class="form-control" />
  </div>
	</div>
		
  <div class="row">
	  <div class="col-md-2"> Tableau Table</div>
	  <div class="col-md-10">
		<input type="text" name="cmd" value="<?php echo $row['command'];?>" class="form-control" />
		</div>
	</div>
		
		<div class="row">
	  <div class="col-md-2"> Tableau Table</div>
	  <div class="col-md-10">
		<input type="text" name="dim" value="<?php echo $row['dimension'];?>" class="form-control" />
	</div>
	</div>
		
	<div class="row">
	  <div class="col-md-2"> Value</div>
	  <div class="col-md-10">
		<input type="text" name="val" value="<?php echo $row['value'];?>" class="form-control" />
	</div>
	</div>
		
	<div class="row">
	  <div class="col-md-2">Speech</div>
	  <div class="col-md-10">
		<input type="text" name="spe" value="<?php echo $row['Speech'];?>" class="form-control" />
		</div>
	</div>
		
		<div class="row">
	  <div class="col-md-2"> Tableau Table</div>
	  <div class="col-md-10">
		<input type="text" name="TableauTable1" value="<?php echo $row['TableauTable'];?>" class="form-control" />
		</div>
	</div>
		
		<div class="row">
	  <div class="col-md-2"> Tableau Sheet</div>
	  <div class="col-md-10">
		<input type="text" name="TableauSheet1" value="<?php echo $row['TableauSheet'];?>" class="form-control" />
		</div>
	</div>
		

<button type="submit" name="savemul" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> &nbsp; Update</button>&nbsp;
<a href="index.php" class="btn btn-large btn-success"> <i class="glyphicon glyphicon-fast-backward"></i> &nbsp; cancel</a>

</table>
</form>
</div>
</body>
</html>