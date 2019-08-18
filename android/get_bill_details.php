<?php

include_once 'config.php';

$bill = filter_input(INPUT_POST, 'bill');
$bill_sql = "SELECT name,`unit-price`,tax,`qty` FROM `bill`,product WHERE `product_id`=product.id AND bill.id=$bill";
//echo $bill_sql;
$bill_result = $con->query($bill_sql);
$emptyarray = array();
while ($row = mysqli_fetch_assoc($bill_result)) {
    $emptyarray[] = $row;
}
echo json_encode($emptyarray);
