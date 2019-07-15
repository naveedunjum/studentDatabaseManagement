<?php
$accessLevel =$_COOKIE["accessLevel"];

echo '<a href ="libraryRecords"> Library Records<br></a>';
if($accessLevel>21){


    echo '<a href="marksRecords"> Marks Records</a><br>
    <a href ="studentRecords"> Student Records<br></a><br>
    <a href = "feeRecords"> Fee Records</a><br>
    <a href ="marksRecords"> Marks Records</a>';


}
if($accessLevel ==21){
    echo 'Issue Book';
    echo '<form action = "search/issueBook.php" method= post>';
        echo '<input type = text  name = book>
        <input type = submit value = Search>';
    








}
echo '<br>';


echo '<a href="index.php?status=logout">Logout</a>';

?>