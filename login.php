<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<body style="background-color:#006064 ;">
<?php
    require('db.php');
    session_start();
    if (isset($_REQUEST['mob'])) {
        $mob = $_REQUEST['mob'];
        $password =$_REQUEST['password'];
        $query = "SELECT * FROM `Shopkeeper` WHERE mobile='$mob'";
        $result = mysqli_query($db, $query);
        $rows = mysqli_fetch_assoc($result);
        if ($password === $rows['password']) {
            $_SESSION['id'] = $rows['id'];
            header("Location: profile.php");
        } 
        else {
            echo "<div class='form'>
                  <h3>Incorrect mobile/password.</h3><br/>
                  <p class='link'>
                    Click here to 
                        <a href='login.php'>
                            Login
                        </a> again.
                    </p>
                  </div>";
        }
    } 
    else {
?>
<div class="container">
    <form method="post" name="login">
 	<br>
        <h1 style="color:white;" style="margin-bottom: 3cm;" >Login</h1>
        <br>
        <div class="mb-3">
        <input type="text" class="form-control" name='mob' placeholder="Enter your mobile number" autofocus="true"/>
        </div>
        <div class="mb-3">
        <input type="password" class="form-control" name='password' placeholder="Enter your Password"/>
        </div>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link"><a href="register_shopkeeper.php">New Registration</a></p>
  </form>
</div>
<?php
    }
?>
</body>
</html>
