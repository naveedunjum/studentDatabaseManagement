<?php

$dbConnected = mysqli_connect("localhost","root","");
$selectQuery = "SELECT * FROM collegeDB.feeDetails WHERE Status = 0 ";
echo '<link rel="stylesheet" href="../includes/menu.css" type="text/css">';


echo '<div class=sidebar>';

    include_once("../includes/adminMenu.php");
echo '</div>';
echo '<div class=content>';
if($arr = mysqli_fetch_all(mysqli_query($dbConnected, $selectQuery))){
    $i=0;
    echo '<table border=1>
    <tr>
      <th>ID  </th>  <th>RegistrationNo  </th>   <th>Name  </th>  <th>Semester  </th>
      <th>Status  </th>
      </tr>';
      
    while($arr[$i]){
        echo '<tr>';

        $ii=0;
        while($arr[$i][$ii]!=NULL){
            echo '<td>'.$arr[$i][$ii].'</td>';
            $ii++;
        
        }
        $i++;
        echo "</tr>";}
        echo '</table>';}
echo '</div>';

?>