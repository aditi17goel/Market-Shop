<?php
include('auth.php');
require('db.php');
$id = $_SESSION['id'];
$sql = "SELECT * from `Shopkeeper` where id= '$id'" ;
$query = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($query);
$sno = $row['sno'];

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<body style="background-color:#006064 ;">
    <div class="container">
	<br>
        <h1 style="color:white;" style="margin-bottom: 3cm;" >Profile Page</h1>
        <br>

          <div class="row gutters-sm">
              <div class="card h">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    
                    <div class="mt-3">
                      <h4><?php echo $row['name']; ?></h4>
                      <p class="text-secondary mb-1">Shopkeeper ID : <?php echo $row['id']; ?></p>
                    </div>
                  </div>
                </div>
            </div>
          </div>
  <br>
  <table class="table caption-top">
  <thead>
  </thead>
  <tbody>
    <tr class="table-light">
      <th scope="row">Name </th>
      <td><?php echo $row["name"]; ?></td>
    </tr>
    <tr class="table-light">
      <th scope="row">Gender </th>
      <td><?php echo $row["gender"]; ?></td>
    </tr>
    <tr class="table-light">
      <th scope="row">	Address </th>
      <td><?php echo $row["address"]; ?></td>
    </tr>
    <tr class="table-light">
      <th scope="row">Mobile Number </th>
      <td><?php echo $row["mobile"]; ?></td>
    </tr>
    <tr class="table-light">
      <th scope="row">Date of Birth </th>
      <td><?php echo $row["dob"]; ?></td>
    </tr>
    <tr class="table-light">

      <td>                      <a class="btn btn-info " href="profile_update.php">Update Details</a></td>
      <td> </td>
    </tr>
  </tbody>
</table>
           
       <?php 

              $myshops= "SELECT * from Shop where sno = $sno ";
              $query_myshops = mysqli_query($db, $myshops);
              while($row_myshops = mysqli_fetch_assoc($query_myshops)){
                 $performa = "SELECT * FROM `Performance` WHERE sno = $sno";
                 $query_performance = mysqli_query($db, $performa);
                 $row_performance = mysqli_fetch_assoc($query_performance);
       ?>   
       
       <div class="row gutters-sm">
              <div class="card h">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    
                    <div class="mt-3">
                      <h4>Shop Name: <?php echo $row_myshops['sname'];?></h4>
                      <p class="text-secondary mb-1">Customer Rating : <?php echo $row_performance['cust_rating'];?> </p>
                      <p class="text-secondary mb-1">Admin Rating : <?php echo $row_performance['admin_rating'];?> </p>
                      <p class="text-secondary mb-1">Other Shops Rating : <?php echo $row_performance['shops_rating'];?> </p>
                    </div>
                  </div>
                </div>
            </div>
          </div>


       <?php }?>
	</div>
  </body>
</html>
