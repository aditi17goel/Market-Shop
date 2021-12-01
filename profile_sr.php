<?php
include('auth.php');
require('db.php');
$var1 = $_SESSION['skid'];
$sql = "SELECT * from `Shopkeeper` where skid= '$var1'" ;
$query = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  </head>
  <body>
    <div class="container">
    <div class="main-body">

          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="">User profile</a></li>
              <a href = "logout.php" class="ml-auto"> Logout </a>
            </ol>

          </nav>
          <!-- /Breadcrumb -->

          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card h">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <?php if($row['gender']=="M"){ ?>
                    <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                  <?php }else{ ?>
                  <img src="https://bootdey.com/img/Content/avatar/avatar8.png" alt="Admin" class="rounded-circle" width="150">
                <?php } ?>
                    <div class="mt-3">
                      <h4><?php echo $row['skname']; ?></h4>
                      <p class="text-secondary mb-1">Shopkeeper ID</p>
                      <p class="text-muted font-size-sm"><?php echo $row['skid']; ?></p>
                      <!-- <button class="btn btn-primary">Follow</button>
                      <button class="btn btn-outline-primary">Message</button> -->
                    </div>
                  </div>
                </div>
              </div>

            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row['skname']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Gender</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row['gender']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row['address']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row['contact']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Date of Birth</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row['dob']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-6">
                      <a class="btn btn-info " href="profile_update.php">Update</a>
                    </div>
                    <div class="col-sm-6">
                      <a class="btn btn-info "href="profile_password_update.php">Change Password</a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row gutters-sm">
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3">My Shop 1</h6>

                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>

                    </div>
                  </div>
                </div>
                <div class="col-sm-6 mb-3">
                  <div class="card h-100">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"> My Shop 2</h6>

                      <div class="progress mb-3" style="height: 5px">
                        <div class="progress-bar bg-primary" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
              <br/>
              <div class="center">
    <h1>Status</h1>

    <table id = "users">
        <tr>
            <th>Shop-Id</th>
            <th>Shop Name</th>
            <th>Address</th>
            <th>Status</th?>
            <th>License Start</th>
            <th>License End</th>
            <th>Pending Charges</th>
            
        
        </tr>

        <?php
    
            $query = "SELECT * FROM Shop WHERE skid=$var1";
            $result = mysqli_query($db, $query);
          
            while($row = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?php echo $row['sid'];?></td>
            <td><?php echo $row['sname'];?></td>
            <td><?php echo $row['address'];?></td>
            <td><?php echo $row['approval'];?></td>
            <td><?php if($row['approval'] === 'Approved'){ echo $row['licensestart']; }else{ echo '-';} ?></td>
            <td><?php if($row['approval'] === 'Approved'){ echo $row['licenseend']; }else{ echo '-';} ?></td>
            <td><?php echo $row['charges'];?></td>
        </tr>
        <?php
            }
            ?>
    </table>
    <br/>
    <br/>

    <h2>License Expiry Alert</h2>
    <h5>(Expiring within 7 days)</h5>

    <table id = "status">
        <tr>
            <th>Shop-Id</th>
            <th>Shop Name</th>
            <th>Address</th>
            <th>License End</th>
            
        
        </tr>

        <?php
    
            $query = "SELECT * FROM Shop WHERE DATEDIFF(licenseend,current_date) <10 and id='$id'";
            $result = mysqli_query($db, $query);
          
            while($row = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?php echo $row['sid'];?></td>
            <td><?php echo $row['sname'];?></td>
            <td><?php echo $row['address'];?></td>
            <td><?php echo $row['licenseend'];?></td>
            
        </tr>
        <?php
            }
            ?>
    </table>


   
</div>




            </div>
          </div>

        </div>
    </div>
  </body>
</html>
