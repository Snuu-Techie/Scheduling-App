<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

// initializing variables
$type = "";
// array to store password and username related errors
$type_errors = array(); 

// connect to MySQL localhost database
$db = mysqli_connect('localhost', 'root', '', 'schedule');

 // REGISTERING a user
    if (isset($_POST['add_appoint'])) {
        // receive input values from the form fields
        $type= mysqli_real_escape_string($db, $_POST['appo']);

        //form validation: 
        // Ensure that the form is correctly filled 
        // Add errors to the error array if the form is not filled correctly
        if (empty($type)) { array_push($type_errors, "*Please enter appointment type!"); }

        // Using an appointment type Check the database to make sure the type does not exit  before adding the type
        $check_query = "SELECT * FROM appointment_type WHERE app_type='$type'  LIMIT 1";
        $result = mysqli_query($db, $check_query);
        $app_type = mysqli_fetch_assoc($result);

        if ($app_type) { // if user exists
            if ($app_type['email'] === $type) {
              array_push($type_errors, "* appointment type already exist!");
            }
        }
        if ((count($type_errors) == 0)) { 
            $query = "INSERT INTO appointment_type (app_type) 
                      VALUES('$type')";
                  mysqli_query($db, $query);
              $_SESSION['success'] = "Appointment type added";
              header('location: http://localhost/Scheduling app/admin_appoint.php');
        }

    }

else{
    //if the no usertype is selected
    //echo '<script>alert("Error! You must select a user type")</script>';
  }  