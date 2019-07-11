<?php

{
    include_once("../includes/dbConfig.php");
    $dbConnected = mysqli_connect($db["hostname"], $db["username"], $db["password"]);
    $dbName = $db["database"];
    $createSQL_DB = "CREATE DATABASE ".$dbName;  
    $dbSuccess = false;
    if(mysqli_query($dbConnected, $createSQL_DB )){
        echo "Database created<br>";
        $dbSuccess = true;
    }
    
}
if($dbSuccess){
    $createStudentRecordTable = "CREATE TABLE ".$dbName.".studentRecords ( ";
    $createStudentRecordTable .= "ID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, ";
    $createStudentRecordTable .= "RegistrationNo VARCHAR(50) NOT NULL UNIQUE KEY, ";
    $createStudentRecordTable .= "RollNo INT(11),";
    $createStudentRecordTable .= "FirstName VARCHAR(50), LastName VARCHAR(50), ";
    $createStudentRecordTable .= "Parentage VARCHAR(100), Address VARCHAR(250), ";
    $createStudentRecordTable .= "PhoneNo INT(20), Semester INT(11) ";
    $createStudentRecordTable .= ")";
    echo $createStudentRecordTable;

    if(mysqli_query($dbConnected, $createStudentRecordTable)){
        echo "Student Record Table created";

    }
    else{
        echo "Failed to create table";

    }



}
















?>