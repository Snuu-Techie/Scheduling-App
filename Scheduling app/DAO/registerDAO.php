<?php
if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

// initializing variables
$email = "";
$fullname = "";
$phone = "";
$password = "";

// array to store password and username related errors
$email_errors = array(); 
$pass_errors = array();
$name_errors = array(); 
$phone_errors = array();

// connect to MySQL localhost database
$db = mysqli_connect('localhost', 'root', '', 'schedule');

//receive input from dropdown list
$user_type = filter_input(INPUT_POST, 'usertype', FILTER_UNSAFE_RAW);

 // REGISTERING a user
    if (isset($_POST['reg_user'])) {
        // receive input values from the form fields
        $email= mysqli_real_escape_string($db, $_POST['email']);
        $fullname = mysqli_real_escape_string($db, $_POST['fullname']);
        $phone = mysqli_real_escape_string($db, $_POST['phone']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        //receive input from dropdown list
        $user_type = $user_type;

        //form validation: 
        // Ensure that the form is correctly filled 
        // Add errors to the error array if the form is not filled correctly
        if (empty($email)) { array_push($email_errors, "* Email is required!"); }
        if (empty($fullname)) { array_push($name_errors, "* Fullname is required!"); }
        if (empty($password)) { array_push($pass_errors, "* Password is required!"); }
        if (empty($phone)) { array_push($phone_errors, "* Phone number is required!"); }

        // Using an email Check the database to make sure the user does not exit  before adding the user
        $user_check_query = "SELECT * FROM user WHERE email='$email'  LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);

        if ($user) { // if user exists
            if ($user['email'] === $email) {
              array_push($email_errors, "* Email already exists!");
            }
        }
        if ((count($email_errors) == 0 && count($pass_errors)==0 && count($name_errors)==0 && count($phone_errors)==0)) {
            //Encrypting the password 
            $password = md5($password);
            $query = "INSERT INTO user (email, pass, fullname, phone, user_type) 
                      VALUES('$email', '$password', '$fullname', '$phone', '$user_type')";
                  mysqli_query($db, $query);
              $_SESSION['email'] = $email;
              $_SESSION['success'] = "Account created";
              header('location: http://localhost/Scheduling app/admin.php');
        }

    }

else{
    //if the no usertype is selected
    //echo '<script>alert("Error! You must select a user type")</script>';
  }  