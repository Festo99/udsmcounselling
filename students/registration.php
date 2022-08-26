<!DOCTYPE html>
<html>
    <head>
        <title>registration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/download.png">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    </head>

<body class="bg-white mt-3 mb-3">


    <form action="" method="POSt">
    <div class="container col-sm-6 bg-success p-3 justify-content-center">
        <div class="row">
            <div class="col-sm text-center">
                <img src="assets/img/download.png" style="height:150px; width:250px;" class="rounded rounded-circle col-sm ">
                <h3 class="text-white">UDSM COUNCELLING</h3>
                <h5 class="text-white">SING UP</h5>
            </div>
            
        </div>
        <div class="row">
           <div class="col-sm  mt-3">
            <input type="text" name="regno" class="form-control" placeholder="Reg Number" required>
           </div>
           <div class="col-sm mt-3">
            <input type="email" name="email" class="form-control" placeholder="User Email" required>
           </div>
        </div>
        <div class="row">
           <div class="col-sm mt-3">
            <input type="text" name="fname" class="form-control" placeholder="First Name" required>
           </div>
           <div class="col-sm mt-3">
            <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
           </div>
        </div>
        <div class="row">
           <div class="col-sm mt-3">
            <div class="row">
                <div class="col">
                <input type="number" name="phone" class="form-control" placeholder="Phone Number" required>
                </div>

                <div class="col">
                <input type="number" name="nida" class="form-control" placeholder="National Id" required>
                </div>   
            </div>
           </div>
           <div class="col-sm mt-3">
            <input type="text" name="location" class="form-control" placeholder="Location" required>
           </div>
        </div>
        <div class="row">
           <div class="col-sm mt-3">
            <input type="password" name="pass" class="form-control" placeholder="Enter password" required>
           </div>
           <div class="col-sm mt-3">
            <input type="password" name="cpass" class="form-control" placeholder="Confirm password" required>
           </div>
        </div>
        <input type="submit" name="submit" class="btn btn-block btn-primary mt-3 mb-3 text-center" value="Register">
    

        <?php 
    

    $DB = mysqli_connect('localhost','root','','udsm_counselling');
    {
        if($DB){
            //echo "Connected";
            if(isset($_POST['submit'])){
                  $regno = mysqli_real_escape_string($DB,$_POST['regno']);
                  $email = mysqli_real_escape_string($DB,$_POST['email']);
                  $query = mysqli_query($DB,"SELECT * from students where email='$email'");
                  

               if(!mysqli_num_rows($query)==1){
                    
                    $fname = mysqli_real_escape_string($DB,$_POST['fname']);
                    $lname = mysqli_real_escape_string($DB,$_POST['lname']);
                    $phone = mysqli_real_escape_string($DB,$_POST['phone']);
                    $nida = mysqli_real_escape_string($DB,$_POST['nida']);
                    $location = mysqli_real_escape_string($DB,$_POST['location']);
                    $pass = mysqli_real_escape_string($DB,$_POST['pass']);
                    $cpass = mysqli_real_escape_string($DB,$_POST['cpass']);
                    if($pass==$cpass){
                      $enc = password_hash($pass,PASSWORD_BCRYPT);
                      
                     $result =mysqli_query($DB,"INSERT INTO `students`(`fname`, `lname`, `email`, `password`, `phone`, `nida`, `location`) VALUES ('$fname','$lname','$email','$enc','$phone','$nida','$location')");
                     
                     if($result){
                        echo "Data inserted successful";
                     }
                     else{
                        echo "no data accepted";
                     }

                    }
  
                    else{
                      
                      ?> <div  class="alert alert-danger mt-3 mb-3 text-center">make sure password match </div> <?php
                      
                    }
                  }

                  else

                   {
                    ?>  <div class="alert alert-danger mb-3 mt-3 text-center">Username already exit</div>   <?php
                  }
                  
                 
            }
            else{
              //  echo "button not cliked";
            }
        }
        else{
                 echo "no connection";
        }
    }
    
    ?>
    

    </form>
    
</body>
</html>