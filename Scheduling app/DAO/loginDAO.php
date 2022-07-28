<?php
session_start();    
// initializing variables
$email = "";
$password = "";

// array to store password and username related errors
$email_errors = array(); 
$pass_errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'schedule');

       //log user into the system 
    if (isset($_POST['log_user'])) {
        // receive all input values from the form
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        
        // add errors 
        if (empty($email)) { array_push($email_errors, "* Email is required!"); }
        if (empty($password)) { array_push($pass_errors, "* Password is required!"); }
          
         if ((count($email_errors) == 0 && count($pass_errors)== 0)) {
            $password = md5($password);
            //checking if the user exists
            $query = "SELECT * FROM user WHERE email='$email' AND pass='$password'";
            $results = mysqli_query($db, $query);
            $user = mysqli_fetch_assoc($results);
                
            if (mysqli_num_rows($results) === 1) { 
                if ($user['email'] === $email && $user['pass'] === $password) {
                    $_SESSION['email'] = $email;
                    $_SESSION['fullname'] = $user['fullname'];
                    $_SESSION['phone'] = $user['pnumber'];
                    $_SESSION['user_type'] = $user['user_type'];
                    $_SESSION['success'] = "You are now logged in";
                        if ($user['user_type'] == "Agent"){
                            header('location: http://localhost/Scheduling app/agent.php');
                        }else{
                            header('location: http://localhost/Scheduling app/admin.php');
                        }
                }
            }else{
                    echo '<script>alert("Error! Wrong username/password combination")</script>';  
            }    
        }
    }

?>