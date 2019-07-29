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
if(@$_GET["updated"]==1){
    $emptype =$_POST["empType"];
    $name=$_POST["name"];
    $parent=$_POST["parentage"];
    $address=$_POST["address"];
    $pno=$_POST["PNo"];
    $spe=$_POST["speciality"];
    $insertQuery = "INSERT INTO collegeDB.employeeRecords (empType, Name, Parentage, Address, PhoneNo,Speciality )";
    $insertQuery .= 'VALUES ("'.$emptype.'", "'.$name.'","'.$parent.'","'.$address.'",'.$pno.',
    "'.$spe.'")';
    // echo $insertQuery;
    if(mysqli_query($dbConnected,$insertQuery)){
        header("Location: ../search/employeeList.php") ;
      }
    else{
        echo '<div class="container">
  <div class ="card h-center" style="width:450px; margin:0 auto;">
      <div class="card-body">
          <h3 style="text-align:center; color: teal">Failed to add</h3>
          </div></div></div>';
        exit();
    }



}

  
  echo '
  
  <style> 
  /* #username,#pwd{
      width:50%;  
  } */
  label{
    color:teal;
  }
  
  body{
    background-color: rgb(220,220,220);
  }
.container{
  /* margin-top:100px; */
  height: 90%;
  align-content: center;
  font-size:14px;
  float:right;
}
.card-body{
  /* background-color : rgb(26, 68, 99); */
}
input{
  height:100px;
  }
  img{
	  border-radius:20px;
  }
  .logo{
	  float:left;
	  margin-top :100px;
	  /* width:100px; */
	  height:100%;
	  
  }


  
  
  </style>
</head>
<body>

<div class="container">
  <div class ="card h-center" style="width:450px; margin:0 auto;">
      <div class="card-body">
          <h3 style="text-align:center; color: teal">Add Employee</h3>

  <form action="addEmp.php?updated=1" method=post>
    <!-- usertype dropdown -->
    <div class="form-group">
        <label for="emptype">Employee Type Type:</label>
        <select class="form-control" id="emptype" name="empType">
        <option value="admin" id="admin">Admin</option>
        <option value="teacher" id="admin">Teacher</option>

        <option value="librarian" id="lib">Librarian</option>
        <option value="accounts" id="acc">Accounts</option>
        <option value="academics" id="aca">Academics</option>
        </select>
      </div> 
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
    </div>
    
      <div class="form-group">
        <label for="parentage">Parentage:</label>
        <input type="text" class="form-control" id="parentage" placeholder="Enter Parentage" name="parentage">
      </div>
      <div class="form-group">
        <label for="address">Address:</label>
        <input type="address" class="form-control" id="address" placeholder="Enter Address" name="address">
      </div>
      
      <div class="form-group">
            <label for="Pno">Phone No:</label>
            <input type="text" class="form-control" id="Pno" placeholder="Enter Phone No" name="PNo">
      </div>
      <div class="form-group">
            <label for="Pno">Speciality:</label>
            <input type="text" class="form-control" id="Pno" placeholder="In case of teachers" name="speciality">
      </div>
    
    
    <button type="submit" class="btn btn-info">Add Employee</button>
  </form>

</div>
</div>
</div>

</div>
</main>
</div>';
