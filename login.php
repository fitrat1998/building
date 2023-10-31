<?php 
	session_start();
	include'config.php';

	if(!empty($_POST['username'])){
		$username = trim($_POST['username']);
	}
	else {
		echo "Empty username";
	}
	if(!empty($_POST['password'])){
		$password = trim(md5($_POST['password']));
	}
	else {
		echo "Empty password";
	}

	$sql = mysqli_query($link,"SELECT * FROM users WHERE username = '$username' AND password = '$password'");
	$res = mysqli_fetch_assoc($sql);

	if($res){
		echo "good";
		$_SESSION['user'] = $res['username'];
		$_SESSION['name'] = $res['name'];
	}
	else {
		echo "error";
	}
?>