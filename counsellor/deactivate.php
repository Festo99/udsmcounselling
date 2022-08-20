<?php

	// Connect to database
	$con=mysqli_connect("localhost","root","","udsm_counselling");

	// Check if id is set or not, if true,
	// toggle else simply go back to the page
	if (isset($_GET['appointment_id'])){

		// Store the value from get to
		// a local variable "course_id"
		$appointment_id=$_GET['appointment_id'];

		// SQL query that sets the status to
		// 0 to indicate deactivation.
		$sql="UPDATE `appointment` SET
			`statuses`=0 WHERE appointment_id='$appointment_id'";

		// Execute the query
		mysqli_query($con,$sql);
	}

	// Go back to course-page.php
	header('location: appointment.php');
?>
<?php

// Connect to database
$con=mysqli_connect("localhost","root","","udsm_counselling");

// Check if id is set or not, if true,
// toggle else simply go back to the page
if (isset($_GET['appointment_id'])){

    // Store the value from get to
    // a local variable "course_id"
    $appointment_id=$_GET['appointment_id'];

    // SQL query that sets the status to
    // 0 to indicate deactivation.
    $sql="UPDATE `appointment` SET
        `statuses`=Pending WHERE appointment_id='$appointment_id'";

    // Execute the query
    mysqli_query($con,$sql);
}

// Go back to course-page.php
header('location: appointment.php');
?>
