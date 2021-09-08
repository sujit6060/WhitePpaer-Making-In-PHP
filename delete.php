<?php
	$conn = mysqli_connect('localhost','root','','login');

	$id=$_REQUEST['id'];
	$query = "DELETE FROM landing WHERE id=$id"; 
	$result = mysqli_query($conn,$query) or die (mysqli_error());

	header("Location: view_whitepapers.php"); 
?>
