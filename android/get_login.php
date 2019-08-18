<?php

include_once 'config.php';
$username = $_POST['username'];
$password = $_POST['password'];
$bill_id_sql = "SELECT COUNT(`username`) AS `count`,username,id,`shop_id`,role,shop.name AS shop_name,shop.category AS shop_category FROM `user`,shop WHERE username='$username' and password='$password' AND `user`.`shop_id`=`shop`.`reg.no`";
//echo $bill_id_sql;
$result = $con->query($bill_id_sql);
$emptyarray = array();
$emptyarray[] = mysqli_fetch_assoc($result);
echo json_encode($emptyarray);

