<?php
$dbConnected = mysqli_connect("localhost","root","");
$accessLevel = $_COOKIE["accessLevel"];
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

if($accessLevel==1){
    $regNo = $_COOKIE["username"];
    $selectQuery = "SELECT * FROM collegeDB.marks WHERE RegistrationNo ='$regNo'";
    // echo $selectQuery;
    if($row =mysqli_fetch_array(mysqli_query($dbConnected, $selectQuery))){
        $i = 0;
        echo '<table border=1>';
        echo '<tr>';
        echo '<th>ID</th> <th>RegistrationNo</th> <th>Semester1</th> <th>Semester2</th> <th>Semester3</th> <th>Semester4</th><th>Semester5</th>
         <th>Semester6</th> <th>Semester7</th><th>Semester8</th> <th>SGPA</th>';
        echo '</tr>';
        echo '<tr>';
        while($row[$i]){
            // echo $i;
            // echo "->";
            echo '<td>'.$row[$i].'</td>';
            $i++;
        }
        echo '</tr>';

        echo '</table>';
    
    }


}
if($accessLevel>=31){
    $thisScriptName = "marksRecords.php";

    if(@$_GET["updated"]==1){
        $regNo = @$_COOKIE["regNo"];
    }
    else{
        $regNo = @$_POST["regNo"];
    }

    setcookie('regNo',$regNo,time()+60*60*24*365,"/");
    

    if(isset($regNo)){
        $selectQuery = "SELECT * FROM collegeDB.marks WHERE RegistrationNo ='$regNo'";
        // echo $selectQuery;
        if($row =mysqli_fetch_array(mysqli_query($dbConnected, $selectQuery))){
            $i = 0;
            echo '<table border=1>';
            echo '<tr>';
            echo '<th>ID</th> <th>RegistrationNo</th> <th>Semester1</th> <th>Semester2</th> <th>Semester3</th> <th>Semester4</th><th>Semester5</th>
             <th>Semester6</th> <th>Semester7</th><th>Semester8</th> <th>SGPA</th>';
            echo '</tr>';
            echo '<tr>';

            while($row[$i]){
                // echo $i;
                // echo "->";
                echo '<td>'.$row[$i].'</td>';
                $i++;
            }
            echo '</tr>';

            echo '</table>';
            echo '<br>';
            echo '<a href="marksUpdate.php" class="btn btn-info" role="button" style="text-align:center"> Marks Update</a>';

        }
        // echo "<form name=marks action = 'marksUpdate.php' method = post>";
        // echo   '<input type = hidden name=regNo value="'.$regNo.'">';
        // echo '<input type=submit value="Update Marks">';
        // echo '</form>';
        // echo '<a href="marksUpdate.php"> Marks Update</a>';




    }
    else{
       
        echo '<div class="container">
        <div class ="card h-center" style="width:450px; margin:0 auto;">
        <div class="card-body">
        <h2 style="text-align:center; color: teal">Marks Records</h2>

        <form name ="reg" action="'.$thisScriptName.'" method="post">
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
echo '</div>
</main>
</div>
</body>';







?>