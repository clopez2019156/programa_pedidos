<?php 
	$con = mysqli_connect("192.168.0.7", "admin", "");
	if (!$con) {
		die('Could not connect: '. mysqli_connect_error());
	}
	mysqli_select_db($con, "facturacion");
?>