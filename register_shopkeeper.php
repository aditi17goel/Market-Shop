<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<body style="background-color:#006064 ;">
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['name'])) {
        $name=$_REQUEST['name'];
        $gender=$_REQUEST['gender'];
        $address =$_REQUEST['address'];
        $mobile =$_REQUEST['mobile'];
        $sno = $_REQUEST['sno'];
        $dob =$_REQUEST['dob'];
        $password =$_REQUEST['password'];
        $checkmob = "SELECT id FROM `Shopkeeper` WHERE mobile = '$mobile'";
        $checkmobresult = mysqli_query($db, $checkmob);
        $fetch_rows = mysqli_num_rows($checkmobresult);
        if($fetch_rows>0){
          echo "<div class='alert alert-secondary'>
                <h3>Mobile Number already exists</h3><br/>
                <p class='link'><a href='register_shopkeeper.php'>New Registeration</a></p>
                </div>";
        } else {
          $query    = "INSERT into `Shopkeeper` (name, gender, address, mobile, dob, sno, password)
                       VALUES ('$name','$gender','$address', '$mobile', '$dob', '$sno', '$password')";

          $result   = mysqli_query($db, $query);
          if ($result) {
              echo  "<div class='alert alert-secondary'>
                    <h3>Registered successfully.</h3>
                    <br>
                    <p class='link'><a href='login.php'>Login</a></p>
                    </div>";
          } else {
              echo "<div class='alert alert-secondary'>
                    <h3>There was an error, Please try again !</h3><br/>
                    <p class='link'>Click here to <a href='register_shopkeeper.php'>register</a> again.</p>
                    </div>";
          }
        }

    } else {
?>
<div class="container">
    <form action="register_shopkeeper.php" method="post">
        <br>
        <h1 style="color:white;" style="margin-bottom: 3cm;" >Registration</h1>
        <br>
         <div class="mb-3">
        <input type="text" class="form-control" name="name" placeholder="Enter your name" required />
        </div>
         <div class="mb-3">
        <input type="text" class="form-control" name="gender" placeholder="Enter your gender (M/F)" required />
        </div>
         <div class="mb-3">
        <input type="text" class="form-control" name="address" placeholder="Enter your address" required>
        </div>
         <div class="mb-3">
        <input type="number" class="form-control" name="mobile" placeholder="Enter 10 digit mobile number" required>
        </div>
         <div class="mb-3">
        <input type="date" class="form-control" name="dob" placeholder="Enter your DOB"required>
         </div>
         
         <div class="mb-3">
        <input type="number" class="form-control" name="sno" placeholder="Enter shopnumber">
         </div>
         
         <div class="mb-3">
        <input type="password" class="form-control" name="password" placeholder="Password" required>
	</div>
	<div class="mb-3">
        <input type="submit" name="submit" value="Register" class="login-button">
        </div>
        <div class="container">
        	<h5 style="color:white;">Already registered? <a href = "login.php"><b>Login</b></a></h5>
        </div>
    </form>
</div>
<?php
    }
?>
</body>
</html>
