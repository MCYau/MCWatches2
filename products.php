<?php
//session_start();
include("header.php");
include("auth_session.php"); // new
require_once("db.php");
date_default_timezone_set('Asia/Singapore');
$db_handle = new DBController();
//Switch case to find out user action
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
<TITLE>Products</TITLE>
</HEAD>
<a href="trackorder.php" style="border: 4px solid rgba(0, 136, 169, 1); border-radius: 5px; margin-left: 40px; padding: 10px; color: rgba(0, 136, 169, 1)">Track Your Order</a>
<BODY style="font-family: Arial; color: #211a1a; font-size: 0.9em; background-color: white;">
<div id="shopping-cart" style="margin: 40px;">
<div class="txt-heading" style="color: #211a1a; border-bottom: 1px solid #E0E0E0; overflow: auto; font-weight: bold; font-size: 1.5em;">Shopping Cart</div>

<a id="btnEmpty" href="products.php?action=empty" style="background-color: #ffffff;border: #d00000 1px solid; padding: 5px 10px; color: #d00000;
	float: right;
	text-decoration: none;
	border-radius: 3px;
	margin: 10px 0px;">Empty Cart</a>
<?php
//header for cart
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1" style="width: 100%; background-color: #F0F0F0; font-size: 1.2em;">
<tbody>
<tr>
<th style="text-align:center; width:500px;" width="20%">Name</th>
<th style="text-align:center; width:200px;">Code</th>
<th style="text-align:center; width:150px;" width="5%">Quantity</th>
<th style="text-align:center;" width="10%">Unit Price</th>
<th style="text-align:center;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
<th style="text-align:center;" rowspan="100">
<!-- Shipping Details -->
<div class="wrapper" style="text-align:left; padding: 10px 50px;">
            <div class="container">
                <form method="post" action="products.php?action=checkout">
                    <h2 style="margin-bottom: 20px;">
                        <i class="fas fa-shipping-fast"></i>
                        Shipping Details
                    </h2>
                    <div class="name" style="margin-bottom: 10px;">
                        <div>
                            <label for="fullname" >Full Name</label>
                            <input type="text" name="fullname" required placeholder="Your Name" style="font-size: 1.1em; padding-left:10px; margin-left: 55px;">
                        </div>
                    </div>
                    <div class="address-info">
                        <div style="margin-bottom: 10px;">
                            <label for="address">Address</label>
                            <input type="text" name="address" required placeholder="Your Address" style="font-size: 1.1em; padding-left:10px; margin-left: 70px;">
                        </div>
                        <div>
                            <label for="zip">Zip</label>
                            <input type="text" maxlength="6" name="zip" required placeholder="6 digits Zip code" style="font-size: 1.1em; padding-left:10px; margin-left: 115px;">
                        </div>
                    </div>
                    <h2 style="margin-bottom: 20px; margin-top: 100px;">
                        <i class="far fa-credit-card"></i> Payment Information
                    </h2>
                    <div class="cc-num" style="margin-bottom: 10px;">
                        <label for="card-num">Credit Card No.</label>
                        <input type="text" maxlength="16" name="card-num" style="font-size: 1.1em; padding-left:10px; margin-left: 15px;" required placeholder="xxxx xxxx xxxx xxxx" >
                    </div>
                    <div class="cc-info">
                        <div style="margin-bottom: 10px;">
                            <label for="card-num">Expiry Date</label>
							<select style="margin-left: 11%; font-size: 1.1em;">
								<option>Month</option>
								<option>01</option>
								<option>02</option>
								<option>03</option>
								<option>04</option>
								<option>05</option>
								<option>06</option>
								<option>07</option>
								<option>08</option>
								<option>09</option>
								<option>10</option>
								<option>11</option>
								<option>12</option>
							</select>
							<select style="font-size: 1.1em;">
								<option>Year</option>
								<option>2022</option>
								<option>2023</option>
								<option>2024</option>
								<option>2025</option>
								<option>2026</option>
								<option>2027</option>
								<option>2028</option>
								<option>2029</option>
								<option>2030</option>
								<option>2031</option>
								<option>2032</option>
								<option>2033</option>
							</select>							
                        </div>
                        <div>
                            <label for="card-num">CCV</label>
                            <input type="text" maxlength="3" name="security" style="font-size: 1.1em; padding-left:10px; margin-left: 105px;" required placeholder="xxx">
                        </div>
                    </div>
                    <div class="btns">
						<br>
                        <input type="submit" value="Purchase" style="border: 4px solid rgba(0, 136, 169, 1); border-radius: 5px; padding: 10px; color: rgba(0, 136, 169, 1)">
                    </div>
                </form>
            </div>
        </div>

