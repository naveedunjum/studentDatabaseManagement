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
$empType = @$_POST["empType"];
// echo $empType;
if(isset($empType)){

    if($arr = mysqli_fetch_all(mysqli_query($dbConnected, "SELECT * FROM collegeDB.employeeRecords WHERE empType='$empType'"))){
        $i=0;
        echo '<h2 align =center>'.$empType.' list</h2>';
        echo '<table border=1>
        <tr>
          <th>ID  </th>  <th>empType  </th>   <th>Name  </th><th>Parentage  </th><th>Address  </th> <th>Phone No  </th> <th>Speciality  </th>
          </tr>';
          
        while(@$arr[$i]){
            echo '<tr>'; 

            $ii=0;
            while($ii<7){
                echo '<td>'.$arr[$i][$ii].'</td>';
                $ii++;
            
            }
            $i++;
            echo "</tr>";

    }
echo '</table>';}
else{
    echo '
    <div class="container">
    <div class ="card h-center" style="width:450px; margin:0 auto;">
        <div class="card-body">';
        echo '<h2 style="text-align:center; color: teal">No such employees found</h2>
    </div>
<div>
</div>';}
    

}






else{
    
   
    
                echo '
                    <div class="container">
                    <div class ="card h-center" style="width:450px; margin:0 auto;">
                        <div class="card-body">
                        <h2 style="text-align:center; color: teal">Employee List</h2>';

                        echo '<form action="employeeList.php" method=post>

                        <div class="form-group">
                            <label for="sel1">Employee Type:</label>
                            <select class="form-control" id="sel1" name="empType">
                            <option value="admin" id="admin">Admin</option>

                            <option value="teacher">Teacher List</a>
                            <option value="librarian">Librarians List</a>
                            <option value="accounts"> Accounts List</a>
                            <option value="academics">Academics</option>
                            
                            </select>
                        </div> 
                        <button type="submit" class="btn btn-info">Search</button>
                        </form>
                        <a href="../forms/addEmp.php" class="btn btn-info" role="button" style="text-align:center">Add Employee</a>

                        </div>
                        </div>
                        </div>';

    
}
}
echo '</div>
</main>
</div></body>';








?>