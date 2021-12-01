<?php
require('db.php');
?>
<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Approval</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<body style="background-color:#006064 ;">
    <div class="container">


<div class="center">
	<br>
    <h1 style="color:white;" >Shop Registration Requests</h1>
	<br>
  <table class="table caption-top">
    <tr class="table-light">
            <th>Shop-No</th>
            <th>Shop Name</th>
            <th>Address</th>
            <th>Contact</th>
            <th>Area</th>
            <th>Active</th>
            <th>Action</th>
        </tr>

        <?php
            $query = "SELECT * FROM Shop WHERE Active= 0 ORDER BY sno ASC";
            $result = mysqli_query($db, $query);
          
            while($row = mysqli_fetch_assoc($result)){
        ?>
    <tr class="table-light">
            <td><?php echo $row['sno'];?></td>
            <td><?php echo $row['sname'];?></td>
            <td><?php echo $row['address'];?></td>
            <td><?php echo $row['contact'];?></td>
            <td><?php echo $row['area'];?></td>
            <td><?php if($row['Active']==0)echo 'Pending'; else echo 'Approved';?></td>
            <td>
                <form action ="admin_approval.php" method ="POST">
                    <input type = "hidden" name  ="sno" value = "<?php echo $row['sno'];?>"/>
                    <input type = "submit" name  ="approve" value = "Approve"/>
                    <input type = "submit" name  ="deny" value = "Deny"/>
                </form>
            </td>
        </tr>
        
    <?php
            }
            ?>
    </table>

</div>

<?php

if(isset($_POST['approve'])){
    $sno = $_POST['sno'];

    $select = "UPDATE Shop SET Active = 1 WHERE sno = '$sno'";
    $result = mysqli_query($db, $select);

    echo '<script type = "text/javascript">';
    echo 'alert("User Approved!");';
    echo 'window.location.href = "admin_approval.php"';
    echo '</script>';
}

if(isset($_POST['deny'])){
    $sid = $_POST['sno'];

    $select = "DELETE FROM Shop WHERE sid = '$sno'";
    $result = mysqli_query($db, $select);

    echo '<script type = "text/javascript">';
    echo 'alert("User Denied!");';
    echo 'window.location.href = "admin_approval.php"';
    echo '</script>';
}
?>
