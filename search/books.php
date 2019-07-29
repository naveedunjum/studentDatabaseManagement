<?php

$dbConnected = mysqli_connect("localhost","root","","collegeDB");
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
$getBooks = "SELECT * FROM collegeDB.books";
echo '<h2 align=center> Book List</h2>';
if($row = mysqli_fetch_all(mysqli_query($dbConnected,$getBooks))){

echo '<table>
<tr><th>BookID</td>
    <th>Book Name</td>
    <th>Author</td>
    <th> Available</th>
    <th> Issue</th>

    </tr>';
    $i=0;
    while(@$row[$i]){
        echo '<tr>';
        $ii=0;
        while($ii<4){
                echo '<td>'.$row[$i][$ii].'</td>';
                $ii++;
            
            }
        echo '<td><form action="issueBook.php?updated=1" method=post>
        <input type=hidden name ="book" value="'.$row[$i][1].'">
        <input type=submit value="Issue"></form></td>';
        echo '</tr>';
        $i++;
        }
        echo '</table><br>';

        echo '<a href="../forms/addBook.php" align=center class="btn btn-info" role="button" style="text-align:center">Add Book</a>';
        
    }
else{
    echo "books not found";
}

echo '</div>
</main>
</div>
</body>';



?>