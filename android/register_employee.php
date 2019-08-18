<?php

include_once 'config.php';
$username = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];
$shop = $_POST['shop'];
$email = $_POST['email'];
$bill_id_sql = "INSERT INTO `user`(`username`, `password`, `email`, `role`,shop_id,name) VALUES ('$username','$password','$email','keeper',$shop,'$name')";
if ($con->query($bill_id_sql)) {

    echo "0";
} else {
    echo "1";
}

