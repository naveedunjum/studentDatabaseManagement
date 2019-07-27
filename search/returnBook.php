<?php
    $dbConnected = mysqli_connect("localhost", "root","");
    if(@$_GET["fine"]==1){
        $regNo = $_POST['regNo'];
        // echo $regNo;
        $query ="UPDATE collegeDB.libraryRecords SET Fine=0 WHERE RegistrationNo = '$regNo'";
        // echo $query;
        mysqli_query($dbConnected, $query);
    }
    echo '<link rel="stylesheet" href="..\includes\bootstrap-4.3.1-dist\css\bootstrap.min.css">
  <script src="..\includes\jquery.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> -->
  <script src="..\includes\bootstrap-4.3.1-dist\js\bootstrap.min.js"></script>';
  echo '<link rel="stylesheet" href="../includes/menu.css" type="text/css">';
echo '<div class=sidebar>';
  include_once("../includes/adminMenu.php");
  echo '</div>';
  echo '<div class=content>';


    $bookID = @$_POST["bookID"];
    if(isset($bookID)){
        $selectBook = "SELECT * FROM collegeDB.books WHERE BookID =$bookID";
        // echo $selectBook;
        if($row = @mysqli_fetch_array(mysqli_query($dbConnected, $selectBook))){
            $issuedTo = $row[4];
            $available = $row[3];
        
        }
        else{
            echo '<div class="container">
                <div class ="card h-center" style="width:450px; margin:0 auto;">
                <div class="card-body">
                <h2 style="text-align:center; color: teal">Book Not Found</h2>';
        
        echo '</div></div></div>';
            exit()  ;
        }

        if($available ==0){
            $searchStudent = "SELECT * FROM collegeDB.libraryRecords WHERE RegistrationNo = '$issuedTo'";
            if($row = mysqli_fetch_array(mysqli_query($dbConnected, $searchStudent))){
                $i=3;
                while($row[$i]!=$bookID AND $i<6){
                    $i++;
                }
            }
            $i=$i-2;
            $q ="Book".$i."ID";
            $fine = $row[9];
            $r ="Book".$i."Due";
            if($fine==0){
                $updateBooks = "UPDATE collegeDB.books SET Available = 1, IssuedTo = '' WHERE BookID = $bookID";
                $updateQuery = "UPDATE collegeDB.libraryRecords SET $q = 0 , $r = NULL , BookCount = BookCount -1 WHERE RegistrationNo ='$issuedTo'";
                // echo $updateBooks;
                // echo $updateQuery;
                if(mysqli_query($dbConnected, $updateBooks) AND mysqli_query($dbConnected , $updateQuery)){
                    echo '<div class="container">
                <div class ="card h-center" style="width:450px; margin:0 auto;">
                <div class="card-body">
                <h2 style="text-align:center; color: teal">Book returned</h2>';
        
                echo '</div></div></div>';
                    }
            }else{
                // echo "Pay Fine of Rupees ".$fine."first";
                // echo '<br>';
                // echo '<form name= hh action="returnBook.php?fine=1" method = "post">';
                //     echo '<input type ="hidden" name="bookID" value= '.$bookID.'>';
                //     echo '<input type ="hidden" name="regNo" value= "'.$issuedTo.'">';

                //     echo '<input type=submit value="Pay Fine">';
                // echo '</form>';
                echo '<div class="container">
                <div class ="card h-center" style="width:450px; margin:0 auto;">
                <div class="card-body">';
                echo "Pay Fine of Rupees ".$fine." first";

                echo '<form name= hh action="returnBook.php?fine=1" method = "post">';
                echo '<input type ="hidden" name="bookID" value= '.$bookID.'>';
                echo '<input type ="hidden" name="regNo" value= "'.$issuedTo.'">;
                <button type="submit" class="btn btn-info">Pay Fine</button>
                </div>
                </div>
                </div>';


                
            }

        }
        else{
            echo '<div class="container">
                <div class ="card h-center" style="width:450px; margin:0 auto;">
                <div class="card-body">
                <h2 style="text-align:center; color: teal">Book Already returned</h2>';
        
                echo '</div></div></div>';
        }

    }
    else{

    //     echo "Return Book";
    // echo '<form action = "returnBook.php" method= post>';
    //     echo '<input type = text  name = bookID>
    //     <input type = submit value = Search>';
    // echo '</form>';
    echo '<div class="container">
    <div class ="card h-center" style="width:450px; margin:0 auto;">
    <div class="card-body">
    <h2 style="text-align:center; color: teal">Book ID</h2>

    <form action = "returnBook.php" method= post>
    <div class="form-group">
        <label for="book">Book Id:</label>
        <input type="text" class="form-control" id="book" placeholder="Enter Book ID" name="bookID">
        </div>
        <button type="submit" class="btn btn-info">Search Book</button>
    </form>
    </div>
    </div>

    </div>';
    }






    echo '</div>';






?>