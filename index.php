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
				$contentFile = "includes/stdMenu.php";
			}
			else{
				$contentFile = "includes/adminMenu.php";
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

	include_once($contentFile);
	?>

</body>
</html>