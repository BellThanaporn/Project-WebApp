<?php include 'connectDB.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>B-Bag Shop</title>
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" >
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    
</head>
<body>
<?php include 'navbar1.php'?>

<div class="container" style="margin-top:20px; text-align:center">

  <div class="row">
    <?php
        $sql = "SELECT * FROM product";
        $result= mysqli_query($conn,$sql);
        while($row=mysqli_fetch_array($result)){
            ?>
                <div class="col-sm-4 text-align:right">
                    <div class="fw-light">
                        <a href ="productDetail.php?id=<?=$row['id']?>"><img src="<?=$row['img']?>" width="300px" height="300px"></a><br>
                        <?=$row['id']?>.
                        <b><?=$row['name']?></b><br>
                        <p style="color:gray;"><?=$row['price']?> Baht</p><br>
                    </div>
                    <br>
                </div>
            <?php   
        }
        mysqli_close($con);
    ?>
  </div>


</div>
</body>
</html>
<php></php>