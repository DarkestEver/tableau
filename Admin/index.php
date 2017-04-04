<?php
	include_once 'functions.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TOV Command</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" />
  <script src="bootstrap/js/jquery.min.js"></script>
  <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
</head>

<body>

<div class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
 
        <div class="navbar-header">
                </div>
 
    </div>
</div>
<div class="clearfix"></div>

<div class="container">
<a href="add-data.php" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Add Command</a>
</div>

<div class="clearfix"></div><br />

<div class="container">
<form method="post" name="frm">
<table class='table table-bordered table-responsive'>
<tr>

    <th>Type</th>
    <th>Command</th>
	<th>Dimension</th>
    <th>Value</th>
	<th>Speech</th>
</tr>
<?php require_once ("functions.php"); 
$filters = getTFliters();	

foreach ($filters as $row)
{
?>
			<tr>
			<td>
			<span><a href='edit_mul.php?id=<?php echo $row['id']; ?> '  > <img src="edit.png"  alt="edit" width="15" height="15"  /></a></span> 
			<span><a href='delete_mul.php?id=<?php echo $row['id']; ?> '  > <img src="delete.png"  alt="delete" width="15" height="15" /> </a></span>
			<!-- <input type="hidden" name="id" class="chk-box" value="<?php echo $row['id']; ?>"  /> -->
			<?php echo $row['type']; ?></td>
			<td><?php echo $row['command']; ?></td>
			<td><?php echo $row['dimension']; ?></td>
			<td><?php echo $row['value']; ?></td>
			<td><?php echo $row['Speech']; ?></td>
			</tr>

			<?php }
?>
	</table>
</form>
</div>




</body>
</html>