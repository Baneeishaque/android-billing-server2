<?php

include_once 'config.php';
$name = $_POST['name'];
$unit = $_POST['unit-price'];
$tax = $_POST['tax'];
$stock = $_POST['stock'];
$minimum = $_POST['minimum-stock'];
$id = $_POST['id'];
$bill_id_sql = "UPDATE `product` SET `name`='$name',"
        . "`unit-price`=$unit,`tax`=$tax,`stock`=$stock,"
        . "`minimum-stock`=$minimum WHERE `id`=$id";
if ($con->query($bill_id_sql)) {
    echo "0";
} else {
    echo mysqli_error($con);
}