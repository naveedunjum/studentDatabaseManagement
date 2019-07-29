<?php
    $dbConnected = mysqli_connect("localhost", "root","");
    $thisScriptName = "n.php";
    $regNo = $_COOKIE["regNo"];
    // echo $regNo;
    echo '<link rel="stylesheet" href="..\includes\bootstrap-4.3.1-dist\css\bootstrap.min.css">
    <script src="..\includes\jquery.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> -->
    <script src="..\includes\bootstrap-4.3.1-dist\js\bootstrap.min.js"></script>';
  echo '<link rel="stylesheet" href="../includes/styling.css" type="text/css">';
echo '<body>
<header>';
include_once("../includes/head.php");



echo'
</header>';
echo '
<div class="flex-container">
  <aside>';
    include_once("../includes/adminMenu.php");
    echo '
  </aside
  <main>';
  echo '<div class=content>';
    if(@$_GET["updated"]){
        updateMarks($_POST["first"],$_POST["second"],$_POST["third"],$_POST["fourth"],$_POST["fifth"],$_POST["sixth"],$_POST["seventh"],$_POST["eighth"]);
        
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

        <form action= "n.php?updated=1" method="post">
 
  <div class="form-group">
    <input type = hidden name = regNo value="'.$regNo.'">
    </div>
  <div class="form-group">
      <label for="name">First Semester Marks:</label>
      <input type="text" class="form-control" id="name" name="first" value ="'.$arr[2].'">
    </div>
    <div class="form-group">
      <label for="parentage">Second Semester Marks:</label>
      <input type="text" class="form-control" id="parentage" name="second" value ="'.$arr[3].'">
    </div>
    <div class="form-group">
      <label for="address">Third Semester Marks:</label>
      <input type="address" class="form-control" id="address"  name="third" value ="'.$arr[4].'">
    </div>
    <div class="form-group">
      <label for="Rno">Fourth Semester Marks:</label>
      <input type="Roll No" class="form-control" id="Rno" name="fourth" value ="'.$arr[5].'">
    </div>
  
    <div class="form-group">
          <label for="Pno">Fifth Semester Marks:</label>
          <input type="text" class="form-control" id="Pno"  name="fifth" value ="'.$arr[6].'">
    </div>
  <div class="form-group">
  <label for="pwd">Sixth Semester Marks:</label>

    <input type="text" class="form-control" id="pwd"  name="sixth" value ="'.$arr[7].'">
  </div>
  <div class="form-group">
          <label for="Pno">Seventh Semester Marks:</label>
          <input type="text" class="form-control" id="Pno" name="seventh" value ="'.$arr[8].'">
    </div><div class="form-group">
    <label for="Pno">Eighth Semester Marks:</label>
    <input type="text" class="form-control" id="Pno"  name="eighth" value ="'.$arr[9].'">
</div>
  
  <button type="submit" class="btn btn-info">Update Marks</button>
</form>
</div>
</div>
</div>';
    }
    echo '</div>
    </main>
    </div>
    </body>';
    

    function updateMarks() {
        global $dbConnected;
        global $regNo;
        $arr = array("first","second","third","fourth","fifth","sixth","seventh","eighth");
        // $arg1 = func_get_arg(0);
        // echo $arg1;
        // $arg3=func_get_arg(3);
        // echo $arg3;
        $i=1;
        $updateQuery="UPDATE collegeDB.marks SET ";
        while($i<9){
            $updateQuery .= " Semester".$i."";
            $updateQuery .= ' ='.$_POST[$arr[$i-1]];
            if($i!=8){
                $updateQuery.=",";
            }
    
            
            $i++;
        }
        $updateQuery.=' WHERE RegistrationNo = "'.$regNo.'"';
        echo $updateQuery;
        if(mysqli_query($dbConnected,$updateQuery)){
            header("Location: marksRecords.php?updated=1");
        }
        else{
          echo "Failed to update marks";
        }
    
        //Do some type checking to see which argument it is.
        //check if there is another argument with func_num_args.
        //Do something with the second arg.
     }
    
    
    
    
    
    
    
    
    
    
    
    ?>



?>