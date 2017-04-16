
<?php 

if(isset($_GET['dashid'])=="" && isset($_GET['grpid'])=="")
	{
		?>
        <script>
		alert('select command to edit!!!');
		window.location.href='index.php';
		</script>
        <?php
	}
	$id = htmlspecialchars($_GET["dashid"]);
	$grpid = htmlspecialchars($_GET["grpid"]);
	
$filters = getTFliters($id);	

	$dashrow = getTDashboardone($id,$grpid);
	$dashname = $dashrow['dashboardname'];	
?>


      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Commands
            <small></small>
          </h1>
         
        </section>

<section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><?php echo $dashname?></h3><a href="index.php?pages=cmdAdd.php&pagetype=new&dashid=<?php echo $dashid ?>&grpid=<?php echo $grpid ?>"  class="box-title btn pull-right">Add new command</a> 
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="#tdatatable" class="table table-bordered table-striped tdatatable">
                    <thead>
                      <tr>
                      	 <th>Edit</th>
                         <th>Status</th>
                        <th>Type</th>
                        <th>Command</th>
                        <th>Dimension</th>
                        <th>value</th>
                        <th>Speech</th>
                        
                      </tr>
                    </thead>
               <tbody>

<?php
foreach ($filters as $row)
{

?>

	 	<tr>
		    <td width="40px">
                <a href="index.php?pages=cmdAdd.php&pagetype=edit&id=<?php echo $row['id'] ?>&dashid=<?php echo $row['dashboardid'] ?>&grpid=<?php echo $row['grpid'] ?>" data-toggle="tooltip" title="edit" ><i class="fa fa-fw fa-edit"></i></a>
            </td>
            <td> 
             <i class="<?php echo $row['status']=='1'?'fa fa-fw fa-check-square-o':'fa fa-fw fa-square-o' ;?>"></i>
            </td>			
			<td><?php echo $row['type']; ?></td>
			<td><?php echo $row['command']; ?></td>
			<<td><?php echo $row['dimension']; ?></td>
			<td><?php echo $row['value']; ?></td>
			<td><?php echo $row['Speech']; ?></td>
		</tr>

			<?php }
?>
			</tbody>
                </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
</div>

