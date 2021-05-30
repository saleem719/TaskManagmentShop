<?php
session_start();
include 'include/header.php';
include '../include/database.php';

$db = new database();

$qry = "SELECT * FROM groups";
$run = $db->select($qry);
?>
<div class="text-right"> 
<a href="add_group.php" class="btn btn-success">Create new group</a>
</div>
<p class=" mx-6 mt-3 text-center bg-dark text-white p-2"> List of groups</p>
<table class="table table-borderless table-hover">
      <tr>
        <th class="table-success">ID</th>
        <th class="table-success">Group Name</th>
        <th class="table-success">Group members</th>
      </tr>
      <?php while ($row = $run->fetch_array()): ?> 
       <tr>
        <th><?php echo $row['group_id']; ?></th>
        <th><?php echo $row['group_name']; ?></th>
        <th><a href="group_member.php?id=<?php echo $row['group_id'];?>" class="btn btn-success">View groups members</a></th>
      
        
         <?php endwhile; ?>
      </tr>
      </table>
        </div>


</body>
</html>

