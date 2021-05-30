<?php

session_start();

include 'include/headeruser.php';
include '../include/database.php';
?>

<div class="container">
<div class="row">

  <h2><center>My profile</center></h2>
 <div class="col-sm-12 blog-main bg-dark text-white p-2">



  <?php 

  $db = new database(); 
  
  $usrid = $_SESSION['user'];


 $qry1 = "SELECT * from  user WHERE email = '$usrid' ";
 $data = $db->select($qry1);
 if($data) {
 while ($row = $data->fetch_array()): ?> 

 <form action="upd_userProfile.php" method="post">
  <div class="form-group">
    <label>User Name: </label>
    <input type="text" name="userName" class="form-control"  value="<?php echo $row['user_name'];?>" readonly>
  </div>
    <div class="form-group">
    <label>Email: </label>
    <input type="Email" name="userEmail" class="form-control"  value="<?php echo $row['email'];?>"
    readonly>
  </div>
  <div class="form-group">
    <label>Mobile No </label>
    <input type="text" name="umobile" class="form-control"  value="<?php echo $row['mobile_no'];?>"
    readonly>
  </div>
    <div class="form-group">
    <label>Password:</label>
    <input type="Password" name="userPass" class="form-control"  value="<?php echo $row['password'];?>" readonly>
  </div>
<?php endwhile; }?>
  <a href="users.php" class="btn btn-danger">Cancel</a>
  </form>
      </table>
        </div>