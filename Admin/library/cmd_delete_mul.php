<?php
	
	error_reporting(0);
	
	error_reporting(0);

	include_once 'functions.php';

	if(isset($_GET['id'])=="")
	{
		?>
        <script>
		alert('select command !!!');
		window.location.href='index.php';
		</script>
        <?php
		
		
	}
	
	else
	{
		$id = htmlspecialchars($_GET["id"]);
		$sql=deleteCmd($id);
		echo $sql;
		if($sql == 1)
		{
			?>
			<script>
			alert('Records Was Deleted !!!');
			window.location.href='index.php';
			</script>
			<?php
		}
		else
		{
			?>
			<script>
			alert('Error while Deleting , TRY AGAIN');
			window.location.href='index.php';
			</script>
			<?php
		}
		
	}

	
?>