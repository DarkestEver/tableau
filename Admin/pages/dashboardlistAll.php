<?php 
$rows = null;


  $rows = getTDashboard();




?>

      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboards
            <small></small>
          </h1>
         
        </section>

<section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">List</h3> 
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="#tdatatable" class="table table-bordered table-striped tdatatable">
                    <thead>
                      <tr>
                      	 <th></th><th>Edit</th>
                         <th>Status</th>
                        <th>Default</th>
                        <th>Name</th>
                        <th>url</th>
                      </tr>
                    </thead>
               <tbody>
			<?php foreach ($rows as $row) { ?>
						 
						 <tr>
              <td width="40px">
                        <a href="index.php?pages=cmdlist.php&pagetype=edit&id=<?php echo $row['id'] ?>&grpid=<?php echo $row['groups'] ?>" ><i class="fa fa-share"></i>
                      </td>
                      <td width="40px">
                      	<a href="index.php?pages=dashboardnew.php&pagetype=edit&id=<?php echo $row['id'] ?>&grpid=<?php echo $row['groups'] ?>" data-toggle="tooltip" title="edit" ><i class="fa fa-fw fa-edit"></i></a>
                      </td>
                        <td> 
                        <i class="<?php echo $row['status']=='1'?'fa fa-fw fa-check-square-o':'fa fa-fw fa-square-o' ;?>"></i>
                        
  						</td>
  						<td>
  						 <i class="<?php echo ($row['status']=='1'?'fa fa-fw fa-check-square-o':'fa fa-fw fa-square-o');?>"></i>
                         
  						</td>
						<td>
						
						<?php echo $row['dashboardname'];?>
						</td>
						<td>
						<label data-toggle="tooltip" title="click on edit "><?php  echo substr($row['url'],0,100);?>
						</td>
						
					</tr>
				 <?php } ?>
                </tbody>
                </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
</div>

