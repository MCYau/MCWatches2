<?php
//session_start();
include("header.php");
include("auth_session.php"); // new
require_once("db.php");
date_default_timezone_set('Asia/Singapore');
$db_handle = new DBController();
if(!empty($_GET["action"])) {
switch($_GET["action"]) {
	case "add":
		if(!empty($_POST["quantity"])) {
			$productByCode = $db_handle->runQuery("SELECT * FROM tblproduct WHERE code='" . $_GET["code"] . "'");
			$itemArray = array($productByCode[0]["code"]=>array('name'=>$productByCode[0]["name"], 'code'=>$productByCode[0]["code"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["price"], 'image'=>$productByCode[0]["image"]));
			
			if(!empty($_SESSION["cart_item"])) {
				if(in_array($productByCode[0]["code"],array_keys($_SESSION["cart_item"]))) {
					foreach($_SESSION["cart_item"] as $k => $v) {
							if($productByCode[0]["code"] == $k) {
								if(empty($_SESSION["cart_item"][$k]["quantity"])) {
									$_SESSION["cart_item"][$k]["quantity"] = 0;
								}
								$_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
							}
					}
				} else {
					$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
				}
			} else {
				$_SESSION["cart_item"] = $itemArray;
			}
		}
	break;
	case "remove":
		if(!empty($_SESSION["cart_item"])) {
			foreach($_SESSION["cart_item"] as $k => $v) {
					if($_GET["code"] == $k)
						unset($_SESSION["cart_item"][$k]);				
					if(empty($_SESSION["cart_item"]))
						unset($_SESSION["cart_item"]);
			}
		}
	break;
	case "empty":
		unset($_SESSION["cart_item"]);
	break;	
}
}
?>
<HTML>
<HEAD>
<TITLE>Simple PHP Shopping Cart</TITLE>
<link href="productsStyle.css" type="text/css" rel="stylesheet" />
</HEAD>
<a href="trackorder.php">Track Order</a>
<BODY style="font-family: Arial; color: #211a1a; font-size: 0.9em; background-color: white;">
<div id="shopping-cart" style="margin: 40px;">
<div class="txt-heading" style="color: #211a1a; border-bottom: 1px solid #E0E0E0; overflow: auto;">Shopping Cart</div>

<a id="btnEmpty" href="products.php?action=empty" style="background-color: #ffffff;border: #d00000 1px solid; padding: 5px 10px; color: #d00000;
	float: right;
	text-decoration: none;
	border-radius: 3px;
	margin: 10px 0px;">Empty Cart</a>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1" style="width: 100%; background-color: #F0F0F0; font-size: 0.9em;">
<tbody>
<tr>
<th style="text-align:left;" width="20%">Name</th>
<th style="text-align:left;">Code</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
<th style="text-align:center;" rowspan="100">

<div class="wrapper">
            <div class="container">
                <form method="post" action="products.php?action=checkout">
                    <h1>
                        <i class="fas fa-shipping-fast"></i>
                        Shipping Details
                    </h1>
                    <div class="name">
                        <div>
                            <label for="fullname" >Full Name</label>
                            <input type="text" name="fullname" required placeholder="Your Name">
                        </div>
                    </div>
                    <div class="address-info" style="margin-top:10px;">
                        <div>
                            <label for="address">Address</label>
                            <input type="text" name="address" required placeholder="Your Address">
                        </div>
                        <div>
                            <label for="zip">Zip</label>
                            <input type="number" name="zip" style="margin-top:10px;" required placeholder="6 digits Zip code">
                        </div>
                    </div>
                    <h1>
                        <i class="far fa-credit-card"></i> Payment Information
                    </h1>
                    <div class="cc-num">
                        <label for="card-num">Credit Card No.</label>
                        <input type="number" name="card-num" style="margin-top:10px;" required placeholder="xxxx xxxx xxxx xxxx">
                    </div>
                    <div class="cc-info">
                        <div>
                            <label for="card-num">Expiry Date</label>
                            <input type="text" name="expire" style="margin-top:10px;" required placeholder="mm/yy">
                        </div>
                        <div>
                            <label for="card-num">CCV</label>
                            <input type="number" name="security" style="margin-top:10px;" required placeholder="xxx">
                        </div>
                    </div>
                    <div class="btns">
						<br>
                        <input type="submit" value="Purchase">
                    </div>
                </form>
            </div>
        </div>

</th>
<!--<th style="text-align:center;"><a href="products.php?action=checkout">Check Out</a></th>-->
</tr>	
<?php	
	$username = $_SESSION['username'];
	$orderDateTime = date("Y-m-d H:i:s");
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" style="height: 150px;
				width: 150px;
				border-radius: 50%;
				border: #E0E0E0 1px solid;
				padding: 5px;
				vertical-align: middle;
				margin-right: 15px;"/><?php echo $item["name"]; ?></td>
				<td><?php echo $item["code"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="products.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
				$subTotal = $item["price"] * $item["quantity"];
				//echo "<div>.$_GET['action'].</div>";
				if(isset($_GET["action"]) && $_GET["action"]=="checkout"){
					$address = $_POST['address'];
					$zip = $_POST['zip'];
					$checkoutsql = 'INSERT INTO orders VALUES (NULL, "'.$_SESSION['username'].'",
					"'.$item['name'].'","'.$item['quantity'].'","'.$subTotal.'","'.$item['image'].'","'.$orderDateTime.'", "'.$address.'", "'.$zip.'")';
					if(mysqli_query($con, $checkoutsql)){
						//echo '<script>alert("Order has been confirmed")</script>';
						//header("Location: products.php?action=empty", TRUE, 301);	
						echo "<script>alert('Order has been confirmed.') ; window.location.href = 'products.php?action=empty'</script>";
					}else{
						echo "ERROR: Checkout $sql. "
							. mysqli_error($con);
					}
				}
		}
		
		?>
		
<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>		
  <?php
} else {
?>
<div class="no-records" style="text-align: center; clear: both; margin: 38px 0px;">Your Cart is Empty</div>
<?php 
}
?>
</div>

<div id="product-grid" style="margin: 40px;">
	<div class="txt-heading" style="margin-bottom: 18px;">Products</div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item" style="float: left; background: #ffffff; margin: 30px 30px 0px 0px; border: #E0E0E0 1px solid;">
			<form method="post" action="products.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<div class="product-image" style="height: 300px; width: 500px; background-color: #FFF; display:flex; justify-content:center" ><img src="<?php echo $product_array[$key]["image"]; ?>" height="300"></div>
			<div class="product-tile-footer">
			<div class="product-title" style="margin-bottom: 20px; margin-top:10px; margin-left:20px; font-weight:bold; font-size: 1.5em;"><?php echo $product_array[$key]["name"]; ?></div>
			<div class="product-descp" style="margin-bottom: 20px; margin-left:20px; max-width:400px;"><?php echo $product_array[$key]["descp"]; ?></div>
			<div class="product-price" style="float:left; margin-left:20px;"><?php echo "$".$product_array[$key]["price"]; ?></div>
			<div class="cart-action" style="float: right;"><input type="text" class="product-quantity" name="quantity" value="1" size="2" style="padding: 5px 10px;
    		border-radius: 3px;
    		border: #E0E0E0 1px solid;"/><input type="submit" value="Add to Cart" class="btnAddAction" style="padding: 5px 10px;
			margin-left: 5px;
			background-color: #efefef;
			border: #E0E0E0 1px solid;
			color: #211a1a;
			float: right;
			text-decoration: none;
			border-radius: 3px;
			cursor: pointer;"/></div>
			</div>
			</form>
		</div>

	<?php
		}
	}
	?>	
</BODY>
</HTML>