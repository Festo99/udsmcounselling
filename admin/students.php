<?php
session_start();
 include 'includes/header.php';
 include 'includes/sidebar.php';

 
 
 
 
 // Create connection
 $link = mysqli_connect('localhost', 'root','', 'udsm_counselling');
 // Check connection
 if(!$link)
 {
	 echo mysqli_connect_error();
 }
 
 $query = "SELECT students.*, concat(fname, '  ',lname) as fname  from students";
 
	 $result = mysqli_query($link, $query);


	 if (isset($_GET['delete'])){
		 $id = $_GET['delete'];
		 $mysqli = "DELETE FROM students WHERE student_id=$id";
		 $results = mysqli_query($link, $mysqli);
 
		 $_SESSION['message'] = "Record has been deleted!";
		 $_SESSION['msg_type'] = "danger";
 
		 
	 }



?>

<div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-2 col-1">
                        <h4 class="page-title">Students</h4>
                    </div>
                    <div class="col-sm-5 col-6 text-right m-b-10">
                        
                    </div>
                </div>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-border table-striped custom-table datatable mb-0">
								<thead>
									<tr>
									    <th>S/N</th>
										<th>Full Name</th>
										<th>Address</th>
										<th>Phone</th>
										<th>Email</th>
										<th class="text-right">Action</th>
									</tr>
								</thead>
								<tbody>
								    <?php
                                        $i = 1;
                                        while($row=mysqli_fetch_assoc($result))
                                        {
                                    
			                        ?>
									<tr>
									    <td><?php echo $i++ ?></td>
                                        <td><?php echo $row['fname']?></td>
                                        <td><?php echo $row['location']?></td>
                                        <td><?php echo $row['phone']?></td>
                                        <td><?php echo $row['email']?></td>

										<td class="text-right">
										   
                                                <a href="students.php?delete=<?php echo $row['student_id']; ?>" class="btn btn-secondary btn-sm"><i class="fa fa-trash" title="Delete"></i></a>      
                                            
										</td>
									</tr>
		
								</tbody>
								<?php
				                        }
			                        ?>
							</table>
						</div>
					</div>
                </div>
            </div>
			<div id="delete_patient" class="modal fade delete-modal" role="dialog">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-body text-center">
						<img src="assets/img/sent.png" alt="" width="50" height="46">
						<h3>Are you sure want to delete this Patient?</h3>
						<div class="m-t-20"> <a href="#" class="btn btn-white" data-dismiss="modal">Close</a>
							<button type="submit" class="btn btn-danger">Delete</button>
						</div>
					</div>
				</div>
			</div>
			
		</div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>

<?php
   include 'includes/script.php';
   include 'includes/footer.php';
?>

