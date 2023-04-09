<!-- ใช้ในการลบสินค้าบางรายการของ Cart.php -->
<?php
	ob_start();
	session_start();
    
	
	if(isset($_GET["Line"]))
	{
		$Line = $_GET["Line"];
		$_SESSION["strProductID"][$Line] = "";
		$_SESSION["strQty"][$Line] = "";
	}
	header("location:Cart.php");
?>