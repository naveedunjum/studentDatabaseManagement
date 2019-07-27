<?php
{ 		//	Secure Connection Script
    include('../includes/dbConfig.php'); 
    $dbSuccess = false;
    $dbConnected = mysqli_connect($db['hostname'],$db['username'],$db['password']);
    $dbName = $db["database"];
    if ($dbConnected) {		
        $dbSelected = mysqli_select_db($dbConnected, $db['database']);
        if ($dbSelected) {
            $dbSuccess = true;
        } 	
    }
    //	END	Secure Connection Script
}
echo '<link rel="stylesheet" href="../includes/menu.css" type="text/css">';
echo '<div class=sidebar>';
include_once("../includes/adminMenu.php");
echo '</div>';

echo '<div class=content>';
$sem = @$_POST["semester"];
if(isset($sem)){
    if($arr = mysqli_fetch_all(mysqli_query($dbConnected, "SELECT * FROM collegeDB.studentRecords WHERE Semester=$sem"))){
        $i=0;
    //     while($arr[$i]){
    //         $ii=0;
    //         while($arr[$i][$ii]){
    //             echo $ii."->".$arr[$i][$ii];
    //             $ii++;
    //             echo '<br>';
    //         }
    //         $i++;
    //         echo "<hr>";
    // }
    echo '<table border=1>
    <tr>
      <th>ID  </th>  <th>RegistrationNo  </th>   <th>RollNo  </th>   <th>Name  </th>   <th>Parentage  </th>
         <th>Address  </th>   <th>PhoneNo  </th> <th>Semester  </th>      </tr>';
      
    while(@$arr[$i]){
        echo '<tr>';

        $ii=0;
        while(@$arr[$i][$ii]){
            echo '<td>'.$arr[$i][$ii].'</td>';
            $ii++;
        
        }
        $i++;
        echo "</tr>";
}}
echo '</div>';
















}


else{
     
    echo '<link rel="stylesheet" href="..\includes\bootstrap-4.3.1-dist\css\bootstrap.min.css">
    <script src="..\includes\jquery.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> -->
    <script src="..\includes\bootstrap-4.3.1-dist\js\bootstrap.min.js"></script>';
    
                echo '
                    <div class="container">
                    <div class ="card h-center" style="width:450px; margin:0 auto;">
                        <div class="card-body">';
                        echo '<h2 style="text-align:center; color: teal">Student List</h2>';
                        echo '<form action="studentList.php" method=post>

                        <div class="form-group">
                            <label for="sel1">Semester:</label>
                            <select class="form-control" id="sel1" name="semester">
                            <option value="1">Semester 1</option>
                            <option value="2">Semester 2</option>
                            <option value="3">Semester 3</option>
                            <option value="4">Semester 4</option>
                            <option value="5">Semester 5</option>
                            <option value="6">Semester 6</option>
                            <option value="7">Semester 7</option>
                            <option value="8">Semester 8</option>
                            </select>
                        </div> 
                        <button type="submit" class="btn btn-info">Search</button>
                        </form>
                        </div>
                        </div>
                        </div>';

    
    
}
?>