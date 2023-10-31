<?php
session_start();
include "../config.php";
include '../date.php';


 $ide = $_POST["ide"];

 echo $ide;



// $sql = mysqli_query($link,"SELECT * FROM objects WHERE obj_name = '$ide' GROUP BY section_flat HAVING COUNT(section_flat) > 0");
// $row = mysqli_fetch_assoc($sql);
//  $extr = array();
//  array_push($extr, $row['id']);
//     $section = explode(",", $row['section_flat']);
//     array_pop($section);
 /*
 while ($row = mysqli_fetch_assoc($sql)) {
    array_push($extr, $row['id']);
    $section = explode(",", $row['section_flat']);
    array_pop($section);
 }
*/


?>
<thead>
  <tr>
  <?php  
    $sql2 = mysqli_query($link,"SELECT * FROM sections WHERE parent = 'object'");

    $temp_arr = [];

    while ($row = mysqli_fetch_assoc($sql2)) {
       array_push($temp_arr,$row['id']);
        ?>
          <th><?=$row['section_name']?></th>
        <?
    }
    $temp_arr2 = [];

    $sql3 = mysqli_query($link,"SELECT * FROM extra_object WHERE object_name = '$ide'");

    while ($row3 = mysqli_fetch_assoc($sql3)) {
       array_push($temp_arr2,$row3);
    }

     
  ?>                                    
     <th>Name</th>
     <th>Edit</th>
     <th>Delete</th>
     <th>Created date</th>
     <th>Updated date</th>

  </tr>
  </thead>
<tbody>
  <tr>
      <?php
        
         foreach ($temp_arr2 as $key => $value) {
          foreach ($temp_arr as $key2 => $value2) {
             if($value['section'] == $value2){
                ?>
                  <td><?=$value['surface']?></td>

                <?
             }
             else {
                ?>
                  <td>0</td>
                <?
             }
          }

      ?>
         <td><?=$value['object_name']?></td>
         <td><a class="btn btn-success" href="edit.php?id=<?=$value['id']?>"><i class="fa fa-pencil"></i></a></td>
         <td>
            <form id="delete" class="">
            <button type="button" class="btn btn-danger uchir" salom="<?=$row['id']?>"><i class="fa fa-trash"></i></button>
            </form>
        </td>
         <td><?=date("Y-m-d",$value['created_date']);?></td>
         <td>
          <?php
           if($value['updated_date']) echo date("Y-m-d",$value['updated_date']);
           else echo 0;
            ?>
          </td>
    </tr>
</tbody>
<?
       }
?>
   
