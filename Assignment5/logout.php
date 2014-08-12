<?php
		require_once "includes/DBClass.php";
		session_start();
		session_destroy();		//Destroying session of user
		$db = NULL;				//closing database connection
		header("Location:index.php");
	
?>