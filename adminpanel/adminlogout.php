<?php include('conn.php'); ?>
<?php
	session_start();
	$sql2 = "DELETE FROM current_logged_admin";
	mysqli_query($conn, $sql2);	
	session_destroy();
	header('location: ../index.php');
?>