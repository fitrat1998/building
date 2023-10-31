<?php 
	include'../config.php';

	// print_r($_POST);
	// exit();

	$ret = [];

	if(!empty($_POST['object_name'])){
		$object_name = trim($_POST['object_name']);;
	}
	else {
		$ret += ['xatolik'=> 1,'xabar'=> 'Empty object_name!!!'];
	}

	if(!empty($_POST['floors'])){
		$floors = trim($_POST['floors']);;
	}
	else {
		$ret += ['xatolik'=> 1,'xabar'=> 'Empty floors!!!'];
	}

	if(!empty($_POST['rooms'])){
		$rooms = trim($_POST['rooms']);;
	}
	else {
		$ret += ['xatolik'=> 1,'xabar'=> 'Empty rooms!!!'];
	}

	if($_POST['comment']){
		$comment = trim($_POST['comment']);;
	}
	
	if(!empty($_POST['ob_sec'])){
		$ob_sec = $_POST['ob_sec'];
	}
	else {
		$ret += ['xatolik'=> 1,'xabar'=> 'Empty section of object!!!'];
	}

	 $section_obj = "";

	foreach($ob_sec as $item){
		$section_obj .= $item.",";
	}

	$section_flat = "";

	foreach($_POST['flat_sec'] as $k){
		$section_flat .= $k.",";
	}

	$section_floor = "";

	foreach($_POST['floor_sec'] as $v){
		$section_floor .= $v.",";
	}



	$floors = explode("/", $floors);
	$rooms = explode("/", $rooms);

	$cut_flat = $rooms[1];
	$cut_floor = $floors[1];
	$date = time();

	$num_rooms = 0;

		// $sql = mysqli_query($link,"INSERT INTO 
  //          objects(project_id,obj_name,floors,rooms,surface,section,created_date,updated_date,status)
  //          VALUES('$project_id','$object_name','$floors','$rooms','$surface','$section','$date','','new')");
    

	if($ret['xatolik'] == 0){

	  for ($i=$rooms[0]; $i <= $rooms[1]; $i++) { 
			$sql = mysqli_query($link,"INSERT INTO 
             objects(obj_name,floors,rooms,surface,section,created_date,updated_date,status,comment,section_floor,section_flat)
             VALUES('$object_name','','$i','$surface','$section_obj','$date','','new','$comment','$section_floor','$section_flat')");
	  }

	  for ($i=$floors[0]; $i <= $floors[1]; $i++) { 
			$sql = mysqli_query($link,"INSERT INTO 
             objects(obj_name,floors,rooms,surface,section,created_date,updated_date,status,comment,section_floor,section_flat)
             VALUES('$object_name','$i','','$surface','$section_obj','$date','','new','$comment','$section_floor','$section_flat')");
	  }
	}

	if($sql){
		$ret += ['xatolik'=> 0,'xabar'=> 'Object added successfully!!!'];
	}
	else{
		$ret += ['xatolik'=> 1,'xabar'=> 'Something went wrong!!!'];
	}

	echo json_encode($ret);
 ?>