<?php




{
    include_once("../includes/dbConfig.php");
    $dbConnected = mysqli_connect($db["hostname"], $db["username"], $db["password"]);
    $dbName = $db["database"];
    $deleteDB = "DROP DATABASE ".$dbName;
    if(mysqli_query($dbConnected, $deleteDB)){
        echo "DB deleted";
    }
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

    $createAccessLevel = "CREATE TABLE ".$dbName.".accessControl ( ";
    $createAccessLevel .= "ID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, ";
    $createAccessLevel .= "userType VARCHAR(50), accessLevel INT(11) )";
    echo "<br>".$createAccessLevel;
    if(mysqli_query($dbConnected, $createAccessLevel)){
        echo 'Success';
        $insertQuery = "INSERT INTO ".$dbName.".accessControl (";
        $insertQuery .= "userType, accessLevel) ";
        $insertQuery .= "VALUES ('admin', 99), ('student',1)";
        echo $insertQuery;
        if(mysqli_query($dbConnected, $insertQuery)){
            echo "insert success";

        }
        else{
            echo 'failed insertion<br>';
        }
    }
    else{
        echo "Failed";
    }




{
    $filename = fopen("../files/stdData", "r");
    $i=0;
    while(!feof($filename)){
        $thisLine = fgets($filename);
        $tableData[$i] = explode(",",$thisLine);
        $i++;

    }
    fclose($filename);

    $insertRecords = "INSERT INTO ".$dbName.".studentRecords ( ";
    $insertRecords .= "RegistrationNo, RollNo, FirstName, LastName, Parentage, Address, PhoneNo, Semester) ";
    $insertRecords .="VALUES (";
    $ii=0;
    while($ii<$i){
        // $insertRecords .="'.$tableData[$i][0].', ";
        // $insertRecords .=".$tableData[$i][1]. ,";
        // $insertRecords .="'.$tableData[$i][2].', ";
        // $insertRecords .="'.$tableData[$i][3].',";
        // $insertRecords .="'.$tableData[$i][4].',";
        // $insertRecords .="'.$tableData[$i][5].',";
        // $insertRecords .=".$tableData[$i][6].,";
        // $insertRecords .=".$tableData[$i][7]";
        // $insertRecords .=")";
        echo "<br>".$tableData[$ii][0];
        $insertRecords .=""'.$tableData[$ii][0]."';


        $ii++;
}
echo '<br>'.$insertRecords;




}


}

?>

}
















?>