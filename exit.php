<?php 
	session_start();
	if($_SESSION['user']){
		session_destroy();
		header("Location:index.php");
	}
	else{
		header("Location:index.php");
	}

 ?>