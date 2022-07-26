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
<head>
  <title>Show Feedback</title>
</head>
<h1 style="text-align: center; font-size: 4em;">All Feedback</h1><br><br>
  <?php
  foreach ($trackResult as $trackResult){
  ?>
  <div style="padding: 20px; float: left;">
  <table border ="1" cellspacing="0" cellpadding="10" style="font-size: 1.8em;">
   <tr >
      <td style="padding: 5px 15px; font-weight: bold;">Name</td>
      <td style="padding: 5px 15px;"><?php echo $trackResult['name']; ?><a style="float: right;"href="trackcontactus.php?action=del&id=<?php echo $trackResult["id"]; ?>"class="btnRemoveMessage"><img src="icon-delete.png" height="25"/></td>
    </tr>
    <tr>
      <td style="padding: 5px 15px; font-weight: bold;">Email</td>
      <td style="padding: 5px 15px;"><?php echo $trackResult['email']; ?></td>
    </tr>
    <tr>
      <td style="padding: 5px 15px; font-weight: bold;">Message</td>
      <td style="padding: 15px 15px;"><div style="height: 400px; width: 400px; overflow: auto;"><?php echo $trackResult['msg']; ?></div></td>
     </tr>
  </table>
  </div>
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
       echo "<script>alert('Feedback has been deleted.') ; window.location.href = 'trackcontactus.php'</script>";
    }
}
include("footer.php");
?>