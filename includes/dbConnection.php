<?php
	$Host = "localhost";
	$Username = "root";
	$Password = "";
	$Database = "student_hub_db";

	$db_connect = mysqli_connect($Host, $Username, $Password,$Database);
	// Evaluate the connection
	if (mysqli_connect_errno()) {
	    echo mysqli_connect_error();
	    exit();
	} else echo ""

	//mysql_close($db_connect);
?>