<?php 
  include '../config.php';

   $name = $_POST['name'];
   
 
          $sql = mysqli_query($link,"SELECT * FROM objects WHERE obj_name = '$name' AND rooms <= 0 ");


   // $sql = mysqli_query($link,"SELECT floors FROM objects WHERE obj_name = '$name'");

   ?>
     <i class="fa fa-arrow-up-1-9"></i>
         <label> Floor</label> 
         <select name="floor" class="js-example-basic-single bg-light form-control" 
          style="background-color: #F8F8F8 !important;" onchange="" id="">
          <option>Choose floor</option>
         <?php 
           while($row = mysqli_fetch_assoc($sql)){
               ?>
               <option style="background-color: #F8F8F8 !important"; value="<?=$row['floors']?>">
              <?
               if($row['floors'] > 0 ){
                 echo $row['floors'];
               }
               else {
                 echo $row['floors'];
               }
                  
               ?>
               </option>
               }
             <? 
        } 
         ?>
        </select>
   <?
   
   

   


?>
  
