<?php
require('db.php');
?>
<!DOCTYPE html>
<html lang="en">
 <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopkeeper Details</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<body style="background-color:#006064 ;">
    <div class="container">


<div class="center">
	<br>
        <h3 style="color:white;" style="margin-bottom: 3cm;" >Shopkeeper Details</h3>
        <br>
  <table class="table caption-top">
    <tr class="table-light">
            <th>Shopkeer ID</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Address</th>
            <th>Mobile</th>
            <th>Date of Birth</th>
            <th>Shop No.</th>
            <th>Gate Pass Status</th>
            <th>Issue Date </th>
            <th>Expiry Date</th>
        </tr>

        <?php
            $query = "SELECT * FROM Shopkeeper, gatepass where Shopkeeper.id = gatepass.id";
            $result = mysqli_query($db, $query);
          
            while($row = mysqli_fetch_assoc($result)){
        ?>
    <tr class="table-light">
            <td><?php echo $row['id'];?></td>
            <td><?php echo $row['name'];?></td>
            <td><?php echo $row['gender'];?></td>
            <td><?php echo $row['address'];?></td>
            <td><?php echo $row['mobile'];?></td>
            <td><?php echo $row['dob'];?></td>
            <td><?php echo $row['sno'];?></td>
            <td><?php echo $row['active'];?></td>
            <td><?php if($row['active']==0)echo 'Pending'; else echo $row['issue_date'];?></td>
            <td><?php if($row['active']==0)echo 'Pending'; else echo $row['expiry_date'];?></td> 
        </tr>
        
    <?php
            }
            ?>
    </table>
    
    
</div>

</div>
</body>
</html>
