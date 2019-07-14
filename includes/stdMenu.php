<?php
{ 		//	Secure Connection Script
    include('dbConfig.php'); 
    $dbSuccess = false;
    $dbConnected = mysqli_connect($db['hostname'],$db['username'],$db['password']);
    
    if ($dbConnected) {		
        $dbSelected = mysqli_select_db($dbConnected, $db['database']);
        if ($dbSelected) {
            $dbSuccess = true;
        } 	
    }
    //	END	Secure Connection Script
}
{
    $userID = $_COOKIE["userID"];
    $selectUsername = "SELECT username FROM collegeDB.tUser ";
    $selectUsername .= "WHERE ID= ".$userID;
    // echo $selectUsername;
    if($row=mysqli_query($dbConnected, $selectUsername)){
        $arr = mysqli_fetch_array($row);

    }
    else{
        echo "failed";
    }
   

    $username = $arr[0];


    $showQuery = "SELECT *
                    FROM collegeDB.studentrecords ";
    $showQuery .=  "WHERE RegistrationNo = '$username'";
    // echo ''.$showQuery;
    $arr = mysqli_query($dbConnected, $showQuery); 
    while ($row = mysqli_fetch_array($arr)) {
        $regNo = $row[1];
        $studentRno =$row[2];
        $firstName =$row[3];
        $lastName =$row[4];
        $parent = $row[5];
        $studentAddress =$row[6];
        $phNo = $row[7];
        $studentSemester = $row[8];
			}
        // echo "Successsss";
        // echo ''.$studentAddress;  
        
    }
    
    // echo '<link rel="stylesheet" type="text/css" href="styling.css">';
    echo '<body>';

    echo '<h1>National Institute of Technology,Srinagar</h1>';
    echo '<br><hr>';
    echo '<h2>Student Information</h2>';
  
    echo "<table>";
        echo "<tr>";
            echo "<th>First Name</th>";
            echo "<td>$firstName</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<th>Last Name</th>";
            echo "<td>$lastName</td>";
        echo "</tr>";
        echo "<tr>";

            echo "<th>Parentage</th>";
            echo "<td>$parent</td>";
        echo "</tr>";

        echo "<tr>";

            echo "<th>Roll no</th>";
            echo "<td>$studentRno</td>";
        echo "</tr>";
        echo "<tr>";

            echo "<th>Semester</th>";
            echo "<td>$studentSemester</td>";
        echo "</tr>";
        echo "<tr>";

            echo "<th>Address</th>";
            echo "<td>$studentAddress</td>";
        echo "</tr>";
        echo "<tr>";

            echo "<th>RegNo</th>";
            echo "<td>$regNo</td>";
        echo "</tr>";
        echo "<tr>";
            echo "<th>Phone No</th>";
            echo "<td>$phNo</td>";
        echo "</tr>";



        //     echo "<th>Year</th>";
        //     echo "<th>Address</th>";
        //     echo "<th>RegNo</th>";
        // echo "</tr>";
        // echo "<tr>";
        //     echo "<td>$studentName</td>";
        //     echo "<td>$studentRno</td>";
        //     echo "<td>$studentYear</td>";
        //     echo "<td>$studentAddress</td>";
        //     echo "<td>$regNo</td>";

        // echo "</tr>";
    echo "</table>";
    // echo '**********************************<br>'.$regNo;
    echo '<br> <br>';

    echo '<a href="forms/stdUpdate.php">Update Information</a>';
    echo '<br> <br>';
    echo '<br> ';

    echo '<a href="libraryRecords.php?regNo='.$regNo.'">Library Records</a>';
    echo '<br> <br>';

    echo '<br> ';
    echo '<a href="cgpa.php?regNo='.$regNo.'">Marks Records</a>';
    echo '<br>';

    echo '<br><br>';
    echo '<a href="feeRecords.php?regNo='.$regNo.'">Fee Records</a>';
    echo '<br><br>';
    echo '<a href="index.php?status=logout">Logout</a>';
    echo '</body>'
    
?>