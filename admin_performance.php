<?php
require('db.php');
?>
<!DOCTYPE html>
<html lang="en">
 <head>
      <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop Performance</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<body style="background-color:#006064 ;">

<div class="container">

<br>
    <h1 style="color:white;" >Shop Performance</h1>
	
<br>
    <h4 style="color:white;" >Pending admin performance ratings</h4>
    <h5 style="color:#D3D3D3;" >Month: November</h5>
<br>

  <table class="table caption-top">
    <tr class="table-light">
            <th>Shop No</th>
            <th>Month</th>
            <th>Year</th>
            <th>Performance</th>
        </tr>
        <?php

              $catego = "SELECT sno from Shop where sno NOT IN (SELECT sno from Performance where monthh = MONTH(now()) AND yearr = YEAR(now())) ";
              $all_categories = mysqli_query($db,$catego);
              while($row = mysqli_fetch_assoc($all_categories)){
        ?>
    <tr class="table-light">
            <td><?php echo $row['sno'];?></td>
            <td><?php echo date("F", strtotime('m'));?></td>
            <td><?php echo date("Y", strtotime('m'));?></td>
            <td>
            <form method="post" name="perform">
        <div class="mb-3">
        <input type = "hidden" name  ="sno" value = "<?php echo $row['sno'];?>"/>
        <input type="number" class="form-control" name="performance" placeholder="0 to 10" autofocus="true"/>
        </div>
        <input type="submit" value="submit" name="submit"/>

  	</form>
            </td>
        </tr>
        <?php
                }
                ?>
         </table>
    
<br>
    <h4 style="color:white;" >Given admin performance ratings</h4>
    <h5 style="color:#D3D3D3;" >Month: November</h5>	
<br>

  
  <table class="table caption-top">
    <tr class="table-light">
            <th>Shop No</th>
            <th>Month</th>
            <th>Year</th>
            <th>Admin Rating </th>
            <th>Other Shop Rating </th>
            <th>Overall Performance</th>
        </tr>
        <?php

              $catego = "SELECT * from Performance where monthh = MONTH(now()) AND yearr = YEAR(now())";
              $all_categories = mysqli_query($db,$catego);
              
              while($row = mysqli_fetch_assoc($all_categories)){
        ?>
    <tr class="table-light">
            <td><?php echo $row['sno'];?></td>
            <td><?php echo date("F", strtotime('m'));?></td>
            <td><?php echo date("Y", strtotime('m'));?></td>
            <td><?php echo $row['admin_rating'];?></td>
            <td><?php if($row['shops_rating']==NULL)echo 'Pending'; else echo $row['shops_rating'] ;?></td>
            <td><?php  if($row['shops_rating']==NULL)echo $row['admin_rating']; else echo ($row['admin_rating'] + $row['shops_rating'])/2;?></td>
        </tr>
        <?php
                }
                ?>
         </table>


</div>
</body>
</html>
<?php
if (isset($_REQUEST['submit'])) {
    $insert_sno = $_REQUEST['sno'];
    $insert_performance = $_REQUEST['performance'];
    $insert_month=11;
    $insert_year =2021;

    $insert_query    = "INSERT into Performance VALUES ('$insert_sno' ,'$insert_performance', NULL, '$insert_month', '$insert_year')";

    $insert_result   = mysqli_query($db, $insert_query);
    echo '<script type = "text/javascript">';
    echo 'alert("Graded!");';
    echo 'window.location.href = "admin_performance.php"';
    echo '</script>';
    header('location: admin_performance.php');
}
?>
