<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Charges</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<body style="background-color:#006064 ;">

<div class = "container">
<body>

<br>
    <h1 style="color:white;" >Update Charges</h1>
<br>

<form action = "admin_charges_update2.php" method="post">

<div class="mb-3">
        <label for="Shop No" class="form-label">
                Shop No.
        </label>
        <input type="text" name ='sno' class="form-control" placeholder="Enter Shop No." required>
</div>
<br/>
<div class="mb-3">
        <label for="amount_cat">Choose the category:</label>
            <select id="cars" name="cars">
                <option value="rent">Shop Rent</option>
                <option value="electricity">Electricity</option>
                <option value="other">Others</option>
            </select>
</div>
<br/>
<div class="mb-3">
        <label for="amount" class="form-label">
                Amount
        </label>
        <input type="text" name = "amount" class="form-control" placeholder="enter amount" required>
</div>



<br/>

<button type = "submit" class="btn btn-outline-primary" name = "chargesupdate">
        Update Charges
</button>

</form>
</body>
</div>

</html>
