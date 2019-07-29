<?php
$dbConnected = mysqli_connect("localhost","root","");
include_once("../includes/calculate_due.php");

echo '<link rel="stylesheet" href="..\includes\bootstrap-4.3.1-dist\css\bootstrap.min.css">
  <script src="..\includes\jquery.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> -->
  <script src="..\includes\bootstrap-4.3.1-dist\js\bootstrap.min.js"></script>';
$thisScriptName = "libraryRecords.php";
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

// echo '<link rel="stylesheet" href="../includes/menu.css" type="text/css">';
// echo '<div class=sidebar>';
// include_once("../includes/adminMenu.php");
// echo '</div>';
echo '<div class=content>';

if($_COOKIE["accessLevel"]==1){
    $regNo = $_COOKIE["username"];
    display();
}

else{
if(@$_GET["updated"]==1){
    $regNo=$_POST["regNo"];

    display();
        


}
else{
    echo '<div class="container">
        <div class ="card h-center" style="width:450px; margin:0 auto;">
        <div class="card-body">
        <h2 style="text-align:center; color: teal">Library Records</h2>

        <form name ="reg" action="'.$thisScriptName.'?updated=1" method="post">
        <div class="form-group">
            <label for="book">Student Registration No:</label>
            <input type="text" class="form-control" id="book" placeholder="Enter Registration No " name="regNo">
            </div>
            <button type="submit" class="btn btn-info">Search Student</button>
        </form>
        </div>
        </div>

        </div>';

}
}
echo '</div>';









function display(){
    global $dbConnected,$regNo;
    

 $insertQuery="SELECT * FROM collegeDB.libraryRecords WHERE RegistrationNo='$regNo' ";
//  echo $insertQuery;
    $arr= mysqli_fetch_array(mysqli_query($dbConnected, $insertQuery));
    $i=0;
    
    echo '<table>';
    echo '<tr>';
    echo '<th>ID</th>
        <th>Registration No</th>
        <th>BookCount </th>  <th>Book1ID </th> <th>Book2ID </th> <th>Book3ID </th>  <th>Book1Due </th><th>Book2Due </th>
        <th>Book3Due </th>  <th>Fine </th></tr>';
    echo '<tr>';

    while($i<10){
    echo '<td>';
    echo $arr[$i];
    echo'</td>';
    $i++;
    }
    echo '</tr>';

    echo '</table>';
}

echo '</div>
</main>
</div>';



?>