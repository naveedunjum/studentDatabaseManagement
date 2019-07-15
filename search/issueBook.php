<?php


    $dbConnected = mysqli_connect("localhost", "root","" );
    $dbSelect = mysqli_select_db($dbConnected, "collegeDB");
    $student = $_POST["student"];

    if(isset($student)){        
            $getRecords = "SELECT BookCount FROM collegeDB.libraryRecords WHERE RegistrationNo = '$student'";
            if($row = mysqli_fetch_array(mysqli_query($dbConnected, $getRecords))){
                $count = $row[0];
            }
            else{
                die("Statement not executed");
            }
            if($count>3){
                echo "3 books already issued";
                echo '<a href="../index.php"> Homepage</a>';
            }
            else{
                $updateQuery = "UPDATE collegeDB.books SET Available =0, IssuedTo = '$student'";
                $updateLibrary = "UPDATE collegeDB.libraryRecords SET BookCount = BookCount +1";
                if(mysqli_query($dbConnected,$updateQuery) AND mysqli_query($dbConnected,$updateLibrary)) {
                    echo "Book issued";
                }
                else{
                    die("Failed to issue");
                }
                


            
            
            }
            }
    $thisScriptName = "issueBook.php";
    $bookName = $_POST["book"];
    $searchQuery = "SELECT * FROM collegeDB.books WHERE BookName ='$bookName'";
    echo $searchQuery;
    if($row = mysqli_query($dbConnected , $searchQuery)){
        $arr = mysqli_fetch_array($row);
            $id= $arr[0];
            $bookName = $arr[1];
            $available = $arr[2];
            if($available){
                


                // }
                // else{
                    echo '<form action ='.$thisScriptName.' method = post>';
                    echo 'Issue to:';
                    echo '<input type = text name = student>';
                    echo '<input type= submit value ="Issue">';
                    echo '</form>';
                // }







            }
            else{
                echo 'Sorry, Book not available';
            }
            
        }
    











?>