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
</html>