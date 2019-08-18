<?php

include_once 'config.php';
$shop = filter_input(INPUT_POST, 'shop');
$bill_sql = "SELECT `bill-no`,`customer-name`, `day`, `month`, `year` FROM `purchase` where `shop-id`=$shop";
$bill_result = $con->query($bill_sql);
$emptyarray = array();
while ($row = mysqli_fetch_assoc($bill_result)) {
    $emptyarray[] = $row;
}
echo json_encode($emptyarray);
