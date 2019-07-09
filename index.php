<?php
    $status = $_GET["status"];
    if(isset($status) AND $status=="logout"){
        setcookie("loginAuthorised","",time()-3600);
        $loginAuthorised = false;
    
    }
    else{
        $loginAuthorised = ($_COOKIE["loginAuthorised"] == "loginAuthorised");
    }
    if($loginAuthorised){
        $contentFile = "includes/stdMenu.php";
    }
    else{
        header("Location: forms/login.php");
        
    }


?>

<html>
    <head>

    <title> Database Management System</title>
    </head>
    <body>
    <?php

        include_once($contentFile);



    ?>

    </body>
    </html>

