<?php require_once ("functions.php"); 
$rows = getTDashboard(); ?>

	
<form method="post" action="dashbordUpdate.php">
		<?php	
	foreach ($rows as $row)
	{
		 ?>
		 
		
		<table>
		 <tr>
		<input type="hidden" name="id[]" value="<?php echo $row['id'];?>" />
		<td width="300px"><input width="300px" type="text" name="dashboardname[]" value="<?php echo $row['dashboardname'];?>" class="form-control" /></td>
		<td width="300px"><input width="300px" type="text" name="url[]" value="<?php echo $row['url'];?>" class="form-control" /></td>
		<td width="25px"><input width="25px"  type="text" name="defaultdash[]" value="<?php echo $row['defaultdash'];?>" class="form-control" /></td>
		<td width="25px"><input width="25px"  type="text" name="status[]" value="<?php echo $row['status'];?>" class="form-control" /></td>
		</tr>
		</table>
		
		
		
<?php
}	
?>
<button type="submit" name="savemul" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> &nbsp; Update all</button>&nbsp;
		</form>