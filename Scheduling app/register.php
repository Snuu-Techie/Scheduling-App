<?php
include('C:\xampp\htdocs\Scheduling app\DAO\registerDAO.php');
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
			Add new User
        	</div>
          

		<form method="POST" action='DAO\registerDAO.php' enctype="multipart/form-data">
			<div class="form_wrap">
				
                <div class="input_wrap">
					<input type="text" id="email" name = "email" placeholder="Email" value="">
          <br></br>
          <input type="password" id="password" name = "password" placeholder="Password" value="">
          <br></br>
          <input type="text" id="fullname" name = "fullname" placeholder="Fullname" value="">
          <br></br>
          <input type="text" id="phone" name = "phone" placeholder="Phone number" value="">
					<br></br>
                    <select name="usertype" id="type">
                        <option selected=""> Select user type</option>
                        <option value="Admin">Admin</option>
                        <option value="Agent">Agent</option>
                    </select>

				</div>
				<div class="input_wrap">
					<input type="submit" value="Register" class="submit_btn" name="reg_user">
				</div>

			</div>
		</form>
	</div>
</div>
</body>


</html>

