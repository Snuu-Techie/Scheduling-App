<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
    $user_type = $_SESSION['user_type'];
} 

// initializing variables
$id = "";
$attendee = "";

// array to store password and username related errors
$id_errors = array(); 
$attendee_errors = array();
$date_errors = array(); 
$time_errors = array();

// connect to MySQL localhost database
$db = mysqli_connect('localhost', 'root', '', 'schedule');

//receive input from dropdown list
$type = filter_input(INPUT_POST, 'app_type', FILTER_UNSAFE_RAW);

 // REGISTERING a user
    if (isset($_POST['create_appo'])) {
        // receive input values from the form fields
        $id= mysqli_real_escape_string($db, $_POST['id']);
        $attendee = mysqli_real_escape_string($db, $_POST['attendee']);
        $date = date('Y-m-d', strtotime($_POST['date']));
        $time = date('H:i:s', strtotime($_POST['time']));
        //receive input from dropdown list
        $type = $type;

        //form validation: 
        // Ensure that the form is correctly filled 
        // Add errors to the error array if the form is not filled correctly
        if (empty($id)) { array_push($id_errors, "* Email is required!"); }
        if (empty($attendee)) { array_push($attendee_errors, "* attendee(s) is required!"); }
        if (empty($date)) { array_push($date_errors, "* date is required!"); }
        if (empty($time)) { array_push($time_errors, "* time is required!"); }

        if ((count($id_errors) == 0 && count($attendee_errors)==0 && count($date_errors)==0 && count($time_errors)==0)) {
           
            $query = "INSERT INTO appointment (id, attendee, ap_date, ap_time, ap_type) 
                      VALUES('$id', '$attendee', '$date', '$time', '$type')";
                  mysqli_query($db, $query);
                  $_SESSION['success'] = "Appointment created";
            if ( $user_type == 'Agent'){
                header('location: http://localhost/Scheduling app/agent.php');

            }else{
                header('location: http://localhost/Scheduling app/appointments.php');

            }

    }
}

 