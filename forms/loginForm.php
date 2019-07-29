<?php
{ 		//	Secure Connection Script
    include('../includes/dbConfig.php'); 
    $dbSuccess = false;
    $dbConnected = mysqli_connect("localhost","root","");
    
    if ($dbConnected) {		
        $dbSelected = mysqli_select_db($dbConnected, "collegeDB");
        if ($dbSelected) {
            $dbSuccess = true;
        } 	
    }
    //	END	Secure Connection Script
}
$thisScriptName = "loginForm.php";
$username = @$_POST["username"];


    if(isset($username)){
        // echo ''.$username;
        $password = $_POST["password"];
        $md5password = md5($password);
        // echo ''.$md5password;

        {
            $tUser_query = "SELECT password, accessLevel, ID FROM collegeDB.tUser ";
            $tUser_query .="WHERE username = '".$username."' ";

            $tUser_select = mysqli_query($dbConnected, $tUser_query);
            while($row = mysqli_fetch_array($tUser_select)){
                $passwordRetrieved = $row[0];
                $accessLevel = $row[1];
                $userID = $row[2];
            }
            // echo ''.$accessLevel;

            if(!empty($passwordRetrieved) AND ($md5password == $passwordRetrieved)){

                setcookie("accessLevel", $accessLevel, time()+7200,"/");
                setcookie("userID",$userID, time()+7200,"/");
                setcookie("username",$username, time()+7200,"/");


                setcookie("loginAuthorised","loginAuthorised", time()+7200,"/");
                header("Location: ../index.php");
                // echo '<a href="../index.php"> Homepage</a>';
                // echo "set";
            }
            else{
                // echo "Login Failed";
                echo '<link rel="stylesheet" href="..\includes\bootstrap-4.3.1-dist\css\bootstrap.min.css">
                <script src="..\includes\jquery.js"></script>
                <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> -->
                <script src="..\includes\bootstrap-4.3.1-dist\js\bootstrap.min.js"></script>';
                
                echo '
                <body background=  "../includes/back.jpg">


                <div class="container" style=margin-top:200px;>
                    <div class ="card h-center" style="width:450px; margin:0 auto;">
                    <div class="card-body">
                    <h2 style="text-align:center; color: teal">Login Failed</h2>
                    <a href="loginForm.php" class="btn btn-info" role="button" style="text-align:center">Try Again</a>';

            
                            echo '</div></div></div></body>';

                    exit();

            }
        }
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="..\includes\bootstrap-4.3.1-dist\css\bootstrap.min.css">
  <script src="..\includes\jquery.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> -->
  <script src="..\includes\bootstrap-4.3.1-dist\js\bootstrap.min.js"></script>
  <style> 
  /* #username,#pwd{
      width:50%;  
  } */
  
  body{
    background-image: url("../includes/back.jpg");
  }
.container{
  margin-top:200px;
  align-content: center;
}
.card-body{
  background-color : rgb(26, 68, 99);
}

  
  
  </style>
</head>
<body>

<div class="container">
  <div class ="card h-center" style="width:450px; margin:0 auto;">
        <div class="card-body">
        <h2 style="text-align:center; color: teal">Login Form</h2>

		<form action="loginForm.php" method=post>
			<div class="form-group">
			<label for="username">Username:</label>
			<input type="text" class="form-control" id="username" placeholder="Enter Username" name="username">
			</div>
			<div class="form-group">
			<label for="pwd">Password:</label>
			<input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
			</div>
			<div class="form-group form-check">
			<label class="form-check-label">
				<input class="form-check-input" type="checkbox" name="remember"> Remember me
			</label>
			</div>
			<button type="submit" class="btn btn-info">Login</button>
		</form>
		<br>
		<a href="signup.php" class="btn btn-info" role="button" style="text-align:center">Sign Up</a>
		</div>
	</div>
</div>

</body>
</html>
