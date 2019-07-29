<?php
$dbConnected = mysqli_connect("localhost","root","");

if(@$_GET["updated"]==1){
    $insertBook = 'INSERT INTO  collegeDB.books  ( BookID ,  BookName ,  Author  ) VALUES ('.$_POST["bookID"].', "'.$_POST["bookName"].'", "'.$_POST["author"].'")';
    echo $insertBook;
    if(mysqli_query($dbConnected,$insertBook)){
        header("Location:../search/books.php");  }
    else{
        echo "failed to insert Book";
    }
    exit();





}




else{
echo '
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="..\includes\bootstrap-4.3.1-dist\css\bootstrap.min.css">
  <script src="..\includes\jquery.js"></script>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script> -->
  <script src="..\includes\bootstrap-4.3.1-dist\js\bootstrap.min.js"></script>

//   <style> 
//   /* #username,#pwd{
//       width:50%;  
//   } */
  
// .container{
//   margin-top:200px;
//   align-content: center;
// }
// .card-body{
//   background-color : rgb(26, 68, 99);
// }

  
  
  </style>';
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
  </aside>
  <main>
  <div class=content>';


echo '
<div class="container">
  <div class ="card h-center" style="width:450px; margin:0 auto;">
        <div class="card-body">
        <h2 style="text-align:center; color: teal">Book Form</h2>

		<form action="addBook.php?updated=1" method=post>
			<div class="form-group">
			<label for="bookID">BookID:</label>
			<input type="text" class="form-control" id="bookID" placeholder="Enter BookID" name="bookID">
			</div>
			<div class="form-group">
			<label for="bookname">Book Name:</label>
			<input type="text" class="form-control" id="bookname" placeholder="Enter Book Name" name="bookName">
			</div>
            <div class="form-group">
			<label for="bookID">Author:</label>
			<input type="text" class="form-control" id="author" placeholder="Enter author" name="author">
			</div>
			
			<button type="submit" class="btn btn-info">Add Book</button>
		</form>
		<br>
		</div>
	</div>
</div>';


echo '</div>
</main>
</div>
</body>';}
?>
