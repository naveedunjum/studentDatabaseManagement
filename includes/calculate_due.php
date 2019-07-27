<?php
    $conn = mysqli_connect("localhost","root","");

    // $date = "2019-07-01";
    // $dateInsert = "INSERT INTO collegeDB.libraryRecords (Book1Due) VALUES (CAST('". $date ."' AS DATE))";
    // mysqli_query($conn, $dateInsert);
    $ii =1;
    $query = "SELECT COUNT(*) FROM collegeDB.libraryRecords"; 
    if($row= mysqli_fetch_array(mysqli_query($conn, $query))){

    
    // echo $row[0];
}
    while($ii<=$row[0]){

        $select= "SELECT Fine, Book1Due,Book2Due,Book3Due FROM collegeDB.libraryRecords WHERE ID=$ii";
        $arr = mysqli_fetch_array(mysqli_query($conn, $select));
        $i=1;
        $totalFine = 0;
        // echo "<br>tf->".$totalFine;
        while($i<4){
                $fine=0;
                $due = $arr[$i];
                if($due!=NULL){
                    $date1Timestamp = strtotime($due);
                    $date2Timestamp = strtotime(date("Y-m-d"));
                    $difference = $date2Timestamp - $date1Timestamp;
                    $days = floor($difference / (60*60*24) );
                    // echo "<br>days->".$days;
                    $fine = $days -15;
                    if($fine<0){
                        $fine = 0;
                    
                    }
                    // echo "<br>FINE->".$fine;

                    $totalFine+=$fine;
                    // echo "<br>Tf->".$totalFine;
                }
                $i++;
                

        }

        mysqli_query($conn,
        "UPDATE collegeDB.libraryRecords SET Fine=$totalFine WHERE ID=$ii");

        $ii++;
    }




?>