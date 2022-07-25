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
               <input type="text" name="name" id="name" style="margin-left: 60px;">
            </p>
 
             
<p>
   <br>
               <label for="code">Product Code:</label>
               <input type="text" name="code" id="code" style="margin-left: 65px;">
            </p>
 
             
<p>
   <br>
               <label for="image">Image:</label>
               <input class="form-control" type="file" name="uploadfile" value="" style="margin-left: 115px;"/>
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
               <input type="text" name="price" id="price" style="margin-left: 125px;">
            </p>
 <br>
            <input type="submit" value="Submit" style="margin-left: 300px; margin-bottom: 20px; padding: 7px;">
         </form>
         
      </div>
      
   </div>
  
   </body>
   <br>
   <div id="existing-products">
      <center>
      <h1>List of existing products</h1>
      </center>
      <?php
         $sql = 'SELECT * FROM tblproduct';
         $result = mysqli_query($con,$sql);
         $item = mysqli_fetch_all($result, MYSQLI_ASSOC);
         foreach ($item as $item){
            ?>
                <div class="existing-product-item" style="float: left; background: #ffffff; margin: 30px 30px 0px 0px; border: #E0E0E0 1px solid; max-height: 450px; min-height: 450px;">
                    <form method="post" action="admin.php?action=del">
                    <div class="existingproduct-image" style="height: 200px; width: 500px; background-color: #FFF; display:flex; justify-content:center" ><img src="<?php echo $item["image"]; ?>" height="200"></div>
                    <div class="existingproduct-title-footer">
                    <div class="existingproduct-title" style="margin-bottom: 20px; margin-top:10px; margin-left:20px; font-weight:bold; font-size: 1.5em;"><?php echo $item["name"]; ?></div>
                    <div class="existingproduct-code" style="margin-bottom: 20px; margin-top:10px; margin-left:20px;"><?php echo $item["code"]; ?></div>
                    <div class="existingproduct-descp" style="margin-bottom: 20px; margin-left:20px; max-width:400px;"><?php echo $item["descp"]; ?></div>
                    <div class="existingproduct-price" style="float:left; margin-left:20px;"><?php echo "$".$item["price"]; ?></div>
                    <div><a href="admin.php?action=del&id=<?php echo $item["id"]; ?>" class="btnRemoveExisting"><img src="icon-delete.png" height="40" style="float: right;" alt="Remove Item" /></a></div>
                    </div>
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
      </form>
      </div>
  </div>



   
</html>