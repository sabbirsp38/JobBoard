﻿<?php include 'inc/hader.php'; ?>
<?php include 'inc/saidber.php'; ?> 
        <div class="grid_10">
            <div class="box round first grid">
                <h2>subscribers</h2>
                <div class="block"> 

                	 <?php 
                if (isset($_GET['delid'])) {
                  $did = $_GET['delid'];
                  $query = "DELETE FROM tbl_subcriber WHERE id='$did'";
                   $db-> delete($query);
                } ?>






                    <table class="data display datatable" id="example">
					 <thead>
                        <tr>
                            <th width="20%">no</th>
                            <th width="40%">Email list</th>
                            <th width="40%">Delete</th>
                        </tr>
                    </thead>
					<tbody>

						<?php 

						$query = "select * from tbl_subcriber order by id desc";
						$contact = $db->select($query);
					    if ($contact) {
					    	$i=0;
					 	while ($result= $contact -> fetch_assoc()) {
					 		$i++;


					?>

						<tr class="even gradeC">
							<td><?php echo $i;  ?></td>
							<td><?php echo $result['semail']; ?></td>
							<td> <a onclick="return confirm('Are you sure to DELETE!');" 
                                href="?delid=<?php echo $result['id']; ?>  ">Delete</a></td>
							
						</tr>
						<?php  }} ?>
						
					</tbody>
				</table>
               </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
<?php include 'inc/foter.php'; ?>  

<script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
			setSidebarHeight();


        });
    </script>
