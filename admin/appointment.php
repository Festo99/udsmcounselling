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

$query = "SELECT concat(fname,' ',lname) as fullname,dates,dayweek,concat(starttime,' - ',endtime) as muda,app_id FROM `appointments`,students,schedules WHERE appointments.student_id = students.student_id AND appointments.schedule_id = schedules.schedule_id";

    $result = mysqli_query($link, $query);


    if (isset($_GET['delete'])){
        $id = $_GET['delete'];
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
                        
                    </div>
                </div>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							
                            <table class="table table-striped custom-table">
								<thead>
									<tr>
                                        <th>S/N</th>
										<th>Appointment ID</th>
                                        <th>Students Name</th>
										<th>Appointment Date</th>						
										<th>Appointment Day</th>
										<th>Appointment Time</th>
									
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
                                        <td><?php echo $row['app_id']?></td>
                                        <td><?php echo $row['fullname']?></td>
                                        <td><?php echo $row['dates']?></td>
                                        <td><?php echo $row['dayweek']?></td>
                                        <td><?php echo $row['muda']?></td>
                                        
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