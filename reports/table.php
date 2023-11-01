<?php
session_start();
include "../config.php";
include '../date.php';

$ide = $_POST["ide"];
// echo $ide;

$start_date = strtotime($_POST["start"]);
// echo $start_date;

$finish_date = strtotime($_POST["finish"]);
// echo $finish_date;

$section_name_list = [];

// RETURN VALUES FOR REPORT DATA TABLE
$return_values = [];

$sql2 = mysqli_query($link, "SELECT * FROM sections WHERE parent = 'flat'");

$temp_arr = [];

while ($row = mysqli_fetch_assoc($sql2)) {
    array_push($temp_arr, $row['id']);
    array_push($section_name_list, [
        $row['section_name'],
    ]);
}

$temp_arr2 = [];

if(empty($start_date) && empty($finish_date)) {
    $sql3 = mysqli_query($link, "SELECT * FROM `extra_object` WHERE object_name = '$ide'");
}
elseif(empty($start_date) && !empty($finish_date)) {
    $sql3 = mysqli_query($link, "SELECT * FROM `extra_object` WHERE created_date BETWEEN '$start_date' AND '$finish_date';");
}
elseif(!empty($start_date) && empty($finish_date)) {
    $sql3 = mysqli_query($link, "SELECT * FROM `extra_object` WHERE created_date <= '$finish_date'");
}
else{
    // $sql3 = mysqli_query($link, "SELECT * FROM `extra_object` WHERE created_date >= '$start_date' AND created_date <= '$finish_date'");

    $sql3 = mysqli_query($link, "SELECT * FROM `extra_object` WHERE created_date BETWEEN'$start_date' AND created_date '$finish_date'");
}

while ($row3 = mysqli_fetch_assoc($sql3)) {
    array_push($temp_arr2, $row3);
}

foreach ($temp_arr2 as $key => $value) {
    $row = explode(",", $value['surface']);

    $newRow = [];

    $index = 0;

    array_pop($row);
    array_push($return_values, $row);
}

// RETURN DATA TABLE VALUES FOR REPORT
echo json_encode($return_values);

