<?php 
	include'../config.php';

	$ret = [];

	if(!empty($_POST['name'])){
		$name = trim($_POST['name']);;
	}
	else {
		$ret = ['xatolik'=> 1,'xabar'=>'Empty name!!!'];
	}

	if(!empty($_POST['position'])){
		$position = trim($_POST['position']);;
	}
	else {
		$ret = ['xatolik'=> 1,'xabar'=>'Empty position!!!'];
	}

	

	$date = time();

	$sql = mysqli_query($link,"INSERT INTO sections(section_name,parent,created_date,updated_date)VALUES('$name','$position','$date','')");

	if($sql){
		$ret = ['xatolik'=> 0,'xabar'=>'New worker added successfully!!!'];
	}
	else{
		$ret = ['xatolik'=> 1,'xabar'=>'Something went wrong!!!'];
	}

	echo json_encode($ret);
 ?>