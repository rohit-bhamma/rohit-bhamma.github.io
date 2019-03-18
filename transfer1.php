<?php
session_start();
include "class1.php"
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Transfer Credits</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="Home.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Credit Management System</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="Home.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Home</span></a>
      </li>
	  <li class="nav-item">
        <a class="nav-link" href="viewall.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>View All</span></a>
      </li>
	  </ul>
	  <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
	  <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800" style="margin-top:30px;">Transfer Credits</h1>
<?php
if(isset($_GET['id'])){
$id = $_GET['id'];
}
if(isset($_SESSION["error"])){
$error=$_SESSION["error"];
echo "<span style='color:red'>$error</span>";
}
?>
<!-- form for tranfer of credits -->
<table style="margin-top:20px;margin-left:50px;border:2px solid orange;outline:3px solid orange;">
<form action="transfer2.php?id=<?php echo $id ?>"  method="POST">
<tr><td style="border:1px solid red;padding:10px;outline:1px solid orange;">Send To:</td><td style="border:1px solid red;padding:10px;outline:1px solid orange;">
<select name="sent_to" onmousedown="if(this.options.length>3){this.size=3;}"  onchange='this.size=0;' onblur="this.size=0;>
<option disabled="disabled" selected="selected">Choose Reciever</option>
<?php
					$connec1=new Connect();
					$connec1->connect_fn();
					$sql= "SELECT * FROM users";
					$result = mysqli_query($connec1->link, $sql);
						while ($row = $result->fetch_assoc()) {
							$f1=$row['Email'];
?>
<option><?php echo $f1 ?></option><?php } ?>
</select>
</td></tr>
<tr><td style="border:1px solid red;padding:10px;outline:1px solid orange;">Amount:</td><td style="border:1px solid red;padding:10px;outline:1px solid orange;"><input type="text" name="amount" required></td></tr>
<tr><td></td><td style="float:right;padding:10px;"><input type="submit" value="Transfer"></td></tr>
</form>
</table>
</div>
</div>
</div>
</div>
</body>
</html>
<?php
unset($_SESSION["error"]);
unset($_SESSION["error1"]);
?>