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



<div class = "container">
<br> <br>
<div class = "header"> 
        <h2 style="color:white;" >
                Enter the Details
        </h2>
</div>

<form action = "licenserequest_sr.php" method="post">


<div class="mb-3">
        
        <input type="text" name = "sid" class="form-control" placeholder="Enter Shop No" required>
</div>



<button type = "submit" class="btn btn-outline-primary" name = "gardenerdetailsubmit">
        Request license
</button>

</form>

 
</body>
</div>

</html>
