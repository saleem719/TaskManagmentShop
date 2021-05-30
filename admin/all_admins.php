<?php
session_start();
include 'include/header.php';
include '../include/database.php';

$db = new database();

$adminId = $_SESSION['adminID'];

$qry = "SELECT * FROM admin where id = '$adminId'";
$run = $db->select($qry);
?>
<div class="text-right"> 
<a href="add_admin.php" class="btn btn-success">Add admin</a> <br><br>
</div>
<table class="table table-borderless table-hover">
      <tr>
        <th class="table-success">Admin Name</th>
        <th class="table-success">Email</th>
        <th class="table-success">Password</th>

      </tr>
      <?php while ($row = $run->fetch_array()): ?> 
       <tr>
        <th><?php echo $row['name']; ?></th>
        <th><?php echo $row['email']; ?></th>
        <th><?php echo $row['Password']; ?></th>
         <?php endwhile; ?>
      </tr>
      </table>

    <!-- all admins -->


<p class=" mx-6 mt-5 text-center bg-dark text-white p-2">List of admins</p>

<?php
$qry3 = "SELECT * FROM admin";
$data = $db->select($qry3);

?>
<table class="table table-borderless table-hover">
      <tr>
        <th class="table-success">ID</th>

        <th class="table-success">Admin Name</th>

        <th class="table-success">Email</th>

      </tr>
      <?php while ($admins = $data->fetch_array()): ?> 
       <tr>
        <th><?php echo $admins['id']; ?></th>
        <th><?php echo $admins['name']; ?></th>
        <th><?php echo $admins['email']; ?></th>
         <?php endwhile; ?>
      </tr>
      </table>
        </div>
</body>
</html>