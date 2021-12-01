<?php
require('db.php');
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
    <h1 style="color:white;" >Shop Charges</h1>
	<br>
  <table class="table caption-top">
    <tr class="table-light">
            <th>Shop-Id</th>
            <th>Shop Name</th>
            <th>Address</th>
            <th>Contact</th>
            <th>License Start Date</th>
            <th>License End Date</th>
            <th>Shop Rent </th>
            <th>Electricity Rent</th>
            <th>Pending Charges</th>
            <th>Action</th>
        </tr>

        <?php
            $query = "SELECT * FROM Shop WHERE active = 1 ORDER BY sno ASC";
            $result = mysqli_query($db, $query);
            while($row = mysqli_fetch_assoc($result)){
        ?>
    <tr class="table-light">
            <td><?php echo $row['sno'];?></td>
            <td><?php echo $row['sname'];?></td>
            <td><?php echo $row['address'];?></td>
            <td><?php echo $row['contact'];?></td>
            <td><?php if($row['License_Start_Date']==NULL) echo 'Not Assigned'; else echo $row['License_Start_Date'];?></td>
            <td><?php if($row['License_Expiry_Date']==NULL) echo 'Not Assigned'; else echo $row['License_Expiry_Date'];?></td>
            <td><?php echo $row['Shop_Rent'];?></td>
            <td><?php echo $row['Electricity_Rent'];?></td>
            <td><?php echo $row['Pending_Charges'];?></td>
            <td>
                <form action ="admin_charges_update.php" method ="POST">
                    <input type = "hidden" name  ="sid" value = "<?php echo $row['sid'];?>"/>
                    <input type = "submit" name  ="update" value = "Update"/>
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>

</div>
</body>
</html>
