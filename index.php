<?php

	
/*	File:			index.php

*
*	This script is the HOMEPAGE
*
*
*============================================================
*/


	{ 		//	Secure Connection Script
			// include('includes/dbConfig.php'); 
			$dbSuccess = false;
            // $dbConnected = mysqli_connect($db['hostname'],$db['username'],$db['password']);
            $dbConnected  = mysqli_connect("localhost", "root","");
			
			if ($dbConnected) {		
				$dbSelected = mysqli_select_db($dbConnected, "collegeDB");
				if ($dbSelected) {
					$dbSuccess = true;
				} 	
			}
			//	END	Secure Connection Script
    }


if($dbSuccess){
	$loginAuthorised = @($_COOKIE["loginAuthorised"]=="loginAuthorised");
	if($loginAuthorised){
			
		$accessLevel = $_COOKIE["accessLevel"];
		$userID = $_COOKIE["userID"];

		$status = @$_GET["status"];
		if (isset($status) AND ($status == "logout")) {
			setcookie("loginAuthorised","", time()-7200,"/");	
			// echo "logout"; 
			header("Location: index.php");
		}
		else{
			if($accessLevel == 1){
				$menuFile = "includes/stdMenu.php";
				$contentFile = "includes/stdContent.php";
			}
			else{
				$menuFile = "includes/adminMenu.php";
				$contentFile = "includes/adminContent.php";
			}
		}



	}else{
		header("Location: forms/loginForm.php");

	}




}
?>

<html>
<head> <title> Hello</title></head>
<body>
<?php
echo '<link rel="stylesheet" href="includes/menu.css" type="text/css">';
echo '<div class=sidebar>';

	include_once($menuFile);
echo '</div>';
echo '<div class=content>';
	include_once($contentFile);
	echo '</div>';

	?>

</body>
</html>