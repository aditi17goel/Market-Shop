<?php
require('db.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" type ="text/css" href = "main.css">
    <title>Holiday Request</title>
</head>
<body>



<div class="center">
    <h1>Holiday Requests</h1>

    <table id = "users">
        <tr>
            <th>Shopkeeper ID</th>
            <th>Shop ID</th>
            <th>Status</th>
            <th>Start Date</th>
            <th>End Date</th>
           
            
        </tr>

        <?php
            $sql = "SELECT * FROM licenserequest";
            $result = mysqli_query($db, $sql);
            while($row = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?php echo $row['skid'];?></td>
            <td><?php echo $row['sid'];?></td>
            <td><?php echo $row['isApproved'];?></td>
            <td><?php if($row['isApproved'] === 'approved'){ echo $row['lsdate']; }else{ echo "-"; }; ?></td>
            <td><?php if($row['isApproved'] === 'approved'){ echo $row['ledate']; }else{ echo "-"; }; ?></td>

           
            
        </tr>
        <?php
                }
                ?>
    </table>


</div>



