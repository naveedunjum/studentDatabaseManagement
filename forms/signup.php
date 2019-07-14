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
    //	END	Secure Connection Script
}
$thisScriptName = "signup.php";
{

    $username = $_POST["username"];
    if(isset($username)){
        $md5password = md5($_POST["password"]);
        if($_POST["userType"]=="admin"){
            $accessLevel =99;
        }
        elseif($_POST["userType"]=="librarian"){
            $accessLevel =21;
        }
        else{
            $accessLevel = 1;
        }
        $insertQuery = "INSERT INTO ".$dbName.".tUser (";
        $insertQuery .= "username, accessLevel, password)";
        $insertQuery .= " VALUES (".$username.", ".$accessLevel.",";
        $insertQuery .= ".$md5password.";
        $insertQuery .= ")";
        echo $insertQuery;






    }











else{
    
echo '<form name ="signUp" action="'.$thisScriptName.'" method="post">';
echo '      Enter UserType:';
echo '      <select name="userType">
                <option value="admin">Admin</option>
                <option value="student">Student</option>
                <option value="librarian">Librarian</option>
            </select>
                ';
echo '		Enter Name:            ';
echo '		<input type="text" name="studentName" />';
echo '		<br /><br />';

echo '		Enter Parentage:       ';
echo '		<input type="text" name="parentage" />';
echo '		<br /><br />';

echo '		Enter User name: ';
echo '		<input type="text" name="username" />';
echo '		<br /><br />';

echo '		Enter Roll no:         ';
echo '		<input type="text" name="studentRno" />';
echo '		<br /><br />';

echo '		Enter Year:            ';
echo '		<input type="text" name="studentYear" />';
echo '		<br /><br />';

echo '		Enter Address:         ';
echo '		<input type="text" name="studentAddress" />';

echo '		<br /><br />';

echo '		Enter Password:        ';
echo '		<input type="password" name="password" />';




echo '		<br /><br />';


echo '<input type="submit" />';

echo "</form>";


}



}






?>
