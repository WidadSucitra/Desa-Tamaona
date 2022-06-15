<?php
include "admin/config.php";

$query = "SELECT * FROM pekerjaan ORDER BY id ASC";
$result = mysqli_query($conn, $query);

if(!$result) {
    die("Query Error : ".mysqli_errno($conn)." - ".mysqli_errno($conn));
}

$array=array();
while ($data = mysqli_fetch_assoc($result)) {
    $array[]=$data;
}

echo json_encode($array);

echo ($data)
?>

