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

if(isset($_POST['send'])){
        $dayweek = $_POST['dayweek']; 
        $starttime = $_POST['starttime'];
        $endtime = $_POST['endtime'];
        $messages = $_POST['messages'];
    
        $sql = "INSERT INTO schedule (dayweek, starttime, endtime, messages) VALUES ( '$dayweek', '$starttime','$endtime', '$messages' ) ";
        $result = mysqli_query($link, $sql);
    }
    
   
?>

<div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Add Schedule</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form method="POST">
                           
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>DAY WEEK</label>
                                        <select name="dayweek" class="form-control" required>
                                            <option value="">Select</option>
                                            <option value="Monday">Monday</option>
                                            <option value="Tuesday">Tuesday</option>
                                            <option value="Wedsday">Wedsday</option>
                                            <option value="Thursday">Thursday</option>
                                            <option value="Friday">Friday</option>
                                            <option value="Saturday">Saturday</option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Start Time</label>
                                            <input type="time" name="starttime" class="form-control" required> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>End Time</label>
                                        <input type="time" name="endtime" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                              <div class="col-md-6">
                                    
                                </div>
                            <div class="form-group">
                                <label>Message</label>
                                <textarea cols="30" rows="4" name="messages" class="form-control" required></textarea>
                            </div>
                           
                                <button type="send" class="btn btn-primary submit-btn" name="send" >Create Schedule</button>
                            
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