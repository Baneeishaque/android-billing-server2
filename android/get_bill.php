<?php

include_once 'config.php';

$bill = filter_input(INPUT_POST, 'bill');
$bill_sql = "SELECT `shop-id`,`customer-name`,`customer-mob`, `day`, `month`, `year`,time FROM `purchase` where `bill-no`=$bill";
$bill_result = $con->query($bill_sql);
$emptyarray = array();
while ($row = mysqli_fetch_assoc($bill_result)) {
    $emptyarray[] = $row;
}
echo json_encode($emptyarray);
