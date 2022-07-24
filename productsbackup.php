<?php
//session_start();
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
<p>Hey, <?php echo $_SESSION['username']; ?>!</p>
<a href="logout.php">Logout</a>
<a href="trackorder.php">Track Order</a>
<BODY>
<div id="shopping-cart">
<div class="txt-heading">Shopping Cart</div>

<a id="btnEmpty" href="products.php?action=empty">Empty Cart</a>
<?php
if(isset($_SESSION["cart_item"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">Code</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:center;" width="5%">Remove</th>
<th style="text-align:center;"><a href="products.php?action=checkout">Check Out</a></th>
</tr>	
<?php	
	$username = $_SESSION['username'];
	$orderDateTime = date("Y-m-d H:i:s");
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
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
					$checkoutsql = 'INSERT INTO orders VALUES (NULL, "'.$_SESSION['username'].'",
					"'.$item['name'].'","'.$item['quantity'].'","'.$subTotal.'","'.$item['image'].'","'.$orderDateTime.'")';
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
<div class="no-records">Your Cart is Empty</div>
<?php 
}
?>
</div>

<div id="product-grid">
	<div class="txt-heading">Products</div>
	<?php
	$product_array = $db_handle->runQuery("SELECT * FROM tblproduct ORDER BY id ASC");
	if (!empty($product_array)) { 
		foreach($product_array as $key=>$value){
	?>
		<div class="product-item">
			<form method="post" action="products.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>" width="150"></div>
			<div class="product-tile-footer">
			<div class="product-title"><?php echo $product_array[$key]["name"]; ?></div>
			<div class="product-descp"><?php echo $product_array[$key]["descp"]; ?></div>
			<div class="product-price"><?php echo "$".$product_array[$key]["price"]; ?></div>
			<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
			</div>
			</form>
		</div>

	<?php
		}
	}
	?>

<div class="wrapper">
            <div class="container">
                <form action="">
                    <h1>
                        <i class="fas fa-shipping-fast"></i>
                        Shipping Details
                    </h1>
                    <div class="name">
                        <div>
                            <label for="f-name">First</label>
                            <input type="text" name="f-name">
                        </div>
                        <div>
                            <label for="l-name">Last</label>
                            <input type="text" name="l-name">
                        </div>
                    </div>
                    <div class="street">
                        <label for="name">Street</label>
                        <input type="text" name="address">
                    </div>
                    <div class="address-info">
                        <div>
                            <label for="city">City</label>
                            <input type="text" name="city">
                        </div>
                        <div>
                            <label for="state">State</label>
                            <input type="text" name="state">
                        </div>
                        <div>
                            <label for="zip">Zip</label>
                            <input type="text" name="zip">
                        </div>
                    </div>
                    <h1>
                        <i class="far fa-credit-card"></i> Payment Information
                    </h1>
                    <div class="cc-num">
                        <label for="card-num">Credit Card No.</label>
                        <input type="text" name="card-num">
                    </div>
                    <div class="cc-info">
                        <div>
                            <label for="card-num">Exp</label>
                            <input type="text" name="expire">
                        </div>
                        <div>
                            <label for="card-num">CCV</label>
                            <input type="text" name="security">
                        </div>
                    </div>
                    <div class="btns">
                        <button>Purchase</button>
                        <button>Back to cart</button>
                    </div>
                </form>
            </div>
        </div>

</div>

	
</BODY>
</HTML>