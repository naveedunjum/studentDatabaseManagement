<?php
// echo 'style = background-color:blue';
    // echo '<link rel="stylesheet" type="text/css" href="styling.css">';
$dbConnected  = mysqli_connect("localhost", "root","");

$regNo= $_COOKIE["username"];
$thisScriptName = "stdUpdate.php";
$updated= $_GET["updated"];
if(isset($updated)){

    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $parent = $_POST["parentage"];
    $rNo = $_POST["studentRno"];
    $phNo = $_POST["phoneNo"];
    $add = $_POST["studentAddress"];
    $updateName = "UPDATE collegeDB.studentrecords SET ";
    $updateName .= "FirstName = '$firstName', LastName = '$lastName', 
    Parentage = '$parent', Address = '$add', PhoneNo = $phNo ";
    
    $updateName .= " WHERE RegistrationNo = '$regNo'";
    // echo $updateName;
    if(mysqli_query($dbConnected, $updateName)){
        header("Location: ../index.php");
    }

}
else{
    $grabValues = "SELECT * FROM collegeDB.studentrecords WHERE RegistrationNo = '$regNo'";
    // echo $grabValues;
    if($arr = mysqli_query($dbConnected , $grabValues)){
        $row = mysqli_fetch_array($arr);
        $firstName = $row[3];
        $lastName = $row[4];
        $parent = $row[5];
        $rNo = $row[2];
        $phNo = $row[7];
        $sem = $row[8];
        // $pwd = $row["pwd"];
        $add = $row[6];

    }
    echo '<h1>National Institute of Technology,Srinagar</h1>';
    echo '<br><hr>';
    echo '<h2> Update Details</h2>';
            echo '<form action="'.$thisScriptName.'?updated=1" method="post">';
            echo '		Enter Registration No: ';
            echo '		<input type="text" name="studentRegNo" value='.$regNo.' readonly="readonly" />';
            echo '		<br /><br />';
            echo '		Enter First Name: ';
            echo '		<input type="text" name="firstName" value="'.$firstName.'" />';
            echo '		<br /><br />';

            echo '		Enter Last Name: ';
            echo '		<input type="text" name="lastName"  value='.$lastName.' />';
            echo '		<br /><br />';

            echo '		Enter Parentage: ';
            echo '		<input type="text" name="parentage"  value='.$parent.' />';
            echo '		<br /><br />';

            echo '		Enter Roll no: ';
            echo '		<input type="text" name="studentRno"  value='.$rNo.' />';
            echo '		<br /><br />';

            echo '		Enter Semester: ';
            echo '		<input type="text" name="semester" value='.$sem.'  readonly="readonly" />';
            echo '		<br /><br />';

            echo '		Enter Address: ';
            echo '		<input type="text" name="studentAddress" value='.$add.' />';

            echo '		<br /><br />';

            echo '		Enter Phone No: ';
            echo '		<input type="text" name="phoneNo"  value='.$phNo.' />';

            echo '		<br /><br />';


            echo '<input type="submit" />';

            echo "</form>";
            }

        ?>