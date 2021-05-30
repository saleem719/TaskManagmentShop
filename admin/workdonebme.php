<?php

session_start();

include 'include/headeruser.php';
include '../include/database.php';

$db = new database();

$usrid = $_SESSION['user'];

$qry1 = "SELECT * from tasks inner join user on tasks.group_id = user.group_id 
          WHERE email = '$usrid' and status = 'Completed' ";
$data = $db->select($qry1);

?>
<div class="container">
<div class="row">
 <h2><center><i class="fas fa-check-double"></i> Task detail</center></h2>
<table class="table table-borderless table-hover">
      <tr>
        <th class="table-success">Task name</th>
        <th class="table-success">Assign date</th>
        <th class="table-success">Due date</th>
        <th class="table-success">Status</th>
      </tr>
      <?php if ($data){ 
        while ($row = $data->fetch_array()): ?>
       <tr>
        <th><?php echo $row['task_name']; ?></th>
        <th><?php echo $row['Assign_date']; ?></th>
        <th><?php echo $row['due_date']; ?></th>
        <th><?php echo $row['status']; ?></th></tr>
       <?php
       endwhile;
       } else { 
        echo "<h4><font color=red>&nbsp;&nbsp;&nbsp;&nbsp; No records found </font></h4>";
    }?>
      </table>
        </div>


  <a href="users.php" class="btn btn-danger">BACK</a>
  </form>

  