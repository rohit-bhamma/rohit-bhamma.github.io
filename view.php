<!-- call to view_detail function -->
<?php
include "viewdetail.php";
$user=new User();

if(isset($_GET['id'])){
  $id = $_GET['id'];
  $user->view_detail($id);
}else {
	echo "Invalid URL";
	
}
?>
