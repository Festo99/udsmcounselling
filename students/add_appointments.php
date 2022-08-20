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

if(isset($_POST['send'])){
    $issuefaced = $_POST['issuefaced']; 
    $counsellorname = $_POST['counsellorname'];
    $dates = $_POST['dates'];
    $datestime = $_POST['datestime'];
    $statuses = $_POST['statuses'];
    $messages = $_POST['messages'];

    $sql = "INSERT INTO appointment(issuefaced, counsellorname, dates, datestime, statuses, messages) VALUES ( '$issuefaced', '$counsellorname','$dates','$datestime','$statuses', '$messages' ) ";
    $result = mysqli_query($link, $sql);
}


?>

<div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Add Appointment</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form  method="POST">
                           
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Issue Faced</label>
                                        <select name="issuefaced" class="form-control" required>
                                            <option value="">Select</option>
                                            <option value="Pyscho-social">Pyscho-social</option>
                                            <option value="Health">Health</option>
                                            <option value="Financial">Financial</option>
                                            <option value="Education">Education</option>
                                            <option value="Other">Others</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Counsellor</label>
                                        <select name="counsellorname" id="counsellorname" class="form-control">
                                            <option > choose counsellor</option>
                                            <?php
                            
                                                $query = "SELECT concat(fname, ' ' ,lname) as counsellorname FROM counsellor ";
                                                $do = mysqli_query($link,$query);
                                                while($row = mysqli_fetch_array($do)){
                                                echo '<option value="'.$row['counsellorname'].'">'.$row['counsellorname'].'</option>';
                                                }
                                            ?>
                                        </select>      
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Date</label>
                                        <input type="date" name="dates" class="form-control" required> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Time</label>
                                        <input type="time" name="datestime" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                              <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="statuses" class="form-control" value="active" hidden> 
                                    </div>
                                </div>
                            <div class="form-group">
                                <label>Message</label>
                                <textarea cols="30" rows="4" name="messages" class="form-control" required></textarea>
                            </div>
                            
                                <button type="send" class="btn btn-primary submit-btn" name="send" >Create Appointment</button>
                            
                        </form>
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