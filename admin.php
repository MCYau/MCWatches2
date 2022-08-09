<?php
include("header.php");
include("db.php");
$username = $_SESSION['username'];
$adminQuery    = "SELECT * FROM `users` WHERE username='$username' AND isAdmin = 1";
$adminResult = mysqli_query($con, $adminQuery);
$adminRows = mysqli_num_rows($adminResult);
        if ($adminRows == 1){
        } else {
            echo "<script>alert('Access Denied : You are not an admin !') ; window.location.href = 'index.php'</script>";
        }
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Admin Page</title>
      <style>
         label{
            margin-left: 130px;
         }
      </style>
   </head>
   <body>
   <div style="display: flex; justify-content: center;" >
   
      <div style="border: 1px solid rgba(0, 136, 169, 1); width: 40%; color: rgba(0, 136, 169, 1); height:500px;">
         <h1 style="margin-left: 180px; margin-bottom: 30px; margin-top: 10px;">Add a product into Database</h1>
         <form action="addProduct.php" method="post" enctype="multipart/form-data">


<p>
               <label for="name">Product Name:</label>
               <input type="text" name="name" id="name" style="margin-left: 60px;" required>
            </p>
 
             
<p>
   <br>
               <label for="code">Product Code:</label>
               <input type="text" name="code" id="code" style="margin-left: 65px;" required>
            </p>
 
             
<p>
   <br>
               <label for="image">Image:</label>
               <input class="form-control" type="file" name="uploadfile" value="" style="margin-left: 115px;" required/>
            </p>

            <p>
               <br>
               <label for="descp">Product Description:</label>
               <br>
               <textarea name="descp" id="descp" cols="30" rows="10" maxlength="500" oninput="countWord()" style="margin-left: 290px; margin-top:-20px;"></textarea>
               <br><br>
               <p style="margin-left: 310px; margin-top: -15px;"> Remaining Characters:
                  <span id="show">500</span>
               </p>
               <script>
                  function countWord() {
            
                        // Get the input text value
                        var words = document
                           .getElementById("descp").value;
            
                        // Initialize the word counter
                        var count = 0;
            
                        // Split the words on each
                        // space character
                        var split = words.split(' ');
            
                        // Loop through the words and
                        // increase the counter when
                        // each split word is not empty
                        for (var i = 0; i < words.length; i++) {
                              count += 1;
                        }

                        var remainingChar = 500 - count;
            
                        // Display it as output
                        document.getElementById("show")
                           .innerHTML = remainingChar;
                  }
               </script>
            </p>
 
             
<p>
   <br>
               <label for="price">Price:</label>
               <input type="text" name="price" id="price" style="margin-left: 125px;" required>
            </p>
 <br>
            <input type="submit" value="Submit" style="margin-left: 300px; margin-bottom: 20px; padding: 7px; cursor: pointer;">
         </form>
         
      </div>
      
   </div>
  
   </body>
   <br>
   <h1>List of existing products</h1>
   <div id="existing-products" style="display: flex;">
      <?php
         $sql = 'SELECT * FROM tblproduct';
         $result = mysqli_query($con,$sql);
         $item = mysqli_fetch_all($result, MYSQLI_ASSOC);
      ?>
      <div>
      <?php
         foreach ($item as $item){
            ?>
                <div class="existing-product-item" style="float: left; background: #ffffff; margin: 30px 30px 0px 0px; border: #E0E0E0 1px solid; height: 520px; width: 520px;">
                    <form method="post" action="admin.php?action=del">
                    <div class="existingproduct-image" style="height: 200px; width: 500px; background-color: #FFF; display:flex; justify-content:center" ><img src="<?php echo $item["image"]; ?>" height="200"></div>
                    <div class="existingproduct-title" style="margin-bottom: 20px; margin-top:10px; margin-left:20px; font-weight:bold; font-size: 1.5em;"><?php echo $item["name"]; ?></div>
                    <div class="existingproduct-code" style="margin-bottom: 20px; margin-top:10px; margin-left:20px;"><?php echo $item["code"]; ?></div>
                    <div class="existingproduct-descp" style="margin-bottom: 20px; margin-left:20px; max-width:400px;"><?php echo $item["descp"]; ?></div>
                    <div class="existingproduct-price" style="float:left; margin-left:20px;"><?php echo "$".$item["price"]; ?></div>
                    <div><a href="admin.php?action=del&id=<?php echo $item["id"]; ?>" class="btnRemoveExisting"><img src="icon-delete.png" height="40" style="float: right;" alt="Remove Item" /></a></div>
                    </form>
                </div>
            <?php
                }
                if((isset($_GET["action"])=="del")) {
                  $sql = 'DELETE FROM tblproduct WHERE id ='.$_GET["id"].'';
                  $resultDel = mysqli_query($con,$sql);
                  if(! $resultDel){
                     die('Could not delete data:'.mysql_error());
                  }else{
                     echo "<script>alert('Product has been deleted from the database.') ; window.location.href = 'admin.php'</script>";
                  }
               }
            ?>
            </div>
  </div>
  <br>

   <div class="allOrderResult-container" style="margin: 50px 0px;">
   <h1 style="text-align: center; font-size: 3.2em;">All Orders</h1>
   <?php
   $allOrderSql = 'SELECT * FROM orders';
   $allOrderQuery = mysqli_query($con, $allOrderSql);
   $allOrderResult = mysqli_fetch_all($allOrderQuery, MYSQLI_ASSOC);
   foreach ($allOrderResult as $allOrderResult){
      ?>
      <form method="post" action="admin.php?update&id=<?php echo $allOrderResult["id"]; ?>">
         <div class="allOrderResult-table" style="float: left; background: #ffffff; margin: 30px 30px 0px 0px; border: #E0E0E0 1px solid; height:540px; width: 560px; padding: 10px;">
         <div style="text-align: center;"><img src="<?php echo $allOrderResult["image"]; ?>" height="150px"/></td></div>
         <div  style="margin:5px 20px; font-weight:bold; font-size: 1.5em;"><h3 style="color: rgba(0, 136, 169, 1)"><?php echo $allOrderResult["orderedItem"];?><h3></div>
         <div  style="margin:5px 20px; font-size: 1.2em; font-weight:bold;">Order ID<b style="margin-left: 65px;"><?php echo $allOrderResult["id"];?></b></div>
         <div  style="margin:5px 20px; font-size: 1.2em; font-weight:bold;">Username<b style="margin-left: 60px;"><?php echo $allOrderResult["userName"];?></b></div>
         <div  style="margin:5px 20px; font-size: 1.2em; font-weight:bold;">Quantity<b style="margin-left: 70px;"><?php echo $allOrderResult["quantity"];?></b></div>
         <div  style="margin:5px 20px; font-size: 1.2em; font-weight:bold;">Price<b style="margin-left: 100px;"><?php echo "$".$allOrderResult["totalPrice"];?></b></div>
         <div  style="margin:5px 20px; font-size: 1.2em; font-weight:bold;">Address<b style="margin-left: 75px;"><?php echo $allOrderResult["address"];?></b></div>
         <div  style="margin:5px 20px; font-size: 1.2em; font-weight:bold;">Zip<b style="margin-left: 115px;"><?php echo $allOrderResult["zip"];?></b></div>
         <div  style="margin:5px 20px; font-size: 1.2em; font-weight:bold;">Date and Time<b style="margin-left: 20px;"><?php echo $allOrderResult["orderDate"];?></b></div>
         <div  style="margin:5px 20px; font-size: 1.2em; font-weight:bold;">Current Status<b style="margin-left: 18px;" id="orderStatus"><?php echo $allOrderResult["orderStatus"];?></b></div>
         <div  style="margin:5px 20px; font-size: 1.2em; font-weight:bold;">
            Change Status
            <select style="margin-left: 15px;" name="orderStatus" style="width: 150px;">
               <option value="Order Received">Order Received</option>
               <option value="In Delivery">In Delivery</option> 
               <option value="Order Delivered">Order Delivered</option>  
            </select>
         <div style="margin-top: 10px;"><input type="submit" name="submit" value="Update" style="padding: 7px; cursor: pointer;"></a></div>
         </div>
      </form>
   </div>
   <?php
   }
      if(isset($_REQUEST["submit"])) {
         $orderStatus =  $_REQUEST['orderStatus'];
         echo $orderStatus;
         $updateSql = 'UPDATE orders SET orderStatus="'.$orderStatus.'" WHERE id="'.$_GET["id"].'"';
         $resultUpdate = mysqli_query($con,$updateSql);
         if(! $resultUpdate){
            die('Could not delete data:'.mysql_error());
         }else{
            echo "<script>alert('Status update successfully.') ; window.location.href = 'admin.php'</script>";
         }
      }
      ?>
</html>