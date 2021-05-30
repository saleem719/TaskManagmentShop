<?php
session_start();

include 'include/header.php';
include '../include/database.php';



$db = new database();

$adminId = $_SESSION['adminID'];

  if(isset($_POST['update'])){

    $apass  = $_POST['pass'];
    $acpass  = $_POST['cpass'];

  if($apass =="" || $acpass ==""){
     echo "<h4> Please fill all required fields..</h4>  ";
     }
    elseif ($apass <> $acpass ) 
      {
          echo "<h4> Passwords didn't match. Try again...</h4>  ";
       }

  else{

      $qry1 = "SELECT * from admin where id = '$adminId'";
      $run = $db->select($qry1);
         
    if($run){
        $qry3 = " UPDATE admin SET password = '$apass' WHERE id='$adminId'";
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
<form action="admin_pass.php" method="post">
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
  <a href="dashboard.php" class="btn btn-danger">Cancel</a>
  </form>

      
