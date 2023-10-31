	<?php 
	session_start();
	include '../config.php';

	$id = $_POST['id'];

	$ret = [];

	if(!empty($_POST['object_name'])){
		$object_name = trim($_POST['object_name']);;
	}
	else {
		$ret += ['xatolik'=>1,'xabar'=>'Empty object_name!!!d'];
		exit();
	}


	  $ob_sec =$_POST['section'];
	

	$section_obj = "";

	foreach($ob_sec as $item){
		$section_obj .= $item.",";
	}

	$id = $_SESSION['pr_id'];
	$time = time();

	$sql = mysqli_query($link,"UPDATE objects SET 
	obj_name ='$object_name',section ='$section_obj',updated_date ='$time'
    WHERE id = '$id'");

	if($sql){
		$ret += ['xatolik'=>0,'xabar'=>'done'];
		// echo trim("done");
	}
	else {
		echo "Something went wrong!!!";
	}

	echo json_encode($ret);
?>