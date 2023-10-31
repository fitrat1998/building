<?php
include "../config.php";

$name = $_POST["tbody"];

$total = 0;

$sum = 0;

$obj = [];

$sql = mysqli_query(
    $link,
    "SELECT object_name,workers,section,created_date, updated_date, SUM(surface) FROM extra_object 
       WHERE object_name = '$name' GROUP BY workers HAVING COUNT(surface) > 0"
);

while ($row = mysqli_fetch_assoc($sql)) {
    $wk_id1 = explode(",", $row1["workers"]);
    array_pop($wk_id1);

    $wid = $wk_id1[0];
    $section2 = $row["section"];

    $row["object_name"];

    $wk_id = $row["workers"];
    $sql2 = mysqli_query($link, "SELECT * FROM workers WHERE id = '$wk_id'");
    $res2 = mysqli_fetch_assoc($sql2);
    $wk = $res2["name"];


    $row["SUM(surface)"];

    $wk_id2 = explode(",", $row["workers"]);
    array_pop($wk_id2);
    foreach ($wk_id2 as $key) {
        $sql3 = mysqli_query(
            $link,
            "SELECT * FROM fee WHERE worker_id = '$key'"
        );
        $res3 = mysqli_fetch_assoc($sql3);
        $fee = $res3["fee"];
    }

    

    if ($row["updated_date"] == "") {
        $up = 0;
    } else {
        $up = date("Y-m-d", $row["updated_date"]);
    }

    $cr = date("Y-m-d", $row["created_date"]);

    array_push($obj, [
        $row["object_name"],
        $wk,
        $row["SUM(surface)"],
        $res3["fee"],
        $cr,
        $up,
        $fee * $row["SUM(surface)"],
        $row["id"],
        $row["id"],
    ]);
}

echo json_encode($obj);
