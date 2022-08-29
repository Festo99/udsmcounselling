<?php

session_start();
   
   $link = mysqli_connect('localhost', 'root','', 'udsm_counselling');

   if(!$link)
    {
		echo mysqli_connect_error();
	}

    if(isset($_POST['login_btn'])){
        $email = $_POST['email'];
        $passwd = $_POST['passwords'];

        $query =  "SELECT * FROM students WHERE email='$email' AND passwords='$passwd'";
        $query_run = mysqli_query($link, $query);
         $companyname = mysqli_fetch_array($query_run);
        if($companyname['usertype'] == "student")
        {
            $_SESSION['username'] = $email;
            
            header('Location: index.php ');
            exit();
            header('Location: appointment.php');
            exit();
            header('Location: chat.php');
            exit();
            
            
            
        }
        
       
        else 
        {
           echo $_SESSION['status'] = 'Email id / Password is Invalid';
            header('Location: login.php');
        }
    }



?>


<!DOCTYPE html>
<html lang="en">


<!-- login23:11-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/download.png">
    <title>UDSM COUNSELLING</title>
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!--[if lt IE 9]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
    <div class="main-wrapper account-wrapper">
        <div class="account-page">
			<div class="account-center">
				<div class="account-box">
                    <h4>LOGIN</h4>
                    <form action =" " class="form-signin " method="POST">
                  
                        <div class="form-group">
                            <label>Username or Email</label>
                            <input type="text" autofocus="" class="form-control" name="email" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="passwords">
                        </div>
                        <div class="text-center register-link">
                            Don’t have an account? <a href="registration.php">Register Now</a>
                        </div>
                        <div class="form-group text-center">
                            <button  name="login" class="btn btn-primary btn-block">Login</button>
                        </div>

                       
                        <?php
    
                      $DB = mysqli_connect('localhost','root','','udsm_counselling');
                if($DB){
                      if(isset($_POST['login'])){
                     $email = mysqli_real_escape_string($DB,$_POST['email']);
                     $pass= mysqli_real_escape_string($DB,$_POST['passwords']);

                    $query = mysqli_query($DB,"SELECT * from students where email='$email'");
                    if(mysqli_num_rows($query)==1){
                         $fetch = mysqli_fetch_assoc($query);
                         $passi = $fetch['password'];

                            if(password_verify($pass,$passi)){
                                    //echo "password match";
                                    session_start();
                                    $_SESSION['name']=$fetch['email'];
                                   header('location:index.php');
                           }
                else{
                    ?>  <div class="containetr justify-content-center mt-3 mb-3">
                    <div class="alert alert-danger text-center">Incorrect Username or Password </div>
                    </div>  
                     <?php
                }
             }
             else{
                ?>  
                    <div class="alert alert-danger text-center">Incorrect Username or Password </div>
                
                     <?php
             }
        }
        else{
          //  echo "login button not clicked ";
        }
    }
    else{
        echo "no connection";
    }
    
    ?>

                    </form>
                </div>
			</div>
        </div>
    </div>
    <script src="assets/js/jquery-3.2.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/app.js"></script>

</body>


<!-- login23:12-->
</html>

