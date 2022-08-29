
<?php 
include 'includes/header.php';
include 'includes/sidebar.php';
// Create connection
$link = mysqli_connect('localhost', 'root','', 'udsm_counselling');
?>




<body>
<div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Add Appointment</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form  method="POST" action="" enctype="">
                           
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Issue Faced</label>
                                        <select name="issue" class="form-control" required>
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
                                            <option > ---choose counsellor---</option>
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
                                        <input type="date" name="date" class="form-control" required> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Time</label>
                                        <input type="time" name="time" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                              <div class="col-md-6">
                                    <div class="">
                                        <input type="text" name="status" class="form-control" value="active" hidden> 
                                    </div>
                                </div>
                            <div class="form-group">
                                <label>Message</label>
                                <textarea cols="30" rows="4" name="message" class="form-control" required></textarea>
                            </div>
                            
                                <button type="send" class="btn btn-primary btn-block" name="send" >Create Appointment</button>

                                    

                            <?php 
                            
                            if(isset($_POST['send'])){
                                echo "button clicked";
                                $issue =$_POST['issue'];
                                $namec =$_POST['counsellorname'];
                                $date =$_POST['date'];
                                $time =$_POST['time'];
                                $status =$_POST['status'];
                                $msg =$_POST['message'];
                                 
                                 echo $msg ;
                                 echo $time;
                                 echo $date;


                                 $data = mysqli_query($link,"INSERT INTO `appointment`(`issuefaced`, `counsellor`, `dates`, `datestime`, `statuses`, `messages`) VALUES ('$issue','$namec','$date','$time','$status','$msg')");
                                     if(!$data){
                                        echo "Not inserted";
                                     }

                                     else{
                                        echo "inserted";
                                     }
                            }

                            else{
                                echo "button not clicked ";
                            }
                            
                            ?>
                          

                        </form>
                    </div>
                </div>
            </div>
			
        </div>
    </div>
    <div class="sidebar-overlay" data-reff=""></div>


</body>   


<?php 
include 'includes/script.php';
include 'includes/footer.php';
?>