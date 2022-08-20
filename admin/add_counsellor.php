<?php
 include 'includes/header.php';
 include 'includes/sidebar.php';


 $link = mysqli_connect('localhost', 'root','', 'udsm_counselling');

   if(!$link)
    {
		echo mysqli_connect_error();
	}

    if(isset($_POST['send'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];  
        $username = $_POST['username'];
        $email = $_POST['email'];
        $passwd = $_POST['passwd'];
        $dbirth = $_POST['dbirth'];
        $gender = $_POST['gender'];
        $prof = $_POST['prof'];
        $addresses = $_POST['addresses'];
        $phone = $_POST['phone'];
        $biog = $_POST['biog'];
        $usertype = $_POST['usertype'];
    
        $sql = "INSERT INTO counsellor (fname, lname,username, email, passwd, dbirth, gender, prof, addresses,phone,biog,usertype) VALUES ( '$fname','$lname', '$username','$email', '$passwd', '$dbirth', '$gender', '$prof', '$addresses', '$phone', '$biog', '$usertype' ) ";
        $result = mysqli_query($link, $sql);
    }

?>

<div class="page-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <h4 class="page-title">Add Counsellor</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <form  method="POST">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>First Name</label>
                                        <input class="form-control" required type="text" name="fname">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Last Name</label>
                                        <input class="form-control" required type="text" name="lname">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Username </label>
                                        <input class="form-control"  required type="text" name="username" >
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Email </label>
                                        <input class="form-control" required type="email" name="email" >
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control" required type="password" name="passwd" >
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input class="form-control" required type="password" name="cpasswd" >
                                    </div>
                                </div>
								<div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <div >
                                            <input type="datetime-local" required class="form-control" name="dbirth" >
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
									<div class="form-group gender-select">
										<label class="gen-label">Gender:</label>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" value="Male" name="gender" class="form-check-input">Male
											</label>
										</div>
										<div class="form-check-inline">
											<label class="form-check-label">
												<input type="radio" value="Female" name="gender" class="form-check-input">Female
											</label>
										</div>
									</div>
                                </div>
								<div class="col-sm-12">
									<div class="row">
                                        <div class="col-sm-12">
											<div class="form-group">
												<label>Profffession</label>
												<input type="text" required class="form-control " name="prof">
											</div>
                                            <div class="form-group">
												
												<input type="text" value="counsellor" class="form-control " name="usertype" hidden>
											</div>
										</div>

										<div class="col-sm-12">
											<div class="form-group">
												<label>Address</label>
												<input type="text" required class="form-control " name="addresses">
											</div>
										</div>

                                        <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone </label>
                                        <input class="form-control" required type="tel" name="phone">
                                    </div>
                                </div>
										
									</div>
								</div>
                                
                               
                            </div>
							<div class="form-group">
                                <label>Short Biography</label>
                                <textarea class="form-control" rows="3" cols="30" name="biog"></textarea>
                            </div>
                            
                            <div class="m-t-20 text-center">
                                <button class="btn btn-primary submit-btn" name="send" value="Save">Create Counsellor</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


<?php
   include 'includes/script.php';
   include 'includes/footer.php';
?>