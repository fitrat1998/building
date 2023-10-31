<?php 
	session_start();
	include '../config.php';

	 $id = $_POST['project'];

	 $sql = mysqli_query($link,"SELECT * FROM objects WHERE project_id = '$id'");
	 
	 ?>
	 <i class=" fas fa-hospital "></i>
     <label> Objects</label> 
	 <select name="object_id" class="form-control object" placeholder="Address" required 
      style="background-color: #F8F8F8 !important;" id="object" onchange="a()">
      <option>Choose object</option>
	 <?php while ($rows = mysqli_fetch_assoc($sql)) {
	 	?>
	 		<option value="<?=$rows['id']?>"><?=$rows['obj_name']?></option>
	 	<?
	
	 $_SESSION['fee_id'] = $rows['id'];
	}
	 ?>
	</select>
	 <?
	


?>
	
