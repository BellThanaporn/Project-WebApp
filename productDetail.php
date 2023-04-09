<?php include 'connectDB.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" >
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>

    
</head>
<body>
    <?php include 'navbar1.php'?>
<div class="container" style="margin-top:20px">
  <div class="row">
  <?php
        $ids=$_GET['id'];
        $sql="SELECT * FROM product WHERE id=$ids";
        $result= mysqli_query($conn,$sql);
        $row=mysqli_fetch_array($result);
      
        ?>
    <div class="col-md-4 ">
        <?php include 'carousel.php'?>
        <!-- <img src="<?=$row['img']?>" width="350px" hight="350px"/> -->
    </div>
    <div class="col-md-6">
    <div class="fw-light">
        <!-- ID <?=$row['id']?>: -->
        <p class="fs-3"><?=$row['name']?></p>
        <p> Price : <?=$row['price']?> Baht</p><br>
        <p class="fs-5">description</p><br> <?=$row['description']?><br>
        <a href ="orderAdd.php?id=<?=$row['id']?>"><button type="button" class="btn btn-secondary" style="margin-top:20px">Add Cart</button><a>
    </div>
    
  </div>
</div>
<?php
mysqli_close($con);
?>
   
</body>
</html>