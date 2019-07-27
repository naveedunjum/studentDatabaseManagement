<?php

{ 		//	Secure Connection Script
    include('../includes/dbConfig.php'); 
    $dbSuccess = false;
    $dbConnected = mysqli_connect($db['hostname'],$db['username'],$db['password']);
    
}
{
    $regNo=$_COOKIE["regNo"];
    echo '$regNo';
    updateValues('FirstSemester', $_POST["1"]);
    updateValues('SecondSemester', $_POST["2"]);
    updateValues('ThirdSemester', $_POST["3"]);
    updateValues('FourthSemester', $_POST["4"]);
    updateValues('FifthSemester', $_POST["5"]);
    updateValues('SixthSemester', $_POST["6"]);
    updateValues('SeventhSemester', $_POST["7"]);
    updateValues('EighthSemester', $_POST["8"]);


}


function updateValues($par, $val){
    global $dbConnected;
    global $regNo;
    if(isset($val) && (!empty($val))){
        // echo ''.$val;
        
        // echo '<br>'.$regNo;
        $updateName = "UPDATE collegeDB.feeRecords SET ";
        $updateName .= "$par = '$val'";
        $updateName .= " WHERE RegistrationNo = '$regNo'";
        echo '<br>'.$updateName;
        if(mysqli_query($dbConnected, $updateName)){
            // echo '<br>Success';
        }
        else{
            // echo 'FAiled';
    }

    }
    if($par=="EighthSemester"){
        header("Location: ../search/feeRecords.php");
    }
    }
