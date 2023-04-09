<?php
session_start();
include 'connectDB.php';
$ids=$_GET["id"];
$sql="SELECT * FROM product WHERE id=$ids";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <!-- Bootstrap CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" >
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<body>
<?php include 'navbar1.php'?>
    <div class="container">
        <form id="form1" method="POST" action="">
     <div class = "row" >
     <p class="display-6" style="margin-top:20px; margin-bottom:30px">Shopping Cart</p>
        <div class = "g-col-md-10">
    <table class = "table table-hover">
     <tr bgcolor=#EBDEF0>
        <th>ID</th>
        <th >Name Product</th>
        <th>Price</th>
        <th colspan="3">Quantity</th>
        <th>Total Price</th>
        <th>Delete</th>
     </tr>
<?php

$total = 0;
$sumPrice = 0;
$n = 1;

for ($i=0; $i<=(int)$_SESSION["intLine"]; $i++){
    if(($_SESSION["strProductID"][$i]) != "" ){
        $sql1 = "SELECT * FROM product WHERE id = '" . $_SESSION["strProductID"][$i] . "' "; 
        $result1 = mysqli_query($conn, $sql1);
        $row1 = mysqli_fetch_array($result1); 
        $_SESSION["price"] = $row1['price'];
        $total = $_SESSION["strQty"][$i]; 
        $sum = $total * $row1['price']; 
        $sumPrice = $sumPrice + $sum;
        // $sumPrice = number_format($sumPrice);
        $_SESSION["sum_Price"] = $sumPrice;

?>
    <tr>
        <td><?=$n?></td>
        <td>
            <img src="<?=$row1['img']?>" width="100px" height="100px">
            <?=$row1['name']?></td>
        <td><?=$row1['price']?></td>
        <td colspan="3">
            <?php if($_SESSION["strQty"][$i]>1){?>
                <a href="orderDel.php?id=<?=$row1['id']?>"><button type="button" class="btn btn-outline-info" style='font-size:15px'>-</button></a>    
            <?php } else{?><button type="button" class="btn btn-outline-info" style='font-size:15px'>-</button>
            <?php } ?>    
            <?=$_SESSION["strQty"][$i]?>
            <a href="orderAdd.php?id=<?=$row1['id']?>"><button type="button" class="btn btn-outline-info" style='font-size:15px'>+</button></a>
        </td>
        <td ><?=$sum?></td>
        <td><a href="delCart.php?Line=<?=$i?>"><i class="bi bi-trash3" style='font-size:20px; color:red'></i></a></td>
    </tr>
    
<?php
$n=$n+1;
}
}

mysqli_close($conn);
?>      
        <table class="table">
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td class="text-end"><b>Total</b></td>
                <td class="text-end"><?=$sumPrice?></td> 
                <td class="text-center"> Baht</td>
                <!-- <td class="text-start" colspan="4"><b>Total</b></td>
                <td class="text-end" colspan="3"><?=$sumPrice?></td> 
                <td class="text-center"> Baht</td> -->
            </tr> 
        
 
 
</table>

    <div style="text-align:right; margin-bottom:20px">
    <?php if($_SESSION["strProductID"] ){?>
        <a href='delCar_all.php?Line=<?=$i?>' ><button type="button" class="btn btn-danger">delete all</button></a>
    <?php }?>
        <a href = "showproduct.php"><button type="button" class="btn btn-outline-secondary">choose another</button></a>
        <a href = "checkout.php"><button type="button" class="btn btn-success">checkout</button></a>
    </div>

    </div>
    </div>
    </form>
    </div> 
</body>
</html>