<?php
require('db.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Charges</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<body style="background-color:#006064 ;">

<div class="container">
    <br>
    <h1 style="color:white;" >License Requests</h1>
    <br>
  <table class="table caption-top">
    <tr class="table-light">
            <th>Shop-No</th>
            <th>Manager-ID </th>
            <th>Status</th>
        </tr>

        <?php
            $query = "SELECT * FROM licenserequest";
            $result = mysqli_query($db, $query);
          
            while($row = mysqli_fetch_assoc($result)){
        ?>
    <tr class="table-light">
            <td><?php echo $row['sno'];?></td>
            <td><?php echo $row['skid'];?></td>
            <td>
                <form action ="admin_approval_server_sr.php" method ="POST">
                    
                    <input type = "date" name= "lsdate" />
                    <input type = "date" name= "ledate" />
                    <input type = "submit" name  ="approve" value = "approve"/>
                    <input type = "submit" name  ="deny" value = "decline"/>
                    <input type = "hidden" name  ="sno" value = "<?php echo $row['sno'];?>"/>
                    <input type = "hidden" name  ="skid" value = "<?php echo $row['skid'];?>"/>
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>

   
</div>
