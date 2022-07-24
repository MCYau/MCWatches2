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
   <div style="display: flex; justify-content: center;">
      <div style="border: 1px solid black; width: 40%; background-color: #F5EBFF;">
         <h1 style="margin-left: 180px;">Add a product into Database</h1>
         <form action="addProduct.php" method="post" enctype="multipart/form-data"> <!--new-->


<p>
               <label for="name">Product Name:</label>
               <input type="text" name="name" id="name" style="margin-left: 30px;">
            </p>
 
             
<p>
               <label for="code">Product Code:</label>
               <input type="text" name="code" id="code" style="margin-left: 35px;">
            </p>
 
             
<p>
               <label for="image">Image:</label>
               <!--<input type="text" name="image" id="image">-->
               <input class="form-control" type="file" name="uploadfile" value="" style="margin-left: 80px;"/><!--new-->
            </p>

            <p>
               <label for="descp">Product Description:</label>
               <textarea name="descp" id="descp" cols="30" rows="10" maxlength="500" oninput="countWord()"></textarea>
               <p style="margin-left: 280px;"> Remaining Characters:
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
               <label for="price">Price:</label>
               <input type="text" name="price" id="price" style="margin-left: 100px;">
            </p>
 
            <input type="submit" value="Submit" style="margin-left: 300px; margin-bottom: 20px;">
         </form>
      </div>
   </div>
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
         <div><img src="<?php echo $item["image"]; ?>" width="100px" height="100px" class="existing-cart" /></div>
         <div><?php echo $item["name"]; ?></div>
         <div><?php echo $item["code"]; ?></div>
         <div><?php echo $item["id"];?></div>
         <div><?php echo "$".$item["price"];?></div>
         <div><a href="admin.php?action=del&id=<?php echo $item["id"]; ?>" class="btnRemoveExisting"><img src="icon-delete.png" alt="Remove Item" /></a></div>
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