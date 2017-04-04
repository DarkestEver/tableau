<?php
error_reporting(0);
include_once 'functions.php';

if(isset($_POST['save_mul']))
{		
		$typ = cleanText($_POST["filter"]);
		$cmd = cleanText($_POST["command1"]);
		$dim = cleanText($_POST["dimension1"]);
		$val = cleanText($_POST["value1"]);		
		$spe = cleanText($_POST["speech1"]);	
		$tabTable =  cleanText($_POST["tableauTable1"]);	
		$tabSheet =  cleanText($_POST["tableauSheet1"]);	
	echo	insertCommand($typ,$cmd,$dim,$val,$spe,$tabTable,$tabSheet );//== 1)
		
}
?>

<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TOV add command</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" />
<script src="bootstrap/js/jquery.min.js" type="text/javascript"></script>

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
</head>

<body>
<?php  include_once 'header.php'; ?>
<div class="container">
    <form method="post">
		<div class="row">
	  <div class="col-md-2">Type </div>
	  <div class="col-md-10"><?php echo getTypeDropdown(); ?></div>
	</div>
	
	<div class="row" id="divtableauTable1">
	  <div class="col-md-2"> Tableau Table</div>
	  <div class="col-md-10"><input type="text" name="tableauTable1" placeholder="tableau Table" class='form-control' /></div>
	</div>
	
	<div class="row" id="divtableauSheet1">
	  <div class="col-md-2">Tableau Sheet </div>
	  <div class="col-md-10"><input type="text" name="tableauSheet1" placeholder="tableau Sheet" class='form-control' /></div>
	</div>
	<div class="row" id="divcommand1">
	  <div class="col-md-2">Command</div>
	  <div class="col-md-10"><input type="text" name="command1" placeholder="command" class='form-control' /></div>
	</div>
	<div class="row" id="divdimension1">
	  <div class="col-md-2">Dimension</div>
	  <div class="col-md-10"><input type="text" name="dimension1" placeholder="Dimension" class='form-control' /></div>
	</div>
	<div class="row" id="divvalue1">
	  <div class="col-md-2">Value</div>
	  <div class="col-md-10"><input type="text" name="value1" placeholder="Value" class='form-control' /></div>
	</div>
	<div class="row" id="divspeech1">
	  <div class="col-md-2">Speech</div>
	  <div class="col-md-10"><input type="text" name="speech1" placeholder="Voice" class='form-control' /></div>
	</div>
	
	<div class="row">
	<div class="col-md-12 center" >
    <button type="submit" name="save_mul" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> &nbsp; Insert Command</button>
    <a href="index.php" class="btn btn-large btn-success"> <i class="glyphicon glyphicon-fast-backward"></i> &nbsp; Back to index</a>
	</div>
   </div>
   </form>

</div>

</body>
</html>