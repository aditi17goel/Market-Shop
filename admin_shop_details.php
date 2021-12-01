<?php
require('db.php');
?>
<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Details</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<body style="background-color:#006064 ;">
    <div class="container">


<div class="center">
	<br>
    <h1 style="color:white;" >Shop Details</h1>
	
	<br>
        <h3 style="color:white;" style="margin-bottom: 3cm;" >Area 1: Food Court</h3>
        <br>
  <table class="table caption-top">
    <tr class="table-light">
            <th>Shop-No</th>
            <th>Shop Name</th>
            <th>Address</th>
            <th>Contact</th>
            <th>Area</th>
            <th>Active</th>
            <th>License Start Date</th>
            <th>License Expiry Date</th>
            <th>Approval Status </th>
        </tr>

        <?php
            $query = "SELECT * FROM Shop WHERE Area = 1 ORDER BY sno ASC";
            $result = mysqli_query($db, $query);
          
            while($row = mysqli_fetch_assoc($result)){
        ?>
    <tr class="table-light">
            <td><?php echo $row['sno'];?></td>
            <td><?php echo $row['sname'];?></td>
            <td><?php echo $row['address'];?></td>
            <td><?php echo $row['contact'];?></td>
            <td><?php echo $row['area'];?></td>
            <td><?php echo $row['Active'];?></td>
            <td><?php echo $row['License_Start_Date'];?></td>
            <td><?php echo $row['License_Expiry_Date'];?></td>
            <td><?php if($row['Active']==0)echo 'Pending'; else echo 'Approved';?></td>
        </tr>
        
    <?php
            }
            ?>
    </table>
    
    	<br>
        <h3 style="color:white;" style="margin-bottom: 3cm;" >Area 2: Faculty Quarter</h3>
        <br>
  <table class="table caption-top">
    <tr class="table-light">
            <th>Shop-No</th>
            <th>Shop Name</th>
            <th>Address</th>
            <th>Contact</th>
            <th>Area</th>
            <th>Active</th>
            <th>License Start Date</th>
            <th>License Expiry Date</th>
            <th>Approval Status </th>
        </tr>

        <?php
            $query = "SELECT * FROM Shop WHERE Area = 2 ORDER BY sno ASC";
            $result = mysqli_query($db, $query);
          
            while($row = mysqli_fetch_assoc($result)){
        ?>
    <tr class="table-light">
            <td><?php echo $row['sno'];?></td>
            <td><?php echo $row['sname'];?></td>
            <td><?php echo $row['address'];?></td>
            <td><?php echo $row['contact'];?></td>
            <td><?php echo $row['area'];?></td>
            <td><?php echo $row['Active'];?></td>
            <td><?php echo $row['License_Start_Date'];?></td>
            <td><?php echo $row['License_Expiry_Date'];?></td>
            <td><?php if($row['Active']==0)echo 'Pending'; else echo 'Approved';?></td>
        </tr>
        
    <?php
            }
            ?>
    </table>

    <br>
        <h3 style="color:white;" style="margin-bottom: 3cm;" >Area 3: APJ Hostel</h3>
        <br>
  <table class="table caption-top">
    <tr class="table-light">
            <th>Shop-No</th>
            <th>Shop Name</th>
            <th>Address</th>
            <th>Contact</th>
            <th>Area</th>
            <th>Active</th>
            <th>License Start Date</th>
            <th>License Expiry Date</th>
            <th>Approval Status </th>
        </tr>

        <?php
            $query = "SELECT * FROM Shop WHERE Area = 3 ORDER BY sno ASC";
            $result = mysqli_query($db, $query);
          
            while($row = mysqli_fetch_assoc($result)){
        ?>
    <tr class="table-light">
            <td><?php echo $row['sno'];?></td>
            <td><?php echo $row['sname'];?></td>
            <td><?php echo $row['address'];?></td>
            <td><?php echo $row['contact'];?></td>
            <td><?php echo $row['area'];?></td>
            <td><?php echo $row['Active'];?></td>
            <td><?php echo $row['License_Start_Date'];?></td>
            <td><?php echo $row['License_Expiry_Date'];?></td>
            <td><?php if($row['Active']==0)echo 'Pending'; else echo 'Approved';?></td>
        </tr>
        
    <?php
            }
            ?>
    </table>

</div>

<
