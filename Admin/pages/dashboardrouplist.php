
<?php 
$rows = getTDashboardgroup(); ?>

      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard Groups
            <small></small>
          </h1>
         
        </section>

<section class="content">
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">List</h3> <a href="index.php?pages=dashboardroup.php&pagetype=new"  class="box-title btn pull-right">Add new Group</a> 
              
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="#tdatatable" class="table table-bordered table-striped tdatatable">
                    <thead>
                      <tr>
                      <th>
                          
                         </th>
                      	 <th>
                      	 	Edit
                      	 </th>
                         <th>Status</th>
                        <th>Group Name</th>
                        <th>Description</th>
                      </tr>
                    </thead>
               <tbody>
               <?php foreach ($rows as $key => $value) {
               	
                ?>
                
                      <tr>
                      <td width="40px">
                        <a href="index.php?pages=dashboardlist.php&pagetype=edit&grpid=<?php echo $value['id'] ?>" title="navigate to Dashboard" ><i class="fa fa-share"></i>
                      </td>
                      <td width="40px">
                      	<a href="index.php?pages=dashboardroup.php&pagetype=edit&id=<?php echo $value['id'] ?>" title="edit" ><i class="fa fa-fw fa-edit"></i>
                      </td>
                        <td> 
                        <i class="<?php echo ($value['status']=='1'?'fa fa-fw fa-check-square-o':'fa fa-fw fa-square-o');?>"></i>
                         <?php echo ($value['status']=='1'?'Active':'Deactive');?>
  						</td>
                        <td><?php echo htmlspecialchars_decode($value['groupname']) ?></td>
                        <td><?php echo htmlspecialchars_decode($value['description']) ?></td>
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
