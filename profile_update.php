<?php
require('auth.php');
require('db.php');

$skid = $_SESSION['id'];
$sql = "SELECT * from `Shopkeeper` where id= '$skid'" ;
$query = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($query);
?>
<?php
$skid = $_SESSION['id'];

if (isset($_REQUEST['submit'])) {
  $skname = $_REQUEST['skname'];
  $gender = $_REQUEST['gender'];
  $address = $_REQUEST['address'];
  $contact = $_REQUEST['contact'];
  $dob = $_REQUEST['dob'];

    $query = "Update `Shopkeeper` SET name = '$skname', gender = '$gender', address='$address',mobile = '$contact', dob='$dob' WHERE id='$skid'";
    $result = mysqli_query($db, $query);
    $rows = mysqli_fetch_assoc($result);

}
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
        <h1 style="color:white;" style="margin-bottom: 3cm;" >Update Profile</h1>
        <br>
			<div class="row">
				
				<div class="col-lg-8">
					<div class="card">
						<div class="card-body">
              <form>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Full Name</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="skname" class="form-control" value="<?php echo trim($row['name']);?>">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Gender</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="gender" class="form-control" value="<?php echo $row['gender'];?>">
								</div>
							</div>
              <div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Address</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="address" class="form-control" value="<?php echo $row['address'];?>">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Phone</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="text" name="contact"  class="form-control" value="<?php echo $row['mobile'];?> ">
								</div>
							</div>
							<div class="row mb-3">
								<div class="col-sm-3">
									<h6 class="mb-0">Date Of Birth</h6>
								</div>
								<div class="col-sm-9 text-secondary">
									<input type="date" name="dob" class="form-control" value=<?php echo $row['dob'];?>>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-3"></div>
								<div class="col-sm-9 text-secondary">
									<input type="submit" name="submit" class="btn btn-primary px-4" value="Save Changes">
								</div>
							</div>
            </form>
						</div>
					</div>

				</div>
			</div>

	</div>
  </body>
</html>
