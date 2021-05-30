<?php

session_start();

include 'include/header.php';
include '../include/database.php';
?>

<div class="container">
<div class="row">

  <h2><center>My profile</center></h2>
 <div class="col-sm-12 blog-main bg-dark text-white p-2">



  <?php 

  $db = new database(); 
  
  $adminId = $_SESSION['adminID'];


 $qry1 = "SELECT * from  admin WHERE id = '$adminId' ";
 $data = $db->select($qry1);
 if($data) {
 while ($row = $data->fetch_array()): ?> 

 <form action="upd_userProfile.php" method="post">
  <div class="form-group">
    <label>Admin Name: </label>
    <input type="text" class="form-control"  value="<?php echo $row['name'];?>" readonly>
  </div>
    <div class="form-group">
    <label>Email: </label>
    <input type="Email"  class="form-control"  value="<?php echo $row['email'];?>"
    readonly>
  </div>

    <div class="form-group">
    <label>Password:</label>
    <input type="Password" name="userPass" class="form-control"  value="<?php echo $row['Password'];?>" readonly>
  </div>
<?php endwhile; }?>
  <a href="dashboard.php" class="btn btn-danger">Cancel</a>
  </form>
      </table>
        </div>
