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
    $createStudentRecordTable .= "Name VARCHAR(250), ";
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
        $insertQuery .= "VALUES ('admin', 99), ('student',1),('librarian',21), ('accounts', 11), ('academics', 31)";
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

    $createTUser = "CREATE TABLE ".$dbName.".tUser ( ";
    $createTUser .= "ID INT(11) AUTO_INCREMENT PRIMARY KEY, ";
    $createTUser .= "username VARCHAR(50) UNIQUE, accessLevel INT(11) NOT NULL, password VARCHAR(50) )";
    echo ''.$createTUser;
    if(mysqli_query($dbConnected, $createTUser)){
        echo '<br>Success';
    }

    $createLibraryRecords = "CREATE TABLE ".$dbName.".libraryRecords ( ";
    $createLibraryRecords .= "ID INT(11) AUTO_INCREMENT PRIMARY KEY, ";
    $createLibraryRecords .= "RegistrationNo VARCHAR(50), BookCount INT(11) NOT NULL, Book1ID INT(11) NOT NULL, Book2ID INT(11) NOT NULL, Book3ID INT(11) NOT NULL,";
    $createLibraryRecords .= "Book1Due DATE,Book2Due DATE,Book3Due DATE , Fine INT(11) NOT NULL )";
    echo ''.$createLibraryRecords;
    if(mysqli_query($dbConnected, $createLibraryRecords)){
        echo '<br>Success';
    }

    $createBook = "CREATE TABLE ".$dbName.".books ( ";
    $createBook .= "BookID INT(11) PRIMARY KEY, ";
    $createBook .= "BookName VARCHAR(50), Author VARCHAR(50), Available INT(11) NOT NULL, IssuedTo VARCHAR(50))";
    echo ''.$createBook;
    if(mysqli_query($dbConnected, $createBook)){
        echo '<br>Success';
    }
    $createMarks = "CREATE TABLE ".$dbName.".marks ( ";
    $createMarks .= "ID INT(11) PRIMARY KEY AUTO_INCREMENT, ";
    $createMarks .= "RegistrationNo VARCHAR(50), Semester1 FLOAT(11) NOT NULL,  Semester2 FLOAT(11) NOT NULL, Semester3 FLOAT(11) NOT NULL, 
            Semester4 FLOAT(11) NOT NULL, Semester5 FLOAT(11) NOT NULL, Semester6 FLOAT(11) NOT NULL, Semester7 FLOAT(11) NOT NULL, Semester8 FLOAT(11) NOT NULL, SGPA FLOAT(11) NOT NULL)";
    echo ''.$createMarks;
    if(mysqli_query($dbConnected, $createMarks)){
        echo '<br>Success';
    }

    $createfeeRecords = "CREATE TABLE ".$dbName.".feeRecords ( ";
    $createfeeRecords .= "ID INT(11) PRIMARY KEY AUTO_INCREMENT, ";
    $createfeeRecords .= "RegistrationNo VARCHAR(50), FirstSemester TEXT(40) ,SecondSemester TEXT(40) ,ThirdSemester TEXT(40) ,FourthSemester TEXT(40),
    FifthSemester TEXT(40) ,SixthSemester TEXT(40) ,SeventhSemester TEXT(40), EighthSemester TEXT(40) )";
    echo ''.$createfeeRecords;
    if(mysqli_query($dbConnected, $createfeeRecords)){
        echo '<br>Success';
    }
    $createfeeRecords = "CREATE TABLE ".$dbName.".feeDetails ( ";
    $createfeeRecords .= "ID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, ";
    $createfeeRecords .= "RegistrationNo VARCHAR(50),Name VARCHAR(250), Semester INT(11) NULL,Status INT(11) NOT NULL )";
    echo ''.$createfeeRecords;
    if(mysqli_query($dbConnected, $createfeeRecords)){
        echo '<br>Success';
    }

    $createStudentRecordTable = "CREATE TABLE ".$dbName.".employeeRecords ( ";
    $createStudentRecordTable .= "ID INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY, ";
    $createStudentRecordTable .= "empType VARCHAR(50) NOT NULL, ";
    $createStudentRecordTable .= "Name VARCHAR(250), ";
    $createStudentRecordTable .= "Parentage VARCHAR(100), Address VARCHAR(250), ";
    $createStudentRecordTable .= "PhoneNo INT(20), Speciality VARCHAR(11) NULL ";
    $createStudentRecordTable .= ")";
    echo $createStudentRecordTable;

    if(mysqli_query($dbConnected, $createStudentRecordTable)){
        echo "Student Record Table created";

    }
    else{
        echo "Failed to create table";

    }
    $insertQuery = "INSERT INTO ".$dbName.".books (";
    $insertQuery .= "BookID, BookName, Author ) ";
    $insertQuery .= "VALUES (1, 'Computer Science', 'Kitchee'), (2,'Brief History of Time','S.Hawking'),(3,'Data Structures','B. Swamy'), (4,'Organic Chemistry', 'Morrison')";
    echo $insertQuery;
    mysqli_query($dbConnected, $insertQuery);
    $insertQuery = "INSERT INTO ".$dbName.".employeeRecords (";
    $insertQuery .= " ID ,  empType ,  Name ,  Parentage ,  Address ,  PhoneNo ,  Speciality )";
    $insertQuery .= " VALUES (1, 'teacher', 'Azad','Riyaz','Tengpora', 70000000, 'CS'), 
                                (2, 'teacher', 'Owais','Fayaz','Soura', 7000043500, 'CS'),
                                    (3, 'librarian', 'G.Mohammad','Abdullah','Soura', 704350000,NULL),
                                    (4, 'accounts', 'Azad','Riyaz','Tengpora', 70000000, NULL),
                                    (5, 'academics', 'Azad','Riyaz','Tengpora', 70000000,NULL)";
                                    echo $insertQuery;
                   
 if(mysqli_query($dbConnected, $insertQuery)){
     echo 'success';
 }

                                    
    


// {
//     $filename = fopen("../files/stdData", "r");
//     $i=0;
//     while(!feof($filename)){
//         $thisLine = fgets($filename);
//         $tableData[$i] = explode(",",$thisLine);
//         $i++;

//     }
//     fclose($filename);

//     $insertRecords = "INSERT INTO ".$dbName.".studentRecords ( ";
//     $insertRecords .= "RegistrationNo, RollNo, FirstName, LastName, Parentage, Address, PhoneNo, Semester) ";
//     $insertRecords .="VALUES ";
//     $ii=0;
//     while($ii<$i-1){
//         $insertRecords .="(".$tableData[$ii][0]; 
//         $insertRecords .=" , ".$tableData[$ii][1]; 
//         $insertRecords .=", ".$tableData[$ii][2]; 
//         $insertRecords .=", ".$tableData[$ii][3]; 
//         $insertRecords .=", ".$tableData[$ii][4]; 
//         $insertRecords .=", ".$tableData[$ii][5]; 
//         $insertRecords .=", ".$tableData[$ii][6]; 

//         $insertRecords .=", ".$tableData[$ii][7]; 
//         if($ii==$i-2){
//             $insertRecords .=" ) ";
//         }
//         else{
//             $insertRecords .=" ) ,";

//         }

//         // $insertRecords .=")";
//         echo "<br>***".$tableData[$ii][0];
      


//         $ii++;
// }
// echo '<br>'.$insertRecords;
// if(mysqli_query($dbConnected, $insertRecords)){
//     echo 'Record nserted';
// }
// else{
//     echo "Failed";
// }
}



?>
