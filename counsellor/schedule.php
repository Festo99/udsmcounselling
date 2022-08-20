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

$query = "SELECT dayweek, concat(starttime, ' - ' ,endtime) as muda, messages from schedule";

    $result = mysqli_query($link, $query);
    if (isset($_GET['delete'])){
        $id = $_GET['delete'];
        $mysqli = "DELETE FROM schedule WHERE schedule_id=$schedule_id";
        $results = mysqli_query($link, $mysqli);

        $_SESSION['message'] = "Record has been deleted!";
        $_SESSION['msg_type'] = "danger";

        
    }

?>
 <div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Schedule</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="add_schedule.php" class="btn btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Schedule</a>
                    </div>
                </div>
				<div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-border table-striped custom-table mb-0">
								<thead>	
                                        <th>S/N</th>							
										<th>Available Days</th>
										<th>Available Time</th>
										<th>Message</th>
									</tr>
								</thead>
                                    
								<tbody>
                                    <?php
                                        $i = 1;
                                        while($row1=mysqli_fetch_assoc($result))
                                        {
                                    
			                        ?>
                                    <tr>
                                        <td><?php echo $i++ ?></td>
                                        <td><?php echo $row1['dayweek']?></td>
                                        <td><?php echo $row1['muda']?></td>
                                        <td><?php echo $row1['messages']?></td>
                                        <td class="text-center">
                                           
						                </td>
                                    </tr>
                                    <?php
				                        }
			                        ?>
                                </tbody>
                                
                            </table>
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