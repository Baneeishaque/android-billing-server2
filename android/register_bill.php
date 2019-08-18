<?php

include_once 'config.php';
$customer_name = filter_input(INPUT_POST, 'customer_name');
$customer_mobile = filter_input(INPUT_POST, 'customer_mobile');
$item_amount_string = filter_input(INPUT_POST, 'item_amount');
//echo $item_amount;

$items = explode("-", $item_amount_string);
//print_r($items);

$shop = filter_input(INPUT_POST, 'shop');


$bill_id_query = "SELECT MAX(id) AS id from bill";
$bill_no_result = $con->query($bill_id_query);
//print_r($result);

$bill_no_row = mysqli_fetch_assoc($bill_no_result);
//echo $row['id'];
if ($bill_no_row['id'] == '') {
    $bill_no = 1;
} else {
    $bill_no = $bill_no_row['id'] + 1;
}
//echo $bill_no;

foreach ($items as &$value) {
//    echo $value;
    $values = explode(":", $value);
//        echo $values[0];

    $bill_insertion_sql = "INSERT INTO `bill`(`id`, `product_id`, `qty`) VALUES ($bill_no,'$values[0]','$values[1]')";
    if ($con->query($bill_insertion_sql)) {

        $stock_query = "SELECT `stock` FROM `product` WHERE `id`='$values[0]'";
        $stock_result = $con->query($stock_query);
        $stock_row = mysqli_fetch_assoc($stock_result);

        $current_stock = $stock_row['stock'];
        $stock_update_query = "UPDATE `product` SET `stock`=$current_stock-$values[1] WHERE `id`='$values[0]'";
        if (!$con->query($stock_update_query)) {
            echo mysqli_error($con);
            exit();
        }
    } else {
        echo mysqli_error($con);
        exit();
    }
}

$purchase_query = "INSERT INTO `purchase`(`bill-no`, `shop-id`,`customer-name`, `customer-mob`, `day`, `month`, `year`) VALUES ($bill_no,$shop,'$customer_name','$customer_mobile',DATE_FORMAT(NOW(),'%d'),DATE_FORMAT(NOW(),'%m'),DATE_FORMAT(NOW(),'%Y'))";
if ($con->query($purchase_query)) {
    echo "0";
} else {
    echo mysqli_error($con);
}


