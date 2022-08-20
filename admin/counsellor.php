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

 $query = "SELECT concat(fname,'    ', lname) as names, email, dbirth, prof, addresses, phone, biog from counsellor";

    $result = mysqli_query($link, $query);

    if (isset($_GET['delete'])){
        $id = $_GET['delete'];
        $mysqli = "DELETE FROM counsellor WHERE consellor_id=$counsellor_id";
        $results = mysqli_query($link, $mysqli);

        $_SESSION['message'] = "Record has been deleted!";
        $_SESSION['msg_type'] = "danger";

        
    }

?>

<div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-sm-4 col-3">
                        <h4 class="page-title">Counsellors</h4>
                    </div>
                    <div class="col-sm-8 col-9 text-right m-b-20">
                        <a href="add_counsellor.php" class="btn btn-primary btn-rounded float-right"><i class="fa fa-plus"></i> Add Counsellor</a>
                    </div>
                </div>
                <div class="row">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-border table-striped custom-table datatable mb-0">
								<thead>
									<tr>
									    <th>S/N</th>
										<th>Name</th>
										<th>Emails</th>
										<th>Date of Birth</th>
										<th>PROFESSION</th>
										<th>ADDRESS</th>
										<th>Phone</th>
										<th>Biograph</th>
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
										<td><?php echo $row['names']?></td>
										<td><?php echo $row['email']?></td>
										<td><?php echo $row['dbirth']?></td>
										<td><?php echo $row['prof']?></td>
										<td><?php echo $row['addresses']?></td>
										<td><?php echo $row['phone']?></td>
										<td><?php echo $row['biog']?></td>
										<td class="text-right">
										
									</tr>
									<?php
				                        }
			                        ?>
								</tbody>
							</table>
						</div>
					</div>
                </div>
 



<?php
   include 'includes/script.php';
   include 'includes/footer.php';
?>