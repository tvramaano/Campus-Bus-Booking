<?php
	$Host = "hostname";
	$Username = "username";
	$Password = "password";
	$Database = "database name";

	$db_connect = mysqli_connect($Host, $Username, $Password,$Database);
	// Evaluate the connection
	if (mysqli_connect_errno()) {
	    echo mysqli_connect_error();
	    exit();
	} else echo ""

	//mysql_close($db_connect);
?>
