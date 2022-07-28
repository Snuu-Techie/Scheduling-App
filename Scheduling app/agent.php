<?php
// get data from session
if(!isset($_SESSION)) { 
    session_start(); 
    $email = $_SESSION['email'];
    $fullname = $_SESSION['fullname'];
  } 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- styles -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- CSS File -->
    <link rel="stylesheet" href="style/dash.css" />
    <title>agent</title>
  </head>
  <body>
      <header class="header">
      <!-- Logo -->
      <div class="logo left">
        <i id="menu" class="material-icons">menu</i>   
      </div>
     
 
  <div class="icons right">
   

   <i class="material-icons display-this">account_circle</i>
   <i class="material-icons display-this">logout</i>
  
 
 </div>

</header>

      <main>
          <div class="side-bar">
            <div class="nav">
            
            <a class="nav-link active">
            <i class="material-icons">apps</i>
                <span>Appointments</span>
            </a>

           
          </div>
          <hr>
        </div>

       
     
  <!--content starts -->
  <div class="content">
    <?php 

    // account created message
    if(!isset($_SESSION)) { 
      session_start(); 
    } 
    if (isset($_SESSION['success'])): ?>
	    <div class="msg">
		    <?php 
		      echo $_SESSION['success']; 
			      unset($_SESSION['success']);
		      ?>
	    </div>  
    <?php endif ?>
    
    <div class="users">
    <?php
                    
                    //connect to the database
                    $db = mysqli_connect('localhost', 'root', '', 'schedule');
                    // Attempt select query execution
                    $sql = "SELECT * FROM appointment WHERE id = '$email' ORDER BY num ";
                        if($result = mysqli_query($db, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                echo "<tr>";
        
                                    echo "<th>#</th>";
                                    echo "<th>ID</th>";
                                    echo "<th>Attendee(s)</th>";
                                    echo "<th>Date</th>";
                                    echo "<th>Time</th>";
                                    echo "<th>Type</th>";
                                               
                                echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                        while($row = mysqli_fetch_array($result)){
                                echo "<tr>";
                                    echo "<td>" . $row['num'] . "</td>";
                                    echo "<td>" . $row['id'] . "</td>";
                                    echo "<td>" . $row['attendee'] . "</td>";
                                    echo "<td>" . $row['ap_date'] . "</td>";
                                    echo "<td>" . $row['ap_time'] . "</td>";
                                    echo "<td>" . $row['ap_type'] . "</td>";
                                echo "</tr>";
                                           
                                        }
                                        echo "</tbody>";                            
                                    echo "</table>";
                                    
                            // Free result set
                            mysqli_free_result($result);
                                   
                        } else{
                                    echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
            } else{
                                echo "Oops! Something went wrong. Please try again later.";
            }
                // Close connection
                mysqli_close($db);
            ?>
    <div class = "buttonstyle">
      <a href="http://localhost/Scheduling app/new_appointment.php"> 
    <button class="ghost" id="">New Appointment</button></a>
    </div>
    
    </div>
  
  </div>
      </main>
  <!-- Main Body Ends -->
</body>
</html>