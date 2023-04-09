<?php
session_start();
include 'connectDB.php';
$sql = "SELECT * FROM order_product WHERE orderID = '" . $_SESSION["orderID"] . "'";
$result = mysqli_query($conn,$sql);
$result1 = mysqli_fetch_array($result);
$total_price = $result1['totalPrice'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" >
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>
<body>
<?php include 'navbar1.php'?>
<div class="container">
  <div class="row align-items-start">
    <div class="col-md-10 " style="margin: auto">
        <div class="alert alert-secondary" role="alert">
            Please check before placing an order!
        </div>
        <div><i class="bi bi-geo"></i>Delivery address</div>
            Order ID : <?=$result1['orderID']?><br>
            Frist name: <?=$result1['fname']?> 
            Last Name: <?=$result1['lname']?> <br>
            Mobile: <?=$result1['mobile']?> <br>
            Delivery address: <?=$result1['address']?><br> 
  <table class="table">
  <thead>
     <tr>
        <th>ID</th>
        <th >Name Product</th>
        <th>Price</th>
        <th colspan="3">Quantity</th>
        <th>Total Price</th>
     </tr>
  </thead>
  <tbody>
<?php
$sql1 = "SELECT * FROM order_checkout ,product  WHERE order_checkout.id=product.id and order_checkout.orderID = '" . $_SESSION["orderID"] . "'"; //จอย2ตารางและเอา record orderid มาแสดง
$result2 = mysqli_query($conn,$sql1);
// $row = mysqli_fetch_array($result2);
// echo $row['id'],$row['name'],$row['orderPrice'],$row['orderQty'],$row['total'];
while($row = mysqli_fetch_array($result2)){
?>
     <tr>
        <td><?=$row['id']?></td>
        <td><?=$row['name']?></td>
        <td><?=$row['orderPrice']?></td>
        <td colspan="3">
            <?=$row['orderQty']?>
        </td>
        <td><?=$row['total']?></td>
    </tr>
<?php }?>  
  </tbody>
</table>

<p class="fs-6; text-end">Total <?=number_format($total_price,2)?> Baht</p><br>
<p style="text-align:center; margin-bottom:10px">payment method</p><br>
<center><img src="img/61.jpg" width="350px" height="400px" style="margin-bottom:50px"></center>

<p class="text-center">Once the payment is made, you can send a transfer slip via email : thanaporn.tanr@gmail.com</p>
<div style="text-align:center; margin-bottom:20px">
            <a href="showproduct.php"><button type="button" class="btn btn-dark">back</button></a>
        </div>    
</div>
  </div>

</div>
</body>
</html>