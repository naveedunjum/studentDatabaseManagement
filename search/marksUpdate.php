<?php
    $dbConnected = mysqli_connect("localhost", "root","");
    $thisScriptName = "marksUpdate.php";
    $regNo = $_COOKIE["regNo"];
    // echo $regNo;
    echo '<link rel="stylesheet" href="..\includes\bootstrap-4.3.1-dist\css\bootstrap.min.css">
    <script src="..\includes\jquery.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> -->
    <script src="..\includes\bootstrap-4.3.1-dist\js\bootstrap.min.js"></script>';
  echo '<link rel="stylesheet" href="../includes/menu.css" type="text/css">';
  echo '<div class=sidebar>';
  include_once("../includes/adminMenu.php");
  echo '</div>';
  echo '<div class=content>';
    if(@$_GET["updated"]){
        updateValues('Semester1', $_POST["first"]);
        updateValues('Semester2', $_POST["second"]);
        updateValues('Semester3', $_POST["third"]);
        updateValues('Semester4', $_POST["fourth"]);
        updateValues('Semester5', $_POST["fifth"]);
        updateValues('Semester6', $_POST["sixth"]);
        updateValues('Semester7', $_POST["seventh"]);
        updateValues('Semester8', $_POST["eighth"]);
    }
    else{




    $selectBooks = "SELECT * FROM collegeDB.marks ";
    $selectBooks .= "WHERE RegistrationNo ='$regNo'";
    if($row = mysqli_query($dbConnected, $selectBooks)){
        $arr = mysqli_fetch_array($row);
    
    }
    echo '
        
<div class="container">
<div class ="card h-center" style="width:450px; margin:0 auto;">
    <div class="card-body">
        <h3 style="text-align:center; color: teal">Sign Form</h3>

        <form action= "'.$thisScriptName.'?updated=1" method="post">
 
  <div class="form-group">
    <input type = hidden name = regNo value="'.$regNo.'">
    </div>
  <div class="form-group">
      <label for="name">First Semester Marks:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Name" name="first" value ="'.$arr[2].'">
    </div>
    <div class="form-group">
      <label for="parentage">Second Semester Marks:</label>
      <input type="text" class="form-control" id="parentage" placeholder="Enter Parentage" name="second" value ="'.$arr[3].'">
    </div>
    <div class="form-group">
      <label for="address">Third Semester Marks:</label>
      <input type="address" class="form-control" id="address" placeholder="Enter Address" name="third" value ="'.$arr[4].'">
    </div>
    <div class="form-group">
      <label for="Rno">Fourth Semester Marks:</label>
      <input type="Roll No" class="form-control" id="Rno" placeholder="Enter Roll No" name="fourth" value ="'.$arr[5].'">
    </div>
  
    <div class="form-group">
          <label for="Pno">Fifth Semester Marks:</label>
          <input type="text" class="form-control" id="Pno" placeholder="Enter Phone No" name="fifth" value ="'.$arr[6].'">
    </div>
  <div class="form-group">
  <label for="pwd">Sixth Semester Marks:</label>

    <input type="text" class="form-control" id="pwd" placeholder="Enter password" name="sixth" value ="'.$arr[7].'">
  </div>
  <div class="form-group">
          <label for="Pno">Seventh Semester Marks:</label>
          <input type="text" class="form-control" id="Pno" placeholder="Enter Phone No" name="seventh" value ="'.$arr[8].'">
    </div><div class="form-group">
    <label for="Pno">Eighth Semester Marks:</label>
    <input type="text" class="form-control" id="Pno" placeholder="Enter Phone No" name="eighth" value ="'.$arr[9].'">
</div>
  
  <button type="submit" class="btn btn-info">Update Marks</button>
</form>
</div>
</div>
</div>';
    }
echo '</div>';



function updateValues($par, $val){
    global $dbConnected;
    global $regNo;
    if(isset($val) && (!empty($val))){
                // echo ''.$val;
                
                // echo '<br>'.$regNo;
        $updateName = "UPDATE collegeDB.marks SET ";
        $updateName .= "$par = $val";
        $updateName .= " WHERE RegistrationNo = '$regNo'";
        echo '<br>'.$updateName;
        if(mysqli_query($dbConnected, $updateName)){
                    // echo '<br>Success';
                }
                else{
                    // echo 'FAiled';
            }
        
            }
            if($par=="Semester8"){
                header("Location: marksRecords.php?updated=1");
            }
            }



?>