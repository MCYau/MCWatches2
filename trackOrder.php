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
<?php
$sql = 'SELECT * FROM orders WHERE userName="'.$_SESSION['username'].'"';
$result = mysqli_query($con, $sql);
$trackResult = mysqli_fetch_all($result, MYSQLI_ASSOC);
foreach ($trackResult as $trackResult){
    ?>
    <div class="trackitem-container">
    <div class="trackitem-table" style="float: left; background: #ffffff; margin: 30px 30px 0px 0px; border: #E0E0E0 1px solid; min-height: 500px; max-height: 500px;">
    <div style="height: 300px; width: 500px; background-color: #FFF; display:flex; justify-content:center"><img src="<?php echo $trackResult["image"]; ?>" height="300px" class="tracking-cart" /></td></div>
    <div  style="text-align:right;"><?php echo $trackResult["orderedItem"];?></div>
    <div  style="text-align:right;"><?php echo $trackResult["quantity"];?></div>
    <div  style="text-align:right;"><?php echo "$".$trackResult["totalPrice"];?></div>
    <div  style="text-align:right;"><?php echo $trackResult["address"];?></div>
    <div  style="text-align:right;"><?php echo $trackResult["zip"];?></div>
    <div  style="text-align:right;"><?php echo $trackResult["orderDate"];?></div>
       
       <?php
       }
       ?>
       </html>
    <?php
    include("footer.php");
    ?>