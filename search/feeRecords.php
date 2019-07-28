<?php 
    $dbConnnected = mysqli_connect("localhost","root","");
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
  
  if(@$_GET["updated"]){
    
    $regNo = @$_POST["username"];
        
    
    if(!isset($regNo)){
        $regNo = $_COOKIE["regNo"];
    }
    // setcookie("regNo",$regNo,7200,"/");
    if(isset($regNo)){
    setcookie('regNo',$regNo,time()+60*60*24*365,"/");



    $searchQuery = "SELECT * FROM collegeDB.feeDetails WHERE RegistrationNo = '$regNo'";
    if($arr = @mysqli_fetch_array(mysqli_query($dbConnnected, $searchQuery))){
            //make this a function later
        $i =0;
        // while($arr[$i]!=NULL){
        //     echo $i;
        //     echo "-->";
        //     echo $arr[$i];
        //     echo "<br>";
        //     $i++;
        //     }
            echo '<table border=1>';
            echo '<tr>';
            echo '<th>ID</th> <th>RegistrationNo</th> <th>Name</th> <th>Semester</th><th>Status</th>  ';
            echo '</tr>';
            echo '<tr>';

            while(@$arr[$i]!=NULL){
                // echo $i;
                // echo "->";
                echo '<td>'.$arr[$i].'</td>';
                $i++;
            }
            echo '</tr>';

            echo '</table>';
        }
        echo '<br>';
        echo '<a href="feeUpdate.php" class="btn btn-info" role="button" style="text-align:center">Update</a>';

        // echo '</div>';

        //     echo '<div class=content style=left-margin:200px';
        // echo '<form action = feeUpdate.php method =post>';
        //     echo '<input type=hidden name = "regNo" value ='.$regNo.'>';
        //     echo '<input type = submit value ="Fee Update">';
        // echo '</form>';
       
        }

            
    }

    
    else{
        
        echo '<div class="container">
        <div class ="card h-center" style="width:450px; margin:0 auto;">
        <div class="card-body">
        <h2 style="text-align:center; color: teal">Fee Records</h2>

        <form name="fee" action="feeRecords.php?updated=1" method =post>
        <div class="form-group">
            <label for="book">Student Registration No:</label>
            <input type="text" class="form-control" id="book" placeholder="Enter Registration No " name="username">
            </div>
            <button type="submit" class="btn btn-info">Search Book</button>
        </form>
        </div>
        </div>

        </div>';
     }

     echo '</div>
     </main>
     </div>
     </body>';
     
















?>