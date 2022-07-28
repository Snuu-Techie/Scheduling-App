<?php
//session_start();
try{
  // user must login first in order to acess the system
  //if(count($_SESSION) == 0){
    //header('location: http://localhost/FunOlympics/view/registration.php');
  //}
}catch(Exception $e){

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
    <title>admin</title>
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
            
            <a href="http://localhost/Scheduling app/admin.php" class="nav-link">
                <i class="material-icons">people</i>
                <span>Users</span>
            </a>

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

    // appointment added message
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
      $sql = "SELECT * FROM appointment_type ORDER BY id";
        if($result = mysqli_query($db, $sql)){
          if(mysqli_num_rows($result) > 0){
            echo '<table class="table table-bordered table-striped">';
            echo "<thead>";
            echo "<tr>";

              echo "<th>ID</th>";
              echo "<th>Appointment type</th>";
                                       
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";
              while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['app_type'] . "</td>";
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
      <a href="http://localhost/Scheduling app/add_type.php"> 
        <button class="ghost" id="">Add Type</button></a>
    </div>
    <br></br>
    <div class = "buttonstyle">
      <a href="http://localhost/Scheduling app/appointments.php"> 
        <button class="ghost" id="">Appointments</button></a>
    </div>
    
    </div>
  
  </div>
      </main>
  <!-- Main Body Ends -->
</body>
</html>