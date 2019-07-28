<?php
$dbConnected = mysqli_connect("localhost","root","");
echo '<link rel="stylesheet" href="..\includes\bootstrap-4.3.1-dist\css\bootstrap.min.css">
  <script src="..\includes\jquery.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> -->
  <script src="..\includes\bootstrap-4.3.1-dist\js\bootstrap.min.js"></script>';
$thisScriptName = "issueBook.php";
echo '<link rel="stylesheet" href="../includes/styling.css" type="text/css">';
echo '<body>
<header>';
include_once("../includes/head.php");



echo'
</header>';
echo '
<div class="flex-container">
  <aside>';
    include_once("../includes/adminMenu.php");
    echo '
  </aside
  <main>';
//     <div class="content">some main content</div>
   
//   </main>
// </div>';
// echo '<div class="sidebar">';
// include_once("../includes/adminMenu.php");
// echo '</div>';

echo '<div class=content>';
{
    if(@$_GET["updated"]){
        $bookName = $_POST["book"];
        if(isset($bookName)){
            $searchQuery = "SELECT * FROM collegeDB.books WHERE BookName = '$bookName'";
            if($arr = mysqli_fetch_array(mysqli_query($dbConnected, $searchQuery))){
                if($arr[3]==1){
                    $bookID = $arr[0]; 
                    setcookie('bookID',$bookID,time()+60*60*24*365,"/");
                    echo '<div class="container">
                    <div class ="card h-center" style="width:450px; margin:0 auto;">
                    <div class="card-body">
                    <h2 style="text-align:center; color: teal">Issue to</h2>

                    <form action= "issueTo.php" method="post">
                        <div class="form-group">
                        <label for="student">Student Name:</label>
                        <input type="text" class="form-control" id="student" placeholder="Enter Student Name" name="student">
                        </div>
                        <button type="submit" class="btn btn-info">Issue</button>
                    </form>
                    </div>
                    </div>

                    </div>';
                    // echo '<form action= "issueTo.php" method="post">';
                    //     echo '<input type = text name =  "student">';
                    //     echo '<input type = submit value =Search Student>'; 
                    // echo '</form>';
                }
                else{ echo '<div class="container">
                    <div class ="card h-center" style="width:450px; margin:0 auto;">
                    <div class="card-body">
                    <h2 style="text-align:center; color: teal">Sorry, Book issued already</h2>';
            
                            echo '</div></div></div>';

                }

            }
            else{echo '<div class="container">
                <div class ="card h-center" style="width:450px; margin:0 auto;">
                <div class="card-body">
                <h2 style="text-align:center; color: teal">Book Not Found</h2>';
        
                        echo '</div></div></div>';
            }
        }
        else{
            header("Location: issueBook.php");
        }

    }



    else{
        // echo "Book Name: ";

        // echo '<form action= "'.$thisScriptName.'?updated=1" method="post">';
        //     echo '<input type = text name =  "book">';
        //     echo '<input type = submit value =Search Book>';
        // echo '</form>';
        echo '<div class="container">
                    <div class ="card h-center" style="width:450px; margin:0 auto;">
                    <div class="card-body">
                    <h2 style="text-align:center; color: teal">Book Name</h2>

                    <form action= "'.$thisScriptName.'?updated=1" method="post">
                    <div class="form-group">
                        <label for="book">Book Name:</label>
                        <input type="text" class="form-control" id="book" placeholder="Enter Book Name" name="book">
                        </div>
                        <button type="submit" class="btn btn-info">Search Book</button>
                    </form>
                    </div>
                    </div>

                    </div>';

    }


}

echo '</div>
</main>
</div>
</body>';






?>
