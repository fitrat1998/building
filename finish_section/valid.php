<?php 
	include '../config.php';


	 $ret = [];

     if ($_POST['object_name'] == "Choose object") {
	 	$ret += ['xatolik'=>1,'xabar'=>'Choose object please!!!'];
	 }
	 else{
	 	 $object_name = trim($_POST['object_name']);
	 }


	 if ($_POST['section'] != "Choose section") {
	 	$row = trim($_POST['section']);
	 }
	 else{
	 	$ret += ['xatolik'=>1,'xabar'=>'Choose section please!!!'];
	 }

	 $surface = trim($_POST['surface']);

	 $workers = $_POST['worker'];

	 if($_POST['status'] == "true") {
	 	
	 	$status = "Finished";
	 }
	 else {
	 	$status = "In proccess";
	 }
	

	 $time = time();

	 $master = "";

	foreach($workers as $worker){
		$master .= $worker.", ";
	}

	$old = mysqli_query($link,"SELECT * FROM extra_object WHERE object_name = '$object_name' AND section = '$row' ORDER BY created_date DESC");
	$res = mysqli_fetch_assoc($old);

	// $old2 = mysqli_query($link,"SELECT * FROM extra_object WHERE object_name = '$object_name' AND section = '$section' 
	// 	AND status = 'In proccess' ORDER BY created_date DESC");

	
	// $res2 = [];
	// while ($row = mysqli_fetch_assoc($old2)) {
	// 		$res2 [] = $row;
	// 	}

	
	// foreach ($res2 as $value) {
	// 	// echo $value['status'];
	// 	// print_r($value);
 //   }

	if($res['status'] == "Finished"){
		$ret += ['xatolik'=>1,'xabar'=>'The object already exists on the table!!!'];
		echo json_encode($ret);
		die();
	}
	else{
		$sql = mysqli_query($link,"INSERT INTO extra_object(object_name,floor,flat,section,surface,workers,created_date,updated_date)
	 	   VALUES('$object_name','','','$row','$surface','$master','$time','')");

		 if($sql){
		 	$ret += ['xatolik'=>0, 'xabar'=>'Section added successfully!!!'];
		 }
		 else {
		 	$ret += ['xatolik'=>1,'xabar'=>'Something went wrong!!!'];
		 }

		 if ($status == "Finished") {
		 	 $update = mysqli_query($link,"UPDATE extra_object SET status = '$status' WHERE object_id = '$id' AND 
		 	 	section = '$row' AND status = 'In proccess'");
		 }
	}

	

	echo json_encode($ret);
?>