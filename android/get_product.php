<?php

include_once 'config.php';
$id = filter_input(INPUT_POST, 'id');
$bill_id_sql = "SELECT * FROM `product` where id=$id";
$result = $con->query($bill_id_sql);
$emptyarray = array();
while ($row = mysqli_fetch_assoc($result)) {
    $emptyarray[] = $row;
}
echo json_encode($emptyarray);
