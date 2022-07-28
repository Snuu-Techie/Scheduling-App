<?php
//include('C:\xampp\htdocs\Scheduling app\DAO\newAppDAo.php');
?>
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
    <!-- CSS File -->
<link rel="stylesheet" href="style/add.css" />
</head>
    <title>Schedule</title>
  </head>
<body>
<div class="wrapper">
	<div class="registration_form">
		<div class="title">
			Add new Appointment
        	</div>
          

		<form method="POST" action='DAO\newAppDAO.php' enctype="multipart/form-data">
			<div class="form_wrap">
				<div class="input_wrap">
<?php 
// get data from session
if(!isset($_SESSION)) { 
  session_start(); 
  $email = $_SESSION['email'];
  $fullname = $_SESSION['fullname'];
} 
?>      
		<input type="text" id="id" name = "id" placeholder="Email" value="<?php echo $email ?>">
          <br></br>
          <input type="text" id="attendee" name = "attendee" placeholder="attendee" value="<?php echo $fullname ?>">
          <br></br>
          <input type="date" id="date" name = "date" placeholder="date" value="">
          <br></br>
          <input type="time" id="time" name = "time" placeholder="time" value="">
          <br></br>	

        <?php
            //connect to the database
            $db = mysqli_connect('localhost', 'root', '', 'schedule');
            // Attempt select query execution
             $sql = "SELECT * FROM appointment_type ORDER BY id";
            $result = mysqli_query($db, $sql);

            echo "<select name=\"app_type\">"; 
                while ($row = mysqli_fetch_array($result)) {
            echo "<option value='" . $row['app_type'] . "'>" . $row['app_type'] . "</option>";
                }
            echo "</select>";

?>

				</div>
				<div class="input_wrap">
					<input type="submit" value="Create" class="submit_btn" name="create_appo">
				</div>

			</div>
		</form>
	</div>
</div>
</body>


</html>