<?php
/* File: loginForm.php
*
*
*
*/

{
    include("../htConfig/dbConfig.php");
    $dbSuccess = false;
    $dbConnected = mysqli_connect($db["hostname"], $db["username"],$db["password"]);
    if($dbConnected){
        $dbSelected = mysqli_select_db($dbConnected,$db["database"]);
        if($dbSelected){
            $dbSuccess=true; 
        }
    }

}