
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

$query = "SELECT * from appointment";

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
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
							<span class="dash-widget-bg1"><i class="fa fa-user" aria-hidden="true"></i></span>
							<div class="dash-widget-info text-right">
							    <?php 
                                    $query = "SELECT counsellor_id FROM counsellor ORDER BY counsellor_id";
                                    $query_run = mysqli_query($link, $query);
                                    $row12 = mysqli_num_rows($query_run);
                                    echo '<b><h4> '.$row12.' </b></h4>'
                                ?>
								<span class="widget-title1">Counsellor <i class="fa fa-check" aria-hidden="true"></i></span>
							</div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg2"><i class="fa fa-user-o"></i></span>
                            <div class="dash-widget-info text-right">
							    <?php 
                                    $query = "SELECT counsellor_id FROM counsellor ORDER BY counsellor_id";
                                    $query_run = mysqli_query($link, $query);
                                    $row12 = mysqli_num_rows($query_run);
                                    echo '<b><h4> '.$row12.' </b></h4>'
                                ?>
                                <span class="widget-title2">Students <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg3"><i class="fa fa-user-md" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
							    <?php 
                                    $query = "SELECT appointment_id FROM appointment WHERE statuses='active'  ORDER BY appointment_id";
                                    $query_run = mysqli_query($link, $query);
                                    $row12 = mysqli_num_rows($query_run);
                                    echo '<b><h4> '.$row12.' </b></h4>'
                                ?>
                                <span class="widget-title3">Attend <i class="fa fa-user" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                        <div class="dash-widget">
                            <span class="dash-widget-bg4"><i class="fa fa-user" aria-hidden="true"></i></span>
                            <div class="dash-widget-info text-right">
							    <?php 
                                    $query = "SELECT appointment_id FROM appointment WHERE statuses='pending'  ORDER BY appointment_id";
                                    $query_run = mysqli_query($link, $query);
                                    $row12 = mysqli_num_rows($query_run);
                                    echo '<b><h4> '.$row12.' </b></h4>'
                                ?>
                                <span class="widget-title4">Pending <i class="fa fa-check" aria-hidden="true"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
				<div class="row">
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="card">
							<div class="card-body">
								<div class="chart-title">
									<h4>Students Total</h4>
									<span class="float-right"><i class="fa fa-caret-up" aria-hidden="true"></i> 15% Higher than Last Month</span>
								</div>	
								<canvas id="linegraph"></canvas>
							</div>
						</div>
					</div>
					<div class="col-12 col-md-6 col-lg-6 col-xl-6">
						<div class="card">
							<div class="card-body">
								<div class="chart-title">
									<h4>Students In</h4>
									<div class="float-right">
										<ul class="chat-user-total">
											<li><i class="fa fa-circle current-users" aria-hidden="true"></i>ICU</li>
											<li><i class="fa fa-circle old-users" aria-hidden="true"></i> OPD</li>
										</ul>
									</div>
								</div>	
								<canvas id="bargraph"></canvas>
							</div>
						</div>
					</div>
				</div>
			
				
            </div>
</div>

<?php
   include 'includes/script.php';
   include 'includes/footer.php';

?>