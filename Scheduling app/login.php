<?php
include('C:\xampp\htdocs\Scheduling app\DAO\loginDAO.php');
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
			Login
        	</div>
          

		<form method="POST" action='login.php' enctype="multipart/form-data">
			<div class="form_wrap">
				
                <div class="input_wrap">
		  <input type="text" id="email" name = "email" placeholder="Email" value="">
          <br></br>
          <input type="password" id="password" name = "password" placeholder="Password" value="">
          <br></br>

				</div>
				<div class="input_wrap">
					<input type="submit" value="Login" class="submit_btn" name="log_user">
				</div>

			</div>
		</form>
	</div>
</div>
</body>


</html>