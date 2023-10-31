<?php 
	include '../config.php';

	 $ret = [];

	 if (!empty($_POST['section'])) {
	 	$row = trim($_POST['section']);
	 }
	 else{
	 	$ret += ['xatolik'=>1,'xabar'=>'Choose exta object'];
	 }

	 if (!empty($_POST['id'])) {
	 	$id = trim($_POST['id']);
	 }
	 else{
	 	$ret += ['xatolik'=>1,'xabar'=>'Choose object please!!!'];
	 }

	 $old = mysqli_query($link,"SELECT section FROM objects WHERE id = '$id'");
	 $res = mysqli_fetch_assoc($old);

	 $extra = $res['section'].$row.",";

	 $sql = mysqli_query($link,"UPDATE objects SET section = '$extra' WHERE id = '$id'");

	 if($sql){
	 	$ret += ['xatolik'=>0, 'xabar'=>'Extra object finished successfully!!!'];
	 }
	 else {
	 	$ret += ['xatolik'=>1,'xabar'=>'Something went wrong!!!'];
	 }

	 echo json_encode($ret);
?>