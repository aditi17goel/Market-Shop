<?php

include('db.php');
session_start();

$sid= $_POST['sno'];

if(isset($_POST['approve'])){
    $lsdate=$_POST['lsdate'];
    $ledate=$_POST['ledate'];

    $sql = "UPDATE shop set Active=1,issue='$lsdate',expiry='$ledate',where sno='$sid'";

    $result = mysqli_query($db, $sql);

        $sql = "delete from licenserequest where sno = {$sid}";

        $result = mysqli_query($db, $sql);
            
            if ($result) {
                echo "License Approved";
            } 
            else {
                echo "Failed";
            }
}
else{

    $skid = $_POST['skid'];
    $sid = $_POST['sno'];

    $sql = "UPDATE Shop set Active=0 where sno='$sid'";

    $result = mysqli_query($db, $sql);
        
        if ($result) {
            echo "License Denied";
        } 
        else {
            echo "Failed";
        }

        $sql = "delete from licenserequest where sid = {$sid}";

    $result = mysqli_query($db, $sql);
        
        if ($result) {
            echo "License Denied";
        } 
        else {
            echo "Failed";
        }

    

}
?>
