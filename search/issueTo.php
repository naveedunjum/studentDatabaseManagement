<?php
$dbConnected = mysqli_connect("localhost","root","");
echo '<link rel="stylesheet" href="..\includes\bootstrap-4.3.1-dist\css\bootstrap.min.css">
  <script src="..\includes\jquery.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> -->
  <script src="..\includes\bootstrap-4.3.1-dist\js\bootstrap.min.js"></script>';
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
echo '<div class=content>';
    $bookID = $_COOKIE["bookID"];
    $student = $_POST["student"];
    $getQuery = "SELECT * FROM collegeDB.libraryRecords WHERE RegistrationNo ='$student'";
    if($row = mysqli_fetch_array(mysqli_query($dbConnected, $getQuery))){
    if($row[2]<3){
        $i = 3; 
        while($row[$i]!=0 AND $i <6){
            $i++;
        }
        $i=$i-2;
        $q ="Book";
        $q  .="".$i."ID";
        // echo "***<br>".$q;
        $r ="Book";
        $r  .="".$i."Due";
        // echo "<br>**".$r;
        $date = date('Y-m-d');
        $due =  date('Y-m-d', strtotime($date. ' + 15 days'));
    
    
        $bookQuery = "UPDATE collegeDB.books SET Available= 0 , IssuedTo ='$student' WHERE BookID = $bookID";
        $studentBookQuery = "UPDATE collegeDB.libraryRecords SET BookCount =BookCount+1, $q = $bookID, $r= CAST('". $due ."' AS DATE) WHERE RegistrationNo ='$student' ";
        // echo $bookQuery;
        // echo $studentBookQuery;
        if(mysqli_query($dbConnected, $bookQuery)){
            if(mysqli_query($dbConnected, $studentBookQuery)){
                echo '<div class="container">
                <div class ="card h-center" style="width:450px; margin:0 auto;">
                <div class="card-body">
                <h2 style="text-align:center; color: teal">Book Issued</h2>';
        
        echo '</div></div></div>';}
        }
        else{
            echo '<div class="container">
                <div class ="card h-center" style="width:450px; margin:0 auto;">
                <div class="card-body">
                <h2 style="text-align:center; color: teal">Failed to Issue</h2>';
        
        echo '</div></div></div>';
        }


    }
    else{
        echo '<div class="container">
                <div class ="card h-center" style="width:450px; margin:0 auto;">
                <div class="card-body">
                <h2 style="text-align:center; color: teal">3 books already issued</h2>';
        
        echo '</div></div></div>';
    }
  }
  else{
    echo '<div class="container">
            <div class ="card h-center" style="width:450px; margin:0 auto;">
            <div class="card-body">
            <h2 style="text-align:center; color: teal">Student Not Found</h2>';
    
    echo '</div></div></div>';
}

    echo '</div>
    </main>
    </div>
    </body>';
    







?>