<?php
//session_start();
include("auth_session.php"); // new
require_once("db.php");
?>

<HTML>
<HEAD>
<TITLE>Simple PHP Shopping Cart</TITLE>
<link href="productsStyle.css" type="text/css" rel="stylesheet" />
</HEAD>
<p>Hey, <?php echo $_SESSION['username']; ?>!</p>
<a href="logout.php">Logout</a>
<a href="products.php">Back to Product</a>

<?php
$sql = 'SELECT * FROM orders WHERE userName="'.$_SESSION['username'].'"';
$result = mysqli_query($con, $sql);
$trackResult = mysqli_fetch_all($result, MYSQLI_ASSOC);
foreach ($trackResult as $trackResult){
    ?>
    <div class="trackitem-container">
    <div class="trackitem-table">
    <div><img src="<?php echo $trackResult["image"]; ?>" width="100px" class="tracking-cart" /></td></div>
    <div  style="text-align:right;"><?php echo $trackResult["orderedItem"];?></div>
    <div  style="text-align:right;"><?php echo $trackResult["quantity"];?></div>
    <div  style="text-align:right;"><?php echo "$".$trackResult["totalPrice"];?></div>
    <div  style="text-align:right;"><?php echo $trackResult["orderDate"];?></div>
       
       <?php
       }
       ?>