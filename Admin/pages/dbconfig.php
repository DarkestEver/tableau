<?php


//////////////////////////// update //////////////////////////////////////
if(isset($_POST['save_mul']) && $_SERVER["REQUEST_METHOD"] == "POST")
{   
     $arr = array(
        "host" => $_POST['host'],
      "username" => $_POST['username'],
      "password" => $_POST['password'],
      "db" => $_POST['db'],
      "port" => $_POST['port'],
      "prefix" => $_POST['prefix'],
      "charset" => $_POST['charset'],
      );
     file_put_contents('dbconf.json',json_encode($arr));
}

$json = json_decode(file_get_contents("dbconf.json"),TRUE);
$host=$json['host'];
$username=$json['username'];
$password=$json['password'];
$db=$json['db'];
$port=$json['port'];
$prefix=$json['prefix'];
$charset=$json['charset'];

?>


<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
           Database attributes
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
                  <h3 class="box-title">Info - if wrong input provided app will not work. Please check dbconf.json and change with correct value</h3>
                </div>
                <div class="box-body">	       
    <form method="post">



	<div class="form-group">
	<div class="row" id="divtableauTable1">
	  <div class="col-md-2">host</div>
	  <div class="col-md-10"><input type="text" name="host" class='form-control'  value="<?php echo $host ?>" /></div>
	</div>
	</div>
	 <div class="form-group">
  <div class="row" id="divtableauTable1">
    <div class="col-md-2">username</div>
    <div class="col-md-10"><input type="text" name="username" class='form-control'  value="<?php echo $username ?>" /></div>
  </div>
  </div>
    <div class="form-group">
  <div class="row" id="divtableauTable1">
    <div class="col-md-2">password</div>
    <div class="col-md-10"><input type="text" name="" class='form-control'  value="<?php echo $password ?>" /></div>
  </div>
  </div>
    <div class="form-group">
  <div class="row" id="divtableauTable1">
    <div class="col-md-2">Database</div>
    <div class="col-md-10"><input type="text" name="db" class='form-control'  value="<?php echo $db ?>" /></div>
  </div>
  </div>
    <div class="form-group">
  <div class="row" id="divtableauTable1">
    <div class="col-md-2">port</div>
    <div class="col-md-10"><input type="text" name="port" class='form-control'  value="<?php echo $port ?>" /></div>
  </div>
  </div>
    <div class="form-group">
  <div class="row" id="divtableauTable1">
    <div class="col-md-2">prefix</div>
    <div class="col-md-10"><input type="text" name="prefix" class='form-control'  value="<?php echo $prefix ?>" /></div>
  </div>
  </div>
     <div class="form-group">
  <div class="row" id="divtableauTable1">
    <div class="col-md-2">charset</div>
    <div class="col-md-10"><input type="text" name="charset" class='form-control'  value="<?php echo $charset ?>" /></div>
  </div>
  </div>
	<div class="form-group">
	<div class="row">
	<div class="col-md-12 center" >

    <button type="submit" name="save_mul" class="btn btn-primary"> Update </button>

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

