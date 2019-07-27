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
    echo '<link rel="stylesheet" href="../includes/menu.css" type="text/css">';

    echo '<div class=sidebar>';
    
        include_once("../includes/adminMenu.php");
    echo '</div>';
echo '<div class=content>';

if($row = @mysqli_fetch_all(mysqli_query($dbConnected, "SELECT * FROM collegeDB.libraryRecords WHERE FINE>0"))){
    $i=0;
        // echo '<link rel="stylesheet" href="../includes/table.css" type="text/css"';

    echo '<table border=1 align=center>';
    echo '<tr>';
    echo '<th>ID</th>
            <th>Registration No</th>
            <th>BookCount </th>  <th>Book1ID </th> <th>Book2ID </th> <th>Book3ID </th>  <th>Book1Due </th><th>Book2Due </th>
            <th>Book3Due </th>  <th>Fine </th></tr>';
    while(@$row[$i]){
        $ii=0;
        echo '<tr>';

        while(@$ii<10){
            echo '<td>'.$row[$i][$ii].'</td>';
            $ii++;
        }
        echo '</tr>';
        $i++;
        // echo '<br><hr>';
        }
        echo '</table>';


    }
    echo '</div>';

}

















?>