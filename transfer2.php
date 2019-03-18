<?php
include "transfer3.php";
$user = new user1();
if(isset($_GET['id'])){
$id = $_GET['id'];
}
$user->transfer( $id, $_POST['sent_to'], $_POST['amount']);
header( "refresh:0; url=viewall.php" );
?>