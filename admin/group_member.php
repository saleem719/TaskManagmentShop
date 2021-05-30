<?php
session_start();

include 'include/header.php';
include '../include/database.php';

$db = new database();

$groupdi = $_GET['id'];
$qry2 = "SELECT * FROM user where group_id = '$groupdi' ";
$tsk = $db->select($qry2);
if (!$tsk) {
  echo "No member assigned to this group..";
} else{

?>
<div class="container">
<div class="row">
 <div class="col-sm-12 blog-main bg-dark text-white">
  <p class=" mx-6 mt-3 text-center bg-dark text-white p-2">Group Members</p>
</div>
<table class="table table-borderless table-hover">
      <tr>
        <th class="table-success">User Name</th>
        <th class="table-success">Email</th>
        <th class="table-success">Mobile No</th>

      </tr>
      <?php while ($row = $tsk->fetch_array()): ?> 
       <tr>
        <th><?php echo $row['user_name']; ?></th>
        <th><?php echo $row['email']; ?></th>
        <th><?php echo $row['mobile_no']; ?></th>
        
         <?php endwhile; } ?>
      </tr>
      </table>