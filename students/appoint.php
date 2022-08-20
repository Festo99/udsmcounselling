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
    $counsellor_id = $_POST['counsellor_id'];
    $schedule_id = $_POST['schedule_id'];
    $statuses = $_POST['statuses'];
    $messages = $_POST['messages'];

    $sql = "INSERT INTO appointments(counsellor_id, schedule_id,statuses, messages) VALUES ( '$counsellor_id', '$schedule_id','$statuses', '$messages' ) ";
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
                    <?Php

@$appointment=$_GET['counsellor_id']; // Use this line or below line if register_global is off
if(strlen($appointment) > 0 and !is_numeric($appointment)){ // to check if $appointment is numeric data or not. 
echo "Data Error";
exit;
}



///////// Getting the data from Mysql table for first list box//////////
$quer2="SELECT DISTINCT concat(prof, ' by Dr ', fname, '  ',lname)as prof,counsellor_id FROM counsellor WHERE usertype='counsellor' order by prof"; 
///////////// End of query for first list box////////////

/////// for second drop down list we will check if appointment is selected else we will display all the schedule///// 
if(isset($appointment) and strlen($appointment) > 0){
$quer="SELECT DISTINCT concat(starttime, '  To  ' ,endtime) as muda , dayweek FROM schedules where counsellor_id=$appointment order by muda"; 
}else{$quer="SELECT DISTINCT concat(starttime, '-' ,endtime) as muda , dayweek FROM schedules order by muda"; } 
////////// end of query for second schedule drop down list box ///////////////////////////


                echo "<form method=post name=f1 action=''>";
                            
                                echo"<div class=row>";
                                    echo"<div class=col-md-6>";
                                        echo"<div class=form-group> ";
                                             echo"<label>Issue Faced</label>";
                                                echo "<select name='counsellor_id' class=form-control onchange=\"reload(this.form)\" required>><option value=''>Select one</option>";
                                                    foreach ($link->query($quer2) as $noticia2) {
                                                        if($noticia2['counsellor_id']==@$appointment){echo "<option selected value='$noticia2[counsellor_id]'>$noticia2[prof]</option>"."<BR>";}
                                                        else{echo  "<option value='$noticia2[counsellor_id]'>$noticia2[prof]</option>";}
                                                        }
                                                echo "</select>";
                                        echo"</div>";
                                    echo"</div>";
                                    echo"<div class=col-md-6>";
                                        echo"<div class=form-group> ";
                                             echo"<label>Day for appointment</label>";
                                                echo "<select name='schedule_id' class=form-control required>><option value=''>Select one</option>";
                                                    foreach ($link->query($quer) as $noticia) {
                                                    echo  "<option value='$noticia[dayweek]'>$noticia[dayweek]</option>";
                                                    }
                                                echo "</select> <br><br><br>";      
                                        echo"</div>";
                                    echo"</div>";
                                echo"</div>";
                            echo"<div class=row>";
                                echo"<div class=col-md-6>";
                                    echo"<div class=form-group> ";
                                        echo"<label>Date  for appointment</label>";
                                        echo"<input type=date name='dates' class=form-control required>"; 
                                    echo"</div>";
                                echo"</div>";
                                echo"<div class=col-md-6>";
                                    echo"<div class=form-group>";
                                        echo"<label>Time for appointment</label>";
                                        echo "<select name='schedule_id' class=form-control required><option value=''>Select one</option>";
                                            foreach ($link->query($quer) as $noticia) {
                                            echo "<option value='$noticia[muda]'>$noticia[muda]</option>";
                                            }
                                        echo "</select> <br><br><br>";
                                    echo"</div>";
                                echo"</div>";
                            echo"</div>";
                            echo"<div class=col-md-6>";
                                echo"<div class=form-group>";
                                        echo"<input type=text name='statuses' class=form-control value=active hidden>";
                                echo"</div>";
                            echo"</div>";
                            echo"<div class=form-group>";
                                echo"<label>Message</label>";
                                echo"<textarea cols=30 rows=4 name='messages' class=form-control required></textarea>";
                            echo"</div>";
                            
                                echo"<button type=send class='btn btn-primary submit-btn' name=send >Create Appointment</button>";
                            
                        
                   echo "</form>";
                        ?>
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