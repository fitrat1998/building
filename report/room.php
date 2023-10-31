<?php 
	include '../config.php';

	 $id = $_POST['idr'];


	 $sql = mysqli_query($link,"SELECT * FROM objects WHERE id='$id'");

	 ?>
	 	 <i class="fa fa-house"></i> 
         <label> Room</label> 
         <select name="room" class="js-example-basic-single bg-light form-control" 
          style="background-color: #F8F8F8 !important;">
          <option>choose flat</option>
         <?php 
           while($row = mysqli_fetch_assoc($sql)){
           	for ($i=0; $i <= $row['rooms'] ; $i++) { 
           		 ?>
               <option style="background-color: #F8F8F8 !important"; value="<?=$i?>"><?=$i;?></option>
             <? 
           	}
        } 
         ?>
        </select>
	 <?
	 
	 

	 


?>
	
