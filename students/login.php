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
                    <form action ="POST" class="form-signin">
                    <?php
                        if(isset($_SESSION['status']) && $_SESSION['status'] !='')
                        {
                        echo '<h2 class="bg-danger text-white"> '.$_SESSION['status'].' </h2>';
                        unset($_SESSION['status']);
                      }
                
                    ?>
                        <div class="form-group">
                            <label>Username or Email</label>
                            <input type="text" autofocus="" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="passwords">
                        </div>
                        <div class="text-center register-link">
                            Don’t have an account? <a href="signup_student.php">Register Now</a>
                        </div>
                        <div class="form-group text-center">
                            <button  name="login_btn" class="btn btn-primary account-btn">Login</button>
                        </div>
                        
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

