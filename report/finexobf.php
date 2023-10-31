<?php 
	include '../config.php';

	 $ret = [];

	 if ($_POST['object'] != "Choose floor") {
	 	$row = trim($_POST['floor']);
	 }
	 else{
	 	$ret += ['xatolik'=>1,'xabar'=>'Choose floor'];
	 }

	 $old = mysqli_query($link,"SELECT finished_section_floor FROM objects");
	 $res = mysqli_fetch_assoc($old);

	 $extra = $res['finished_section_floor'].$row.",";

	 $sql = mysqli_query($link,"UPDATE objects SET finished_section_floor = '$extra'");

	 if($sql){
	 	$ret += ['xatolik'=>0, 'xabar'=>'Floor finished successfully!!!'];
	 }
	 else {
	 	$ret += ['xatolik'=>1,'xabar'=>'Something went wrong!!!'];
	 }

	 echo json_encode($ret);
?>