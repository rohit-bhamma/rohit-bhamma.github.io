<?php
session_start();	
include "class1.php";
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>User-Details</title>

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
          <h1 class="h3 mb-2 text-gray-800" style="margin-top:30px;">Details</h1>
	
		  
<?php	
	class User extends Connect
	{	// function for viewing details of user
		public function view_detail($id){
			global $link;
			$this->connect_fn();
			$sql = "SELECT * FROM users where ID='$id'";
			$result = mysqli_query($this->link, $sql);
			while ($row = $result->fetch_assoc()) {
				$f0=$row['ID'];
				$f1=$row['Name'];
				$f2=$row['Email'];
				$f3=$row['Contact_No'];
				$f4=$row['Current_Credit'];?>
				<table id="dataTable" width="30%" cellspacing="0" style="margin-top:-600px;margin-left:280px;font-size:25px;">
            <tr><td style="color:blue;">ID:</td><td style="color:red;"><?php echo $f0 ?></td></tr>
			
            <tr><td style="color:blue;">Name:</td><td style="color:red;"><?php echo $f1 ?></td></tr>
			
            <tr><td style="color:blue;">Email:</td><td style="color:red;"><?php echo $f2 ?></td></tr>
          
			
            <tr><td style="color:blue;">Contact_No:</td><td style="color:red;"><?php echo $f3 ?></td></tr>
          
			
			<tr><td style="color:blue;">Current_Credit:</td><td style="color:red;"><?php echo $f4 ?></td></tr>
			
			<tr><td></td><td><a href="transfer1.php?id=<?php echo $f0 ?>" style="text-decoration:none;font-size:30px;">Transfer Credits</a></td></tr>
		  </table>
	<?php		}
		}}
?>

</div>
</div>
</div>
</div>
</body>
</html>