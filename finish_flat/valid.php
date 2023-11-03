<?php 
	session_start();

	include '../config.php';

	 $ret = [];

     if ($_POST['object_name'] == "Choose object") {
	 	$ret += ['xatolik'=>1,'xabar'=>'Choose object please!!!'];
	 }
	 else{
	 	 $object_name = trim($_POST['object_name']);
	 }

	 if ($_POST['room'] == "Choose flat") {
	 	$ret += ['xatolik'=>1,'xabar'=>'Choose room please!!!'];
	 }
	 else{
	 	$flat = trim($_POST['room']);
	 }


 	 if(isset($_POST['worker'])){
 	 	$workers = $_POST['worker'];
 	 }
 	 else{
 	 	$workers = $_POST['oldworker'];
 	 }

	  

 	 if(isset($_POST['section'])){
 	 	$row = $_POST['section'];
 	 }

	 if($_SESSION['globaldate']){
	 	$time = $_SESSION['globaldate'];
	 }

	 else {
		$time = date('Y-m-d');
	 }

	 $comment = trim($_POST['comment']);
	 
	 $master = "";

	foreach($workers as $worker){
		$master .= $worker.",";
	}

	$sections = "";

	foreach ($row as $key => $value) {
		$sections .= $value.",";
	}


	$old = mysqli_query($link,"SELECT * FROM extra_object WHERE flat = '$flat'");
	$exists = mysqli_fetch_assoc($old);


	if(!$exists){
		$sql = mysqli_query($link,"INSERT INTO extra_object (object_name,floor,flat,section,surface,workers,created_date,updated_date,comment)
		 	   VALUES('$object_name','','$flat','','$sections','$master','$time','','$comment')");

		 if($sql){
		 	$ret += ['xatolik'=>0, 'xabar'=>'Section added successfully!!!'];
		 }
		 else {
		 	$ret += ['xatolik'=>1,'xabar'=>'Something went wrong!!!'];
		 }
	}
	else {
		$sql = mysqli_query($link,"UPDATE extra_object SET surface='$sections',workers='$master',updated_date='NOW()',comment='$comment' WHERE flat = '$flat'");

		 if($sql){
		 	$ret += ['xatolik'=>0, 'xabar'=>'Section updated successfully!!!'];
		 }
		 else {
		 	$ret += ['xatolik'=>1,'xabar'=>'Something went wrong!!!'];
		 }
	}

	 echo json_encode($ret);


?>