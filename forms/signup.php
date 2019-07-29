<?php
{ 		//	Secure Connection Script
    include('../includes/dbConfig.php'); 
    $dbSuccess = false;
    $dbConnected = mysqli_connect($db['hostname'],$db['username'],$db['password']);
    $dbName = $db["database"];
    if ($dbConnected) {		
        $dbSelected = mysqli_select_db($dbConnected, $db['database']);
        if ($dbSelected) {
            $dbSuccess = true;
        } 	
    }
    echo '<link rel="stylesheet" href="..\includes\bootstrap-4.3.1-dist\css\bootstrap.min.css">
    <script src="..\includes\jquery.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> -->
    <script src="..\includes\bootstrap-4.3.1-dist\js\bootstrap.min.js"></script>';
    //	END	Secure Connection Script
}
$thisScriptName = "signup.php";
$count=0;
{ $username = @$_POST["username"];
                    
  $studentName =   @$_POST["studentName"];
  $studentPNo = @$_POST["studentPNo"];

  $studentSemester = @$_POST["semester"];
  $studentRno = @$_POST["studentRno"];
  $studentAddress =   @$_POST["studentAddress"];
  $parent =   @$_POST["parentage"];
  $insertStd = "INSERT INTO collegeDB.studentRecords (";
  $insertStd .= "RegistrationNo,RollNo, Name, Parentage, Address, PhoneNo, Semester) ";

  $insertStd .= "VALUES (";
  $insertStd .="
    '".$username."',
    $studentRno,

    '".$studentName."',
    '".$parent."',
    '".$studentAddress."',
    $studentPNo,
    $studentSemester

    ) ";
    $insertLib = "INSERT INTO ".$dbName.".libraryRecords (";
    $insertLib .= "RegistrationNo, BookCount)";
    $insertLib .= " VALUES ('$username', 0";
    $insertLib .= ")";
    // echo $insertLib;
    $insertFee = "INSERT INTO ".$dbName.".feeDetails (";
    $insertFee .= "RegistrationNo, Name, Semester)";
    $insertFee .= " VALUES ('$username' , '$studentName', $studentSemester";
    $insertFee .= ")";
    // echo $insertFee;
    $insertMarks = "INSERT INTO ".$dbName.".marks (";
    $insertMarks .= "RegistrationNo)";
    $insertMarks .= " VALUES ('$username'";
    $insertMarks .= ")";
    

    if(isset($username)){
      if(strlen($_POST["password"])>=8){
        $md5password = md5(  @$_POST["password"]);
        if($_POST["userType"]=="admin"){
            $accessLevel =99;
        }
        elseif($_POST["userType"]=="librarian"){
            $accessLevel =21;
        }
        elseif($_POST["userType"]=="accounts"){
            $accessLevel =11;
        }
        elseif($_POST["userType"]=="academics"){
            $accessLevel =31;
        }
        else{
            $accessLevel = 1;
            if(mysqli_query($dbConnected, $insertStd)){
              if(mysqli_query($dbConnected, $insertLib)){
                if(mysqli_query($dbConnected, $insertMarks)){
                  if(mysqli_query($dbConnected, $insertFee)){
                    echo 'Account Created';
                  }
                }
              }
            }
          }
          if($accessLevel!=1){
            $insertStd = "INSERT INTO collegeDB.employeeRecords (";
              $insertStd .= "empType,Name, Parentage, Address, PhoneNo, Speciality) ";

              $insertStd .= "VALUES (";
              $insertStd .="
                '".$_POST["userType"]."',
                '".$studentName."',
                '".$parent."',
                '".$studentAddress."',
                $studentPNo,
                '".$studentAddress."'

                ) ";
                if(mysqli_query($dbConnected, $insertStd)){
                  

                }

          }
          $insertPwd = "INSERT INTO ".$dbName.".tUser (";
          $insertPwd .= "username, accessLevel, password)";
          $insertPwd .= " VALUES ('$username', ".$accessLevel.",";
          $insertPwd .= "'$md5password'";
          $insertPwd .= ")";
          if(mysqli_query($dbConnected, $insertPwd)){
            header("Location: ../index.php");
            // echo 'Account Created';
          }
          else{
            echo '<body background=  "../includes/back.jpg">';
            echo '<div class="container">
        <div class ="card h-center" style="width:450px; margin:0 auto;">
            <div class="card-body">
                <h3 style="text-align:center; color: teal">SignUp failed</h3>
                <a href="signup.php" class="btn btn-info" role="button" style="text-align:center">Try Again</a>

              </div>
            </div>
          </div></body>';
          exit();}
        }          
        
      else{           
        echo '<body background=  "../includes/back.jpg">';
        echo '<div class="container">
        <div class ="card h-center" style="width:450px; margin:0 auto;">
            <div class="card-body">
                <h3 style="text-align:center; color: teal">Password short</h3>
                <a href="signup.php" class="btn btn-info" role="button" style="text-align:center">Try Again</a>

              </div>
            </div>
          </div></body>';
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
  <!-- jQuery to hide the Roll No and Semester when usertype isnt student -->
  <script>
  $(document).ready(function(){
  $("#admin,#lib,#acc,#aca").click(function(){
    $("#hide").hide();
  });
  $("#std").click(function(){
    $("#hide").show();
  });
  
});</script>
  <style> 
  /* #username,#pwd{
      width:50%;  
  } */
  label{
    color:teal;
  }
  
  body{
    background-color: rgb(220,220,220);
  }
.container{
  /* margin-top:100px; */
  height: 90%;
  align-content: center;
  font-size:14px;
  float:right;
}
.card-body{
  /* background-color : rgb(26, 68, 99); */
}
input{
  height:100px;
  }
  img{
	  border-radius:20px;
  }
  .logo{
	  float:left;
	  margin-top :100px;
	  /* width:100px; */
	  height:100%;
	  
  }


  
  
  </style>
</head>
<body>
<div class=logo>
		<h2 style="margin-left:2.5em"> National Institute of Technology</h2>
		<br><br><
				<img src="../includes/logo.jpg" style="margin-left:5em">
</div>

<div class="container">
  <div class ="card h-center" style="width:450px; margin:0 auto;">
      <div class="card-body">
          <h3 style="text-align:center; color: teal">Sign Up Form</h3>

  <form action="signup.php" method=post>
    <!-- usertype dropdown -->
    <div class="form-group">
        <label for="usertype">User Type:</label>
        <select class="form-control" id="usertype" name="userType">
        <option value="student" id="std">Student</option>
        <option value="admin" id="admin">Admin</option>
        <option value="librarian" id="lib">Librarian</option>
        <option value="accounts" id="acc">Accounts</option>
        <option value="academics" id="aca">Academics</option>
        </select>
      </div> 
    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" id="username" placeholder="Students should enter Registration No" name="username">
    </div>
    <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" class="form-control" id="name" placeholder="Enter Name" name="studentName">
      </div>
      <div class="form-group">
        <label for="parentage">Parentage:</label>
        <input type="text" class="form-control" id="parentage" placeholder="Enter Parentage" name="parentage">
      </div>
      <div class="form-group">
        <label for="address">Address:</label>
        <input type="address" class="form-control" id="address" placeholder="Enter Address" name="studentAddress">
      </div>
      <div id=hide>
      <div class="form-group">
        <label for="Rno">Roll No:</label>
        <input type="Roll No" class="form-control" id="Rno" placeholder="Enter Roll No" name="studentRno">
      </div>
      <!-- Semester DropDown here -->
      <div class="form-group">
        <label for="sel1">Semester:</label>
        <select class="form-control" id="sel1" name="semester">
          <option value="1">1</option>
          <option value=2>2</option>
          <option value=3>3</option>
          <option value=4>4</option>
          <option value=5>5</option>
          <option value=6>6</option>
          <option value=7>7</option>
          <option value=8>8</option>
        </select>
      </div> 
</div>
      <div class="form-group">
            <label for="Pno">Phone No:</label>
            <input type="text" class="form-control" id="Pno" placeholder="Enter Phone No" name="studentPNo">
      </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="password(more than 8 characters)" name="password">
    </div>
    
    <button type="submit" class="btn btn-info">Sign Up</button>
  </form>
  <a href="loginForm.php" class="btn btn-info" role="button" style="text-align:center">Login</a>

</div>
</div>
</div>

</body>
</html>
