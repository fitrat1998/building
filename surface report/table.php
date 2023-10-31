<?php
include "../config.php";

$name = $_POST["tbody"];

$obj = [];

$sql = mysqli_query($link,"SELECT extra_object.object_name,extra_object.section, SUM(extra_object.surface),extra_object.created_date,extra_object.updated_date
      FROM  extra_object WHERE object_name = '$name'   GROUP BY section HAVING COUNT(extra_object.section) > 0");

 


while ($row = mysqli_fetch_assoc($sql)) {


$row = $row['section'];
$sql2 = mysqli_query($link,"SELECT * FROM extra_object WHERE 
    section='$row'");
 while ($row2 = mysqli_fetch_assoc($sql2)) {
    $wk = explode(",", $row2['workers']);
    foreach ($wk as $item) {
         $sql3 = mysqli_query($link,"SELECT * FROM workers WHERE id = '$item' ");
         $res3 = mysqli_fetch_assoc($sql3);
          $wks = $res3['name'];
      }
}


$section2 = $row['section'];
$sql3 = mysqli_query($link,"SELECT workers,object_name FROM extra_object WHERE 
    section='$section2'");
 while ($row3 = mysqli_fetch_assoc($sql3)) {
    $wk_id1 = $row3['workers'];
    $obj_id1 = $row3['object_id'];
    $sql_sur = mysqli_query($link,"SELECT * FROM extra_object WHERE
           workers = '$wk_id1' AND section = '$section2'");
    $res_sur = mysqli_fetch_assoc($sql_sur);

    // print_r($res_sur);

    $sur_res =  $res_sur['surface']." ";
}

$section3 = $row['section'];
$sql4 = mysqli_query($link,"SELECT workers FROM extra_object WHERE 
    section='$section3'");
 while ($row4 = mysqli_fetch_assoc($sql4)) {
    foreach ($row4 as $value) {
       $fee_id = $value;
        $sql5 = mysqli_query($link,"SELECT * FROM fee WHERE 
            worker_id = '$fee_id' ");
         $res5 = mysqli_fetch_assoc($sql5);
         $fee = $res5['fee']." ";
      }
}

$section4 = $row['section'];
$sql6 = mysqli_query($link,"SELECT * FROM extra_object WHERE 
    section='$section4'");
$sum = 0;
$i = 0;
 while ($row6 = mysqli_fetch_assoc($sql6)) {
     $wk_id = $row6['workers'];
     $sql7 = mysqli_query($link,"SELECT * FROM fee WHERE worker_id = '$wk_id'");
     $res7 = mysqli_fetch_assoc($sql7);

     $sql8 = mysqli_query($link,"SELECT * FROM extra_object WHERE workers = '$wk_id' AND section = '$section4'");
     $res8 = mysqli_fetch_assoc($sql8);


      // echo $res8['surface']." ";
      // echo $res7['fee']." ";

     $sum +=  $res7['fee'] * $res8['surface'];
      // echo $sum." <br>";
}

    

    if ($row["updated_date"] == "") {
        $up = 0;
    } else {
        $up = date("Y-m-d", $row["updated_date"]);
    }

    $cr = date("Y-m-d", $row["created_date"]);

    // array_push($obj, [
    //     $row['object_name'],
    //     $row['section'],
    //     $row['SUM(extra_object.surface)'],
    //     $wks,
    //     $cr,
    //     $up,
    //     $sur_res,
    //     $fee,
    //     $sum,
    //     $row["id"],
    //     $row["id"],
    // ]);
}

echo json_encode($obj);
