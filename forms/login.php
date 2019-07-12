<?php
{ 		//	Secure Connection Script
    include('../includes/dbConfig.php'); 
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
$thisScriptName = "login.php";
$username = $_POST["username"];
if(isset($usertype)){
    if(isset($username)){
        $password = $_POST["password"];
        $md5password = md5($password);

        {
            $tUser_query = "SELECT password, accessLevel, userID FROM tUser ";
            $tUser_query .="WHERE username = '".$username."' ";

            $tUser_select = mysqli_query($dbConnected, $tUser_query);
            while($row = mysqli_fetch_array($tUser_select)){
                $passwordRetrieved = $row[0];
                $accessLevel = $row[1];
                $userID = $row[2];
            }

            if(!empty($passwordRetrieved) AND ($md5password == $passwordRetrieved)){

                setcookie("accessLevel", $accessLevel, time()+7200,"/");
                setcookie("userID",$userID, time()+7200,"/");

                setcookie("loginAuthorised","loginAuthorised", time()+7200,"/");
                header("Location : ../index,php");
            }
        }
    }
}
else{


    echo '<h2>Login Form alphaCRM</h2>';

    echo '<form name="postLoginHid" action="'.$thisScriptName.'" method="post">';	
            echo '
            <p>UserType:
            <select name="userType">
                <option value="admin">Admin</option>
                <option value= "student">Student</option>
            <select><p>
                <P>User name: 
                <INPUT TYPE=text NAME=username value="" SIZE=12 MAXLENGTH=16></P>
                <P>Password: 
                <INPUT TYPE=password NAME=password value="" SIZE=12 MAXLENGTH=16></P>
                <input type="submit"  value="Login" />
            ';
    echo '</form>';
    echo '<h2>--------- END Login Form --------</h2>';
    }

?>