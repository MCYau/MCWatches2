<?php
//session_start();
include("auth_session.php"); // new
require_once("db.php");
include("header.php");
?>

<html>
<HEAD>
<TITLE>Track Order</TITLE>
<link href="productsStyle.css" type="text/css" rel="stylesheet" />
</HEAD>
<br>
<h1 style="text-align: center; font-size: 3.2em;">Order History</h1>
<?php
$sql = 'SELECT * FROM orders WHERE userName="'.$_SESSION['username'].'"';
$result = mysqli_query($con, $sql);
$trackResult = mysqli_fetch_all($result, MYSQLI_ASSOC);
foreach ($trackResult as $trackResult){
    ?>
    <div class="trackitem-container">
    <div class="trackitem-table" style="background: #ffffff; margin: 30px 30px 0px 0px; border: #E0E0E0 1px solid; height:450px; width: 560px; float: left; padding: 10px;">
    <div style="text-align: center;"><img src="<?php echo $trackResult["image"]; ?>" height="150px" class="tracking-cart" /></td></div>
    <div  style="margin:5px 20px; font-weight:bold; font-size: 1.5em;"><h3 style="color: rgba(0, 136, 169, 1)"><?php echo $trackResult["orderedItem"];?><h3></div>
    <div  style="margin:5px 20px; font-size: 1.2em; font-weight:bold;">Order ID<b style="margin-left: 65px;"><?php echo $trackResult["id"];?></b></div>
    <div  style="margin:5px 20px; font-size: 1.2em; font-weight:bold;">Quantity<b style="margin-left: 70px;"><?php echo $trackResult["quantity"];?></b></div>
    <div  style="margin:5px 20px; font-size: 1.2em; font-weight:bold;">Price<b style="margin-left: 100px;"><?php echo "$".$trackResult["totalPrice"];?></b></div>
    <div  style="margin:5px 20px; font-size: 1.2em; font-weight:bold;">Address<b style="margin-left: 75px;"><?php echo $trackResult["address"];?></b></div>
    <div  style="margin:5px 20px; font-size: 1.2em; font-weight:bold;">Zip<b style="margin-left: 115px;"><?php echo $trackResult["zip"];?></b></div>
    <div  style="margin:5px 20px; font-size: 1.2em; font-weight:bold;">Date and Time<b style="margin-left: 20px;"><?php echo $trackResult["orderDate"];?></b></div>
    <div  style="margin:5px 20px; font-size: 1.2em; font-weight:bold;">Order Status<b style="margin-left: 35px;" class="orderStatus"><?php echo $trackResult["orderStatus"];?></b></div>
    </div>
       
       <?php
       }
       ?>
       </html>
    <?php
    include("footer.php");
    ?>