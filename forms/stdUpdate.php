<?php
// echo 'style = background-color:blue';
    // echo '<link rel="stylesheet" type="text/css" href="styling.css">';
$dbConnected  = mysqli_connect("localhost", "root","");

$regNo= $_COOKIE["username"];
$thisScriptName = "stdUpdate.php";
$updated= $_GET["updated"];
if(isset($updated)){

    $name = $_POST["name"];
    $parent = $_POST["parentage"];
    $rNo = $_POST["studentRno"];
    $phNo = $_POST["phoneNo"];
    $add = $_POST["studentAddress"];
    $updateName = "UPDATE collegeDB.studentrecords SET ";
    $updateName .= "Name = '$name', 
    Parentage = '$parent', Address = '$add', PhoneNo = $phNo ";
    
    $updateName .= " WHERE RegistrationNo = '$regNo'";
    // echo $updateName;
    if(mysqli_query($dbConnected, $updateName)){
        header("Location: ../index.php");
    }

}
else{
    $grabValues = "SELECT * FROM collegeDB.studentrecords WHERE RegistrationNo = '$regNo'";
    // echo $grabValues;
    if($arr = mysqli_query($dbConnected , $grabValues)){
        $row = mysqli_fetch_array($arr);
        $firstName = $row[3];
        $parent = $row[4];
        $rNo = $row[2];
        $phNo = $row[6];
        $sem = $row[7];
        // $pwd = $row["pwd"];
        $add = $row[5];

    }
    echo '<link rel="stylesheet" href="..\includes\bootstrap-4.3.1-dist\css\bootstrap.min.css">
    <script src="..\includes\jquery.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> -->
    <script src="..\includes\bootstrap-4.3.1-dist\js\bootstrap.min.js"></script>';
  echo '<link rel="stylesheet" href="../includes/menu.css" type="text/css">';
  echo '<div class=sidebar>';
  include_once("../includes/adminMenu.php");
  echo '</div>';
  echo '<div class=content>';

//     echo '<link rel="stylesheet" href="..\includes\bootstrap-4.3.1-dist\css\bootstrap.min.css">
//     <script src="..\includes\jquery.js"></script>';
//     echo '<style>
//     content {
//         margin-left: 200px;
//         padding: 1px 16px;
//         height: 1000px;
//       }
      
// .container{
//     margin-top:100px;
//     height: 90%;
//     align-content: center;
//     font-size:14px;
//   }
//   .card-body{
//     background-color : rgb(26, 68, 99);
//   }
 
//       </style>';
    
echo '<div class="container">
<div class ="card h-center" style="width:450px; margin:0 auto;">
    <div class="card-body">
        <h3 style="text-align:center; color: teal">Sign Form</h3>';
    
    echo '<h2> Update Details</h2>';
    echo '<form action="'.$thisScriptName.'?updated=1" method="post">';

    echo '<div class="form-group">
    <label for="username">Username:</label>
    <input type="text" class="form-control" id="username" placeholder="Enter Username" name="username" readonly="readonly" value='.$regNo.'  >
  </div>
  <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" value="'.$firstName.'" >
    </div>
    <div class="form-group">
      <label for="parentage">Parentage:</label>
      <input type="text" class="form-control" id="parentage" placeholder="Enter Parentage" name="parentage"  value='.$parent.' >
    </div>
    <div class="form-group">
      <label for="address">Address:</label>
      <input type="text" class="form-control" id="address" placeholder="Enter Address"  name="studentAddress" value='.$add.' >
    </div>
    <div class="form-group">
      <label for="Rno">Roll No:</label>
      <input type="text" class="form-control" id="Rno" placeholder="Enter Roll No" name="studentRno"  value='.$rNo.'>
    </div>
    <!-- Semester DropDown here -->
    <div class="form-group">
    <label for="semester">Semester:</label>
    <input type="text" class="form-control" id="semester" placeholder="Enter Semester" name="semester" readonly="readonly" value='.$sem.'>
  </div>
    <div class="form-group">
          <label for="Pno">Phone No:</label>
          <input type="text" class="form-control" id="Pno" placeholder="Enter Phone No" name="phoneNo"  value='.$phNo.' >
    </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
  </div>
  
  <button type="submit" class="btn btn-info">Update</button>
</form>
</div>
</div>
</div>';


            }
            echo '</div>';


        ?>