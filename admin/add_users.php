<?php
session_start();

include 'include/header.php';
include '../include/database.php';
?>

<div class="container">
<div class="row">

  <h2><center>Add New User</center></h2>
 <div class="col-sm-12 blog-main bg-dark text-white p-2">





  <?php 

  $db = new database();

  $qry = "SELECT * FROM groups";
  $run = $db->select($qry);


  if (isset($_POST['submit'])){

   $uname    = $_POST['userName'];
   $uemail   = $_POST['userEmail'];
   $upass    = $_POST['upass'];
   $umob     = $_POST['umobile'];
   $grpid    = $_POST['gid'];

   $qry1 = "SELECT * from user where email = '$uemail'";
   $chkuser = $db->select($qry1);
   if ($chkuser){
          echo "<center>This email address is already being used</center>";
       } 
    elseif ($uname =="" || $uemail =="" || $upass=="" || $umob==""){
       echo "<center> please fill all required fields  </center>";
   }else{
      $qry = "INSERT INTO user (user_name, email, password, mobile_no, group_id) 
      VALUES ('$uname','$uemail','$upass','$umob','$grpid')";
   $data = $db->insert($qry);
 }
 }
  ?>

  <form action="add_users.php" method="post">
  <div class="form-group">
    <label>User Name *</label>
    <input type="text" name="userName" class="form-control"  placeholder="Name" >
  </div>
    <div class="form-group">
    <label>Email *</label>
    <input type="Email" name="userEmail" class="form-control"  placeholder="Email" >
  </div>
  <div class="form-group">
     <label>Select group</label>
  <select name="gid" class="form-control" id="searchddl">
  <?php while ($rows = $run->fetch_array()):?>
  <option value="<?php echo $rows['group_id'];?>"><?php echo $rows['group_name'];?></option>
  <?php endwhile; ?>
  </select> 
</div>
  <div class="form-group">
    <label>Password *</label>
    <input type="Password" name="upass" class="form-control"  placeholder="Password" >
  </div>
    <div class="form-group">
    <label>Mobile No *</label>
    <input type="text" name="umobile" class="form-control"  placeholder="Mobile No" >
  </div>
  <button type="submit" name="submit" class="btn btn-success">Submit</button>
  <a href="dashboard.php" class="btn btn-danger">Cancel</a>
  </form>

      
<script>
$("#searchddl").chosen();


    tinymce.init({
      selector: 'textarea',
      plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',
      toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',
      toolbar_mode: 'floating',
      tinycomments_mode: 'embedded',
      tinycomments_author: 'Author name',
   });
</script>