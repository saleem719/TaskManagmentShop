<?php session_start();
include 'include/database.php';


$db = new database();  ?>

<html>
<head>
<title>Task Management System</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252"/>
<script src="js/javas.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="main_container">
<div id="header">
<center></center><img src="admin/images/logo.jpg" class="img-circle" alt="Cinque Terre" width="860"
 height="165"></center>
 <br><br><br><br>
</div>
<div id="left_side">
<div class="welcomeBar">User</div>
<div id="logStyle">
<br><br>
<fieldset style="width:350px; background-color:grey; border-radius:6px;">
<legend align="center"><img src="images/login_icon.png" height="100" width="110"></legend>
<table id="loginCSS">
<form action="index.php" method="post">
<tr><td>&nbsp;</td></tr>
<tr><td>Email:</td><td> <input type="text" size="30" name="txtEmail" required></td></tr>
<tr><td>Pass:</td><td><input type="password"  size="30" name="txtPass" required></td></tr>
<tr><td>&nbsp;&nbsp;</td></tr>
<tr class="loginButton"><td colspan="2" align="center"><input type="submit" name="btnLogin" value="Login"></td></tr>
<?php
if (isset($_POST['btnLogin'])) {

	$eml = $_POST['txtEmail'];
    $pas = $_POST['txtPass'];

$qry = "SELECT * FROM user where email='$eml' AND password='$pas' ";
$run = $db->select($qry);

if ($run){
	  $userdetail= $run->fetch_assoc();
	  $_SESSION['userName']  = $userdetail['user_name'];
	  $_SESSION['userID']  = $userdetail['user_id'];
      $_SESSION['user'] = $eml;

	header('location: admin/users.php');
} else {

	echo "<h4><font color=red>&nbsp;&nbsp;&nbsp;&nbsp; Email or Password incorrect </font></h4>";
}

}
?>		
</form>
</table>
</fieldset></div></div>

<!---------------------Admin Login Page---------------------------------------->

<div id="right_side">
<div class="welcomeBar">Admin</div>
<div id="logStyle">
<br><br>
<fieldset style="width:350px; background-color:grey; border-radius:6px;">
<legend align="center"><img src="images/Admin_icon.png" height="100" width="110"></legend>
<table id="loginCSS">
<form action="index.php" method="post">
<tr><td>&nbsp;</td></tr>
<tr><td>Email:</td><td> <input type="text" size="30" name="txtEmailad" required></td></tr>
<tr><td>Pass:</td><td><input type="password" size="30" name="txtPass" required></td></tr>
<tr><td>&nbsp;&nbsp;</td></tr>
<tr class="loginButton"><td colspan="2" align="center"><input type="submit" name="btnAdmin" value="Login"></td></tr>
<?php

if (isset($_POST['btnAdmin'])) {
	
	$eml = $_POST['txtEmailad'];
    $pas = $_POST['txtPass'];

$qry = "SELECT * FROM admin where email='$eml' AND Password='$pas' ";
$run = $db->select($qry);

if ($run) {

	$admindetail= $run->fetch_assoc();
    $_SESSION['admin'] = $eml;
    $_SESSION['adminName']  = $admindetail['name'];
    $_SESSION['adminID']    = $admindetail['id'];
    $_SESSION['adminEmail'] = $admindetail['email'];
	header('location: admin/dashboard.php');

} else {

	echo "<h4><font color=red>&nbsp;&nbsp;&nbsp;&nbsp; Email or Password incorrect </font></h4>";
}


}
?>

</form>
</table>
</fieldset></div>
</div>  


</div>
</div> 
</body>
</html>