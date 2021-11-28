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
<body class="bg-info text-white">
<?php
    require('db.php');
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['name'])) {
        $name=$_REQUEST['name'];
        $gender=$_REQUEST['gender'];
        $address =$_REQUEST['address'];
        $mobile =$_REQUEST['mobile'];
        $dob =$_REQUEST['dob'];
        $password =$_REQUEST['password'];
        $checkmob = "SELECT skid FROM `Shopkeeper` WHERE contact = '$contact'";
        $checkmobresult = mysqli_query($db, $checkmob);
        $fetch_rows = mysqli_num_rows($checkmobresult);
        if($fetch_rows>0){
          echo "<div class='form'>
                <h3>Mobile Number already exists</h3><br/>
                <p class='link'>Click here to <a href='register_sk.php'>register</a> again.</p>
                </div>";
        } else {
          $query    = "INSERT into `Shopkeeper` (name, gender, address, mobile, dob, password)
                       VALUES ('$name','$gender','$address', '$mobile', '$dob', '$password')";

          $result   = mysqli_query($db, $query);
          if ($result) {
              echo "<div class='form'>
                    <h3>You are registered successfully.</h3><br/>
                    <p class='link'>Click here to <a href='login.php'>Login</a></p>
                    </div>";
          } else {
              echo "<div class='form'>
                    <h3>There was an error, Please try again !</h3><br/>
                    <p class='link'>Click here to <a href='register_sk.php'>register</a> again.</p>
                    </div>";
          }
        }

    } else {
?>
    <form class="form" action="register_sk.php" method="post">
        <h1 class="login-title">Registration</h1>
        <input type="text" class="login-input" name="skname" placeholder="Enter your name" required />
        <input type="text" class="login-input" name="gender" placeholder="Enter your Gender (M/F)" required />
        <input type="text" class="login-input" name="address" placeholder="Enter your address" required>
        <input type="number" class="login-input" name="contact" placeholder="Enter 10 digit mobile number" required>
        <input type="date" class="login-input" name="dob" placeholder="Enter your DOB"required>
        <input type="password" class="login-input" name="password" placeholder="Password" required>

        <input type="submit" name="submit" value="Register" class="login-button">
        <p class="link"><a href="login.php">Click to Login</a></p>
    </form>
<?php
    }
?>
</body>
</html>
