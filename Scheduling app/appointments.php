<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
        .msg {
            margin: 30px auto;
            padding: 10px;
            border-radius: 5px;
            color: #F6C33C;
            background: #dff0d8;
            border: 1px solid #F6C33C;
            width: 50%;
            text-align: center;
        }
        .buttonstyle {
            margin-bottom: 10px;
        }
        .buttonstyle button{
            border-radius: 20px;
            border: 1px solid #089BCC;
            background-color: #089BCC;
            color: #FFFFFF;
            font-size: 12px;
            font-weight: bold;
            padding: 10px 30px;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: transform 80ms ease-in;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Appointment Details</h2>
                            <br></br>
                        <?php 
                           if(!isset($_SESSION)) 
                           { 
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
                    </div>
                    <br></br>
                            
                    <div class = "buttonstyle">
                    <a href="http://localhost/Scheduling app/admin_appoint.php"> <button class="ghost" id="">Back</button></a>
                    </div>
                    
        <?php
                    
            //connect to the database
            $db = mysqli_connect('localhost', 'root', '', 'schedule');
            // Attempt select query execution
            $sql = "SELECT * FROM appointment ORDER BY num";
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
        </div>

        
    </div>
    
</body>
</html>
