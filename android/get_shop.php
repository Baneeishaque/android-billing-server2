<?php

include_once 'config.php';
$shop = filter_input(INPUT_POST, 'shop');
$bill_id_sql = "SELECT * FROM `shop` where `reg.no`=$shop";
//echo $bill_id_sql;
$result = $con->query($bill_id_sql);
$emptyarray = array();
while ($row = mysqli_fetch_assoc($result)) {
    $emptyarray[] = $row;
}
echo json_encode($emptyarray);
