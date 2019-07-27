<?php
$accessLevel =$_COOKIE["accessLevel"];
// echo '<link rel="stylesheet" href="/studentDMS/includes/menu.css" type="text/css"';


// echo '<div class=sidebar>';
if($accessLevel==99){


    echo '<a href="/studentDMS/search/marksRecords.php"> Marks Records</a> 
    <a href = "/studentDMS/search/feeRecords.php"> Fee Records</a> ';
    echo '<a href="/studentDMS/search/employeeList.php"> Employee List</a>';
    echo '<a href="/studentDMS/search/studentList.php">Student List</a>';
    echo '<a href="/studentDMS/search/libraryRecords.php"> Library Records</a>';



}
else if($accessLevel==31){
    echo '<a href="/studentDMS/search/marksRecords.php"> Marks Records</a> 
    <a href = "/studentDMS/search/feeRecords.php"> Fee Records</a> ';

}
else if($accessLevel == 21){
    // include_once("includes/calculate_due.php");


    
    echo '<a href="/studentDMS/search/issueBook.php"> Issue Book</a>';
   
    echo '<a href="/studentDMS/search/returnBook.php"> Return Book</a>';
    echo '<a href="/studentDMS/search/libraryRecords.php"> Library Records</a>';


    
    echo '<a href="/studentDMS/search/fineStudents.php"> Students with Fine</a>';
        

}
else if($accessLevel==11){
    echo '<a href = "/studentDMS/search/feeRecords.php"> Fee Records</a> ';
    echo '<a href = "/studentDMS/search/notPaid.php"> Students Not Paid</a> ';

  






}
else if($accessLevel==1){
    echo '
    <a href="/studentDMS/forms/stdUpdate.php">Update Information</a>  
    
     <a href="/studentDMS/search/libraryRecords.php">Library Records</a>  
     
       
     <a href="/studentDMS/search/marksRecords.php">Marks Records</a>  ';

    // <a href="/studentDMS/search/feeRecords.php">Fee Records</a>  ';


}




echo '<a href="/studentDMS/index.php?status=logout">Logout</a>';
// echo '</div';

?>