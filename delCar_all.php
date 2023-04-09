<!-- ใช้ในการลบตะกร้าสินค้าทั้งหมดของ Cart.php -->
<?php
ob_start();
session_start();

// if(isset($_GET["Line"]))
// {
    // $Line = $_GET["Line"];
    $_SESSION["strProductID"] = null;
    $_SESSION["strQty"]= null;
// }
?>
<script>
    window.alert("The product has been removed from the cart successfully.");
    window.location.replace("Cart.php");
</script>