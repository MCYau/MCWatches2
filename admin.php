<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Admin Page</title>
   </head>
   <body>
      <center>
         <h1>Storing Form data in Database</h1>
         <form action="addProduct.php" method="post">
             
<!--<p>
               <label for="id">Product ID:</label>
               <input type="number" name="id" id="id">
            </p>-->

<p>
               <label for="name">Product Name:</label>
               <input type="text" name="name" id="name">
            </p>
 
             
<p>
               <label for="code">Product Code:</label>
               <input type="text" name="code" id="code">
            </p>
 
             
<p>
               <label for="image">Image:</label>
               <input type="text" name="image" id="image">
            </p>
 
             
<p>
               <label for="price">Price:</label>
               <input type="text" name="price" id="price">
            </p>
 
            <input type="submit" value="Submit">
         </form>
      </center>
   </body>
   <div id="existing-products">
      <?php
         include 'db.php';
         $sql = 'SELECT * FROM tblproduct';
         $result = mysqli_query($con,$sql);
         $item = mysqli_fetch_all($result, MYSQLI_ASSOC);
         foreach ($item as $item){
      ?>
      <div class="table-container">
      <div class="product-table">
         <form method="post" action="admin.php?action=del">
         <div><img src="<?php echo $item["image"]; ?>" width="100px" class="existing-cart" /><?php echo $item["name"]; ?></td></div>
         <div><?php echo $item["code"]; ?></td></div>
         <div style="text-align:right;"><?php echo $item["id"]; ?></div>
         <div style="text-align:right;"><?php echo $item["code"]; ?></div>
         <div  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></div>
         <div style="text-align:center;"><a href="admin.php?action=del&id=<?php echo $item["id"]; ?>" class="btnRemoveExisting"><img src="icon-delete.png" alt="Remove Item" /></a></div>
         <?php
         }
         if((isset($_GET["action"])=="del")) {
            $sql = 'DELETE FROM tblproduct WHERE id ='.$_GET["id"].'';
            $resultDel = mysqli_query($con,$sql);
            if(! $resultDel){
               die('Could not delete data:'.mysql_error());
            }else{
               echo "Deleted data successfully\n";
               echo "Page will now refresh";
               header( "refresh:3; url=admin.php" ); 
            }
         }
         ?>
      </div>
      </form>
      </div>
  </div>



   
</html>
<!--         <td style="text-align:center;"><a href="products.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>