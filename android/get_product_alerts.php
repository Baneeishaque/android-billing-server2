<?php

include_once 'config.php';
$bill_id_sql = "SELECT * FROM `product` where `minimum-stock` >= stock";
$result = $con->query($bill_id_sql);
$emptyarray = array();
while ($row = mysqli_fetch_assoc($result)) {
    $emptyarray[] = $row;
}
echo json_encode($emptyarray);
