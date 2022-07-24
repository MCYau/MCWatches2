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
      <center>
      <h1>List of existing products</h1>
      </center>
      <?php
         include 'db.php';
         $sql = 'SELECT * FROM tblproduct';
         $result = mysqli_query($con,$sql);
         $item = mysqli_fetch_all($result, MYSQLI_ASSOC);
         foreach ($item as $item){
            ?>
                <div class="existing-product-item" style="float: left; background: #ffffff; margin: 30px 30px 0px 0px; border: #E0E0E0 1px solid;">
                    <form method="post" action="admin.php?action=del">
                    <div class="existingproduct-image" style="height: 200px; width: 500px; background-color: #FFF; display:flex; justify-content:center" ><img src="<?php echo $item["image"]; ?>" height="200"></div>
                    <div class="existingproduct-title-footer">
                    <div class="existingroduct-title" style="margin-bottom: 20px; margin-top:10px; margin-left:20px; font-weight:bold; font-size: 1.5em;"><?php echo $item["name"]; ?></div>
                    <div class="existingroduct-code" style="margin-bottom: 20px; margin-top:10px; margin-left:20px;"><?php echo $item["code"]; ?></div>
                    <div class="existingroduct-descp" style="margin-bottom: 20px; margin-left:20px; max-width:400px;"><?php echo $item["descp"]; ?></div>
                    <div class="existingproduct-price" style="float:left; margin-left:20px;"><?php echo "$".$item["price"]; ?></div>
                    <div><a href="admin.php?action=del&id=<?php echo $item["id"]; ?>" class="btnRemoveExisting"><img src="icon-delete.png" height="40" style="float: right;" alt="Remove Item" /></a></div>
                    </div>
                    </form>
                </div>
            <?php
                }
            ?>
      </form>
      </div>
  </div>



   
</html>
<!--         <td style="text-align:center;"><a href="products.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>