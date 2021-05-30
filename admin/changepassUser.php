<?php
session_start();

include 'include/headeruser.php';
include '../include/database.php';



$db = new database();

$usrid = $_SESSION['user'];

  if(isset($_POST['update'])){

    $upass  = $_POST['pass'];
    $ucpass  = $_POST['cpass'];

  if($upass =="" || $ucpass ==""){
     echo "<h4> Please fill all required fields..</h4>  ";
     }
    elseif ($upass<>$ucpass ) 
      {
          echo "<h4> Passwords didn't match. Try again...</h4>  ";
       }

  else{

      $qry1 = "SELECT * from user where email = '$usrid'";
      $run = $db->select($qry1);
         
    if($run){
        $qry3 = " UPDATE user SET password = '$upass' WHERE email='$usrid'";
        $data = $db->passChange($qry3);

        if($data){

           echo "<h4> Password changed successfully..</h4>  ";
        }
      }
      else{

        echo "<h4> Unable to changed password..</h4>  ";
      }

 }
}


?>
<div class="container">
<div class="row">
 <div class="col-sm-8 blog-main bg-dark text-white p-2">
<form action="changepassUser.php" method="post">
  <div class="form-group">
    <label class="display-5" >Change Password</label>
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="text" name="pass" class="form-control"  placeholder="Enter Password">
  </div>
  <div class="form-group">
    <label>Confirm Password</label>
    <input type="text" name="cpass" class="form-control"  placeholder="Confirm Password">
  </div>
  <button type="submit" name="update" class="btn btn-success">Save</button>
  <a href="users.php" class="btn btn-danger">Cancel</a>
  </form>

      
