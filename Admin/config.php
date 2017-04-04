<?php require_once ("functions.php"); 
$configs = getTCong(); ?>

	
<form method="post" action="updateconfig.php">
		<?php	
	foreach ($configs as $config)
	{
		 ?>
		 
		
		<table>
		 <tr>
		<input type="hidden" name="id[]" value="<?php echo $config['id'];?>" />
		<td width="150px"><?php echo $config['congkey'];?> </td>
		<td width="300px"><input width="300px" type="text" name="val[]" value="<?php echo $config['congvalues'];?>" class="form-control" /></td>
		<td width="25px"><input width="25px"  type="text" name="stat[]" value="<?php echo $config['status'];?>" class="form-control" /></td>
		</tr>
		</table>
		
		
		
<?php
}	
?>
<button type="submit" name="savemul" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i> &nbsp; Update all</button>&nbsp;
		</form>