<?php

session_start();
include 'include/header.php';
include '../include/database.php';

$db = new database();

$qry1 = "SELECT * from tasks left join groups on tasks.group_id = groups.group_id where status= 'Pending'";
$tsk = $db->select($qry1);

?>
<div class="container">
<div class="row">
 <h2><center><i class="fas fa-briefcase"></i>   Pending Tasks</center></h2>
<table class="table table-borderless table-hover">
      <tr>
        <th class="table-success">Task name</th>
        <th class="table-success">Assigned group</th>
        <th class="table-success">Assign date</th>
        <th class="table-success">Due date</th>
        <th class="table-success">Status</th>
      </tr>
       <?php if ($tsk){ ?>
      <?php while ($row = $tsk->fetch_array()): ?>
       <tr>
        <th><?php echo $row['task_name']; ?></th>
        <th><?php echo $row['group_name']; ?></th>
        <th><?php echo $row['Assign_date']; ?></th>
        <th><?php echo $row['due_date']; ?></th>
        <th><?php echo $row['status']; ?></th>
        <th></th>
        <?php
       endwhile; 
        } else {?>
      </tr>
       <?php
        echo "<h4><font color=red>&nbsp;&nbsp;&nbsp;&nbsp; No records found </font></h4>";
    }?>
      </tr>
      </table>
        </div>


  <a href="dashboard.php" class="btn btn-danger">BACK</a>
  </form>

  