<?php
session_start();
include "../config.php";

 $ide = $_POST["ide"];


// $sql = mysqli_query(
//     $link,
//     "SELECT object_id, section, floor,IF(status='Finished', 'Finished', 'In proccess'), created_date, updated_date, COUNT(section), SUM(surface) FROM extra_object WHERE object_id='$ide' GROUP BY section HAVING COUNT(section) > 0;"
// );

 $sql = mysqli_query($link,"SELECT * FROM extra_object WHERE object_name = '$ide' AND floor = 0 ");


$res = array();
$res2 = array();
$sum = 0;


while ($row = mysqli_fetch_assoc($sql)) {

   $row = $row['section'];
   $status = $row['status'];
   $object_name = $row['object_name'];

    $sql4 = mysqli_query($link,"SELECT * FROM sections WHERE section_name = '$row'");
    $res4 = mysqli_fetch_assoc($sql4);    

    if($row['updated_date'] == ""){
       $up = 0;
    }
    else{
       $up = date("Y-m-d",$row['updated_date']);

    }

    $cr = date("Y-m-d",$row['created_date']);

    array_push(
      $res, 
      [ 

         $row["object_name"],
         $row["flat"],
         $res4["section_name"],
         $row['surface'],
         $cr,
         $up,
         $row["comment"],
         $row["id"],
         $row["id"],


         // $res3 ? "Finished" : "In proccess",
      ]
);
}



echo json_encode($res);
?>
   
