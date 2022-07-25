<?php
include("header.php");
include("auth_session.php"); // new
require_once("db.php");
$username = $_SESSION['username'];
$adminQuery    = "SELECT * FROM `users` WHERE username='$username' AND isAdmin = 1";
$adminResult = mysqli_query($con, $adminQuery);
$adminRows = mysqli_num_rows($adminResult);
        if ($adminRows == 1){
        } else {
            echo "<script>alert('Access Denied : You are not an admin !') ; window.location.href = 'index.php'</script>";
        }
$contactusquery = 'SELECT * FROM feedback';
$result = mysqli_query($con, $contactusquery);
$trackResult = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<html>
<table border ="1" cellspacing="0" cellpadding="10">
  <tr>
    <th>Name</th>
    <th>Email</th>
    <th>Message</th>
    <th>Delete Message</th>
  </tr>
  <?php
  foreach ($trackResult as $trackResult){
  ?>
  <tr>
      <td><?php echo $trackResult['name']; ?></td>
      <td><?php echo $trackResult['email']; ?></td>
      <td><?php echo $trackResult['msg']; ?></td>
      <td><a href="trackcontactus.php?action=del&id=<?php echo $trackResult["id"]; ?>"class="btnRemoveMessage"><img src="icon-delete.png" height="40"/>
     </tr>
  <?php
  }
  ?>
</html>
<?php
if((isset($_GET["action"])=="del")) {
    $sql = 'DELETE FROM feedback WHERE id ='.$_GET["id"].'';
    $resultDel = mysqli_query($con,$sql);
    if(! $resultDel){
       die('Could not delete data:'.mysql_error());
    }else{
       echo "<script>alert('Product has been deleted from the database.') ; window.location.href = 'trackcontactus.php'</script>";
    }
}
include("footer.php");
?>