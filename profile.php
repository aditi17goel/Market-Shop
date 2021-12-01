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
              $myshops= "SELECT * from Shop, Performance where Shop.sno = 103 AND Performance.sno = 103 ";
              $query_myshops = mysqli_query($db, $myshops);
              $row = mysqli_fetch_assoc($query_myshops);
              
       ?>   
       
       <div class="row gutters-sm">
              <div class="card h">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    
                    <div class="mt-3">
                      <h4>Shop Name: <?php echo $row['sname'];?></h4>
                      <p class="text-secondary mb-1">Address: <?php echo $row['address'];?> </p>
                      <p class="text-secondary mb-1">Admin Rating : <?php echo $row['admin_rating'];?> </p>
                      <p class="text-secondary mb-1">Other Shops Rating : <?php if($row['shops_rating']==NULL) echo "Pending"; else echo $row['shops_rating'];?> </p>
                      <p class="text-secondary mb-1">License Start Date: <?php if($row['Active'] === 1){ echo $row['License_Start_Date']; }else{ echo 'Pending';} ?></p>
                      <p class="text-secondary mb-1">License Expiry Date: <?php if($row['Active'] === 1){ echo $row['License_Expiry_Date']; }else{ echo 'Pending';} ?></p>
                      <p class="text-secondary mb-1">Pending Charges: <?php echo $row['Pending_Charges'];?></p>
                    </div>
                  </div>
                </div>
            </div>
          </div>


       <?php ?>

    <br/>
    <h2 style="color:white;" >License Expiry Reminder  <a class="btn btn-info " href="licenserequest_sr.php">Renew License</a></h2>

  <table class="table caption-top">
    <tr class="table-light">
            <th>Shop No.</th>
            <th>Shop Name</th>
            <th>Address</th>
            <th>License Expiry Date</th>
            
        
        </tr>

        <?php
    
            $query = "SELECT * FROM Shop WHERE DATEDIFF(License_Expiry_Date,current_date) < 10 and sno=103";
            $result = mysqli_query($db, $query);
          
            while($row = mysqli_fetch_assoc($result)){
        ?>
    <tr class="table-light">
            <td><?php echo $row['sno'];?></td>
            <td><?php echo $row['sname'];?></td>
            <td><?php echo $row['address'];?></td>
            <td><?php echo $row['License_Expiry_Date'];?></td>
            
        </tr>
        <?php
            }
            ?>
    </table>
	</div>
  </body>
</html>
