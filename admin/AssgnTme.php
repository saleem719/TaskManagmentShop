<?php

session_start();

include 'include/headeruser.php';
include '../include/database.php';

$db = new database();

$usrid = $_SESSION['user'];

$qry1 = "SELECT * from tasks inner join user on tasks.group_id = user.group_id where email= '$usrid' ";
$data = $db->select($qry1);

?>
<div class="container">
<div class="row">
 <h2><center><i class="fas fa-tasks"></i>  Task detail</center></h2>
<table class="table table-borderless table-hover">
      <tr>
        <th class="table-success">Task name</th>
        <th class="table-success">Assign date</th>
        <th class="table-success">Due date</th>
        <th class="table-success">Status</th>
        <th class="table-success">Action</th>
      </tr>

      <?php if ($data) {
      while ($row = $data->fetch_array()): ?>
       <tr>
        <th><?php echo $row['task_name']; ?></th>
        <th><?php echo $row['Assign_date']; ?></th>
        <th><?php echo $row['due_date']; ?></th>
        <th><?php echo $row['status']; ?></th>
         <th><a href="upd_tasks_user.php?id=<?php echo $row['id'];?>"><i class="fa fa-edit" style="font-size:30px;color:red"></i></a>
        <a href="detailtasks_user.php?id=<?php echo $row['id'];?>"><i class="fas fa-eye" style="font-size:35px;color:green" ></i></a></th>
       <?php
       endwhile; 
        } else {?>
      </tr>
       <?php
        echo "<h4><font color=red>&nbsp;&nbsp;&nbsp;&nbsp; No records found </font></h4>";
    }?>
      </table>
        </div>


  <a href="users.php" class="btn btn-danger">BACK</a>
  </form>

  