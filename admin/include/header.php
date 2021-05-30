 <!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>

  <link href="../bootstrap/bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../bootstrap/custom.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 <script src="https://kit.fontawesome.com/1af27c3e52.js" crossorigin="anonymous"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-show-password/1.1.2/bootstrap-show-password.min.js"></script>
 
 <link href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.min.css" rel="stylesheet">

 <script src="https://cdn.tiny.cloud/1/l0914f5osgq118pnlvtxk7jz711d2prlb6gvwp5a13q9e4ax/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
</head>

<body>
<nav class="navbar navbar-dark fixed-top bg-danger flex-md-nowrap p-1 shadow">
<a class="navbar-brand col-sm-3 col-md-2 mr-0" href="dashboard.php"><img src="images/logo.jpg" class="img-circle"  width="190"
 height="50"></a>
  <div class="nav-item dropdown">
 <a href="#"  class="nav-link" data-toggle="dropdown">
  <?php echo "<font color=white>".$_SESSION['adminName']." </font>"?><i class="fas fa-caret-down"></i><img src="../images/login_icon.png" height="40" width="50"></a>
 <div class="dropdown-menu">
   <a class="dropdown-item" href="admin_profile.php"><i class="fas fa-user"></i> Profile</a>
     <a class="dropdown-item" href="admin_pass.php"><i class="fas fa-unlock-alt"></i> Change password</a>
     <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
</div>
         </nav>
<div class="container-fluid" style="margin-top:80px">
<div class="row py-2"><!-- start row-->
<div class="sidenav">
<ul class="nav flex-column">
 <li class="nav-item"><a  class="nav-link" href="Dashboard.php"><i class="fas fa-tachometer-alt"></i>   DASHBOARD</a></li>
 <div class="dropdown-divider"></div>

 <li class="nav-item"><a  href="tasks.php"><i class="fas fa-tasks"></i>     Tasks</a></li>
  <li class="nav-item"><a  href="add_tasks.php"><i class="far fa-plus-square"></i>     Add tasks</a></li>   
  <li class="nav-item"><a  href="add_users.php"><i class="fas fa-user-plus"></i>     Add users</a></li>
  <li class="nav-item"><a  href="add_admin.php"><i class="fas fa-user-plus"></i>     Add admin</a></li>
  <li class="nav-item"><a  href="add_group.php"><i class="fas fa-user"></i>     Create group</a></li>
  <li class="nav-item"><a  href="all_admins.php"><i class="fas fa-user"></i>     admin</a></li>
   <li class="nav-item"><a  href="all_users.php"><i class="fas fa-user"></i>     Users</a></li>
   <li class="nav-item"><a  href="groups.php"><i class="fas fa-users"></i>     Groups</a></li>
   <li class="nav-item"><a  href="admin_pass.php"><i class="fas fa-unlock-alt"></i> Change Password</a></li>
  
  
</ul>
</div>
</div>
</div>
</nav>
<div class="main">
<div class="col-sm-9 col-md-12"> <!--start main bar -->

