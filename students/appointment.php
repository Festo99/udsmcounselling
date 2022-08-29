<?php 
include 'includes/header.php';
include 'includes/sidebar.php';

// Create connection
$link = mysqli_connect('localhost', 'root','', 'udsm_counselling');
// Check connection
if(!$link)
{
    echo mysqli_connect_error();
}

$query = "SELECT * from appointment";

    $result = mysqli_query($link, $query);
    if (isset($_GET['delete'])){
        $appointment_id = $_GET['delete'];
        $mysqli = "DELETE FROM appointment WHERE appointment_id=$appointment_id";
        $results = mysqli_query($link, $mysqli);

        $_SESSION['message'] = "Record has been deleted!";
        $_SESSION['msg_type'] = "danger";

        
    }

?>

<div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Appointments</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="add_appointments.php" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Appointment</a>
                    </div>
                </div>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
                            
							<table class="table table-striped custom-table">
								<thead>
									<tr>
                                        <th>S/N</th>
										<!-- <th>Appointment ID</th> -->
                                        <th>Issue Faced</th>
																			
										<th>Appointment Date</th>
										<th>Appointment Time</th>
										
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
                                        <!-- <td><?php echo $row['appointment_id']?></td> -->
                                        <td><?php echo $row['issuefaced']?></td>
                                        
                                        <td><?php echo $row['dates']?></td>
                                        <td><?php echo $row['datestime']?></td>
                                        <td class="text-right">
											<div class="dropdown dropdown-action">
												<a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
												<div class="dropdown-menu dropdown-menu-right">
													
                                                    <a href="appointment.php?delete=<?php echo $row['appointment_id']; ?>" class="dropdown-item" data-toggle="modal"><i class="fa fa-trash-o m-r-5"></i> Delete</a>
												</div>
											</div>
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
    <div class="sidebar-overlay" data-reff=""></div>


<?php 
include 'includes/script.php';
include 'includes/footer.php';
?>