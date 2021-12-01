
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
        $address =$_REQUEST['address'];
        $mobile =$_REQUEST['mobile'];
	$area = $_REQUEST['area'];

        $query    = "INSERT into `Shop` (sname, Manager, address, contact, area, Active)
                     VALUES ('$name',2,'$address', '$mobile', '$area',0)";

        $result   = mysqli_query($db, $query);
        if ($result) {
            echo "<div class='alert alert-secondary'>
                  <h3>Registration request sent!</h3><br/>
                  </div>";
        } else {
            echo "<div class='alert alert-secondary'>
                  <h3>There was an error, Please try again !</h3><br/>
                  <p class='link'><a href='register_shop.php'>Try Again!</a></p>
                  </div>";
        }


    } else {
?>
    <div class="container">
    <form action="register_shop.php" method="post">
        <br>
        <h1 style="color:white;" style="margin-bottom: 3cm;" > Shop Registration</h1>
        <br>
         <div class="mb-3">
        <input type="text" class="form-control" name="name" placeholder="Enter shop name" required />
        </div>
         <div class="mb-3">
        <input type="text" class="form-control" name="address" placeholder="Enter shop address" required>
        </div>
         <div class="mb-3">
        <input type="number" class="form-control" name="mobile" placeholder="Enter 10 digit mobile number" required>
        </div>
         <div class="mb-3">
        <input type="number" class="form-control" name="area" placeholder="Enter shop area"required>
         </div>
         
        <div class="mb-3">
        <input type="submit" name="submit" value="Register" class="login-button">
        </div>
    </form>
</div>
<?php
    }
?>
</div>
</body>
</html>