</th>
</tr>	
<!-- Table for cart -->
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
				margin-right: 15px; margin-left: 35px; margin-top: 15px; margin-bottom: 15px;"/><?php echo $item["name"]; ?></td>
				<td style="text-align:center;"><?php echo $item["code"]; ?></td>
				<td style="text-align:center;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:center;"><?php echo "$ ".$item["price"]; ?></td>
				<td  style="text-align:center;"><?php echo "$ ". number_format($item_price,2); ?></td>
				<td style="text-align:center;"><a href="products.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
				$subTotal = $item["price"] * $item["quantity"];
				//Query for checkout
				if(isset($_GET["action"]) && $_GET["action"]=="checkout"){
					$address = $_POST['address'];
					$zip = $_POST['zip'];
					$checkoutsql = 'INSERT INTO orders VALUES (NULL,"'.$_SESSION['username'].'",
					"'.$item['name'].'","'.$item['quantity'].'","'.$subTotal.'","'.$item['image'].'","'.$orderDateTime.'", "'.$address.'", "'.$zip.'",default)';
					if(mysqli_query($con, $checkoutsql)){
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
<td style="text-align:center;"><?php echo $total_quantity; ?></td>
<td style="padding-left:240px;" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
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
<!-- Table for all available products -->
<div id="product-grid" style="margin: 40px;">
	<div class="txt-heading" style="margin-bottom: 18px;">Products</div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item" style="float: left; background: #ffffff; margin: 30px 30px 0px 0px; border: #E0E0E0 1px solid; min-height: 600px; max-height: 500px;">
			<form method="post" action="products.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<div class="product-image" style="height: 300px; width: 500px; background-color: #FFF; display:flex; justify-content:center" ><img src="<?php echo $product_array[$key]["image"]; ?>" height="300"></div>
			<div class="product-tile-footer">
			<div class="product-title" style="margin-bottom: 20px; margin-top:10px; margin-left:20px; font-weight:bold; font-size: 1.5em;"><?php echo $product_array[$key]["name"]; ?></div>
			<div class="product-descp" style="margin-bottom: 20px; margin-left:20px; max-width:400px; font-size: 1.2em; overflow: auto;"><?php echo $product_array[$key]["descp"]; ?></div>
			<div class="product-price" style="float:left;  margin-left:20px; font-size: 1.2em; font-weight:bold;"><?php echo "$".$product_array[$key]["price"]; ?></div>
			<div class="cart-action" style="float: right;"><input type="text" class="product-quantity" name="quantity" value="1" size="2" style="padding: 5px 10px; font-size: 1.2em;
    		border-radius: 3px;
    		border: #E0E0E0 1px solid;"/><input type="submit" value="Add to Cart" class="btnAddAction" style="padding: 5px 10px;
			margin-left: 5px;
			background-color: #efefef;
			border: rgba(0, 136, 169, 1) 1px solid;
			color: rgba(0, 136, 169, 1);
			float: right;
			text-decoration: none;
			border-radius: 3px;
			cursor: pointer;
			font-size: 1.2em;"/></div>
			</div>
			</form>
		</div>

	<?php
		}
	}
	?>	

</BODY>
</HTML>
	<?php
	include("footer.php");
	?>
