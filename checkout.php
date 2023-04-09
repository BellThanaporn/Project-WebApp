<!-- Shipping info, Summary -->
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
        <form id="form1" method="POST" action="insertCart.php">
     <div class = "row" >
     <p class="display-6" style="margin-top:20px; margin-bottom:30px">Summary</p>
        <div class = "g-col-md-10">
    <table class = "table">
     <tr bgcolor=#EBDEF0>
        <th>ID</th>
        <th >Name Product</th>
        <th>Price</th>
        <th colspan="3">Quantity</th>
        <th>Total Price</th>
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

?>
    <tr>
        <td><?=$n?></td>
        <td>
            <img src="<?=$row1['img']?>" width="100px" height="100px">
            <?=$row1['name']?></td>
        <td><?=$row1['price']?></td>
        <td colspan="3">
            <?=$_SESSION["strQty"][$i]?>
        </td>
        <td><?=$sum?></td>
    </tr>
    
<?php
$n=$n+1;
}
}
mysqli_close($conn);
?>      
        <table class="table">
            <tr>
                <td class="text-end"><b>Payment amount</b></td>
                <td class="text-center"><?=$sumPrice?></td> 
                <td class="text-start"> Baht</td>
            </tr> 
    </table>
</table> 
    <div style="text-align:right; margin-bottom:20px">
            <button type="submit" class="btn btn-secondary">submit</button>
        </div>     
    </div>
    </div>
    <div class="row" style="margin-bottom:30px">
        <div class="col-md-7">
            <p class="display-6" style=" margin-bottom:30px">Shipping information</p>
    
            <label for="fname" class="form-label">Frist Name :</label>
            <input type="text" class="form-control" name="fname" required placeholder="Adam">

            <label for="lname" class="form-label">Last Name :</label>
            <input type="text" class="form-control" name="lname" required placeholder="Mitchel">
            
            <label for="address" class="form-label">Address</label>
            <textarea class="form-control" name="address" rows="3"  required ></textarea>            

            <label for="mobile" class="form-label">Phone</label>
            <input type="text" class="form-control" name="mobile" required placeholder="0909202165">
        </div> 
    </div> 
    </form>
    </div> 
</body>
</html>