<?php
include('db.php');
$sno= $_POST['sno'];
$amount= $_POST['amount'];


        $query  = "SELECT * FROM Shop WHERE sno=$sno";
        $result = mysqli_query($db, $query);
        $rows = mysqli_fetch_assoc($result);
        $pendingcharges = $rows['Pending_Charges'] + $amount;

    

    $sql = "UPDATE Shop set Pending_Charges = $pendingcharges where sno ='$sno'";

    $result = mysqli_query($db, $sql);
        
        if ($result) {
            echo "charges updated";
        } 
        else {
            echo "Failed";
        
    }

?>
