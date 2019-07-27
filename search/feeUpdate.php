<?php

{ 		//	Secure Connection Script
    $dbSuccess = false;
    $dbConnected = mysqli_connect("localhost","root","");
    
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
if($_GET["updated"]){

        $regNo = $_COOKIE["regNo"];
        // echo $regNo;
        $status = $_POST["status"];
        $editQuery ="UPDATE collegeDB.feeDetails SET Status= $status WHERE RegistrationNo = '$regNo'";
        // $searchQuery = " * FROM collegeDB.feeDetails WHERE RegistrationNo = '$regNo'";
        // echo $editQuery;
        if($row = mysqli_query($dbConnected, $editQuery)){
            // echo "success";
            header("Location: feeRecords.php?updated=1");
            // $arr = mysqli_fetch_array($row);
            // $i = 0;
            // while($arr[$i]!=NULL){
            //     echo $i;
            //     echo "-->";
            //     echo $arr[$i];
            //     echo "<br>*******";
            //     $i++;
            // }
            
        }
    }

else{

//This script puts out an HTML form using php
//to allow users to enter data
        

            // while($arr[$i]=="paid"){
            //     $i++;
            // }
            echo ' <div class="container">
                <div class ="card h-center" style="width:450px; margin:0 auto;">
                <div class="card-body">
                    <h3 style="text-align:center; color: teal">Fee update form</h3>

                <form action="feeUpdate.php?updated=1" method=post>
                        <div class="form-group">
                        <label for="sel1">Semester:</label>
                        <select class="form-control" id="sel1" name="status">
                        <option value=0>Not Paid</option>
                        <option value=1>Paid</option>
                        
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info">Update Fees </button>
                    </form>
                    </div></div></div> ';
            
                }
           
        
echo '</div>';
?>