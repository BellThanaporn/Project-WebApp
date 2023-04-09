<!-- insert in to database -->
<?php
session_start();
include 'connectDB.php';
$Fname=$_POST['fname'];
$Lname=$_POST['lname'];
$Address =$_POST['address'];
$Mobile =$_POST['mobile'];

$sql="INSERT INTO order_product (fname, lname,address,mobile,totalPrice)
VALUES ('$Fname','$Lname','$Address','$Mobile','" . $_SESSION["sum_Price"] . "')";
mysqli_query($conn,$sql);
// echo "<script> alert('Success')</script>";
$orderID = mysqli_insert_id($conn);
$_SESSION["orderID"] = $orderID;
for($i=0; $i<=(int)$_SESSION["intLine"]; $i++ ){
    if( ($_SESSION["strProductID"][$i]) != "") {
        $sql2 = "SELECT * FROM product WHERE id = '" . $_SESSION["strProductID"][$i] . "' "; 
        $result2 = mysqli_query($conn,$sql2);
        $row2 = mysqli_fetch_array($result2);
        $price = $row2['price'];
        $Total = $_SESSION["strQty"][$i] * $price;
        
        $sql3 = "INSERT INTO order_checkout(orderID,id,orderPrice,orderQty,total)
        VALUES ('$orderID','" . $_SESSION["strProductID"][$i] . "','$price', 
        '" . $_SESSION["strQty"][$i] . "', '$Total' )";
        if(mysqli_query($conn,$sql3)){ //อัพเดตข้อมูลผ่านไหม
            echo "<script> window.location='printOrder.php';</script>";
         }
    }
}
mysqli_close($conn);
unset($_SESSION["inLine"]);
unset($_SESSION["strProductID"]);
unset($_SESSION["strQty"]);
unset($_SESSION["sum_Price"]);
// session_destroy(); //]  ]ล้าง session

?>