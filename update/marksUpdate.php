<?php
    $dbConnected = mysqli_connect("localhost", "root","");
    $thisScriptName = "marksUpdate.php";
    $regNo = $_POST["regNo"];
    echo $regNo;
    updateValues('Semester1', $_POST["first"]);
    updateValues('Semester2', $_POST["second"]);
    updateValues('Semester3', $_POST["third"]);
    updateValues('Semester4', $_POST["fourth"]);
    updateValues('Semester5', $_POST["fifth"]);
    updateValues('Semester6', $_POST["sixth"]);
    updateValues('Semester7', $_POST["seventh"]);
    updateValues('Semester8', $_POST["eighth"]);








    $selectBooks = "SELECT * FROM studentInfo.marks ";
    $selectBooks .= "WHERE RegistrationNo ='$regNo'";
    if($row = mysqli_query($dbConnected, $selectBooks)){
        $arr = mysqli_fetch_array($row);
    
    }
        echo '<h1>National Institute of Technology,Srinagar</h1>';
        echo '<br><hr>';
        echo '<h2>Marks Updation</h2>';

        echo '<form action= "'.$thisScriptName.'" method="post">';
        echo   '<input type = hidden value="'.$regNo.'">';
        echo '		Enter First Semester Marks ';
        echo '		<input type="text" name="first" value ="'.$arr[2].'"/>';
        echo '		<br /><br />';

        echo '		Enter Second Semester Marks ';
        echo '		<input type="text" name="second" value ="'.$arr[3].'" />';
        echo '		<br /><br />';

        echo '		Enter Third Semester Marks ';
        echo '		<input type="text" name="third" value ="'.$arr[4].'" />';
        echo '		<br /><br />';

        echo '		Enter Fourth Semester Marks ';
        echo '		<input type="text" name="fourth" value ="'.$arr[5].'"/>';
        echo '		<br /><br />';

        echo '		Enter Fifth Semester Marks ';
        echo '		<input type="text" name="fifth" value ="'.$arr[6].'" />';
        echo '		<br /><br />';

        echo '		Enter Sixth Semester Marks ';
        echo '		<input type="text" name="sixth" value ="'.$arr[7].'" />';

        echo '		<br /><br />';

        echo '		Enter Seventh Semester Marks ';
        echo '		<input type="text" name="seventh" value ="'.$arr[8].'" />';

        echo '		<br /><br />';

        echo '		Enter Eighth Semester Marks ';
        echo '		<input type="text" name="eighth" value ="'.$arr[9].'" />';

        echo '		<br /><br />';

        echo '<input type="submit" />';

        echo "</form>";






function updateValues($par, $val){
    global $dbConnected;
    global $regNo;
    if(isset($val) && (!empty($val))){
                // echo ''.$val;
                
                // echo '<br>'.$regNo;
        $updateName = "UPDATE collegeDB.marks SET ";
        $updateName .= "$par = $val";
        $updateName .= " WHERE RegistrationNo = '$regNo'";
        echo '<br>'.$updateName;
        if(mysqli_query($dbConnected, $updateName)){
                    // echo '<br>Success';
                }
                else{
                    // echo 'FAiled';
            }
        
            }
            if($par=="EighthSem"){
                header("Location: ../search/marksRecords.php");
            }
            }



?>