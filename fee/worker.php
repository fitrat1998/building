<?php 
	include'../config.php';

	$sql = mysqli_query($link,"SELECT * FROM workers");

	?>
		 <i class="mdi mdi-worker"></i>
	     <label> Workers</label> 
	     <select name="worker_id" class="js-example-basic-single bg-light form-control" 
	      style="background-color: #F8F8F8 !important;">
	      <option>Choose worker</option>
	     <?php 
	        while($row = mysqli_fetch_assoc($sql)){
	     ?>
	        <option style="background-color: #F8F8F8 !important"; value="<?=$row['id'];?>"><?=$row['name'];?></option>
	     <? } 
	     ?>
	    </select>
	<?

 ?>