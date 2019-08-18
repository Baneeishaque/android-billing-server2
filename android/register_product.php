<?php
include_once 'config.php';
$name=$_POST['name'];
$unit=$_POST['unit-price'];
$tax=$_POST['tax'];
$stock=$_POST['stock'];
$minimum=$_POST['minimum-stock'];
$shop=$_POST['shop'];
$bill_id_sql="INSERT INTO `product`(`name`, `unit-price`,`tax`, `stock`, `minimum-stock`,shop_id) VALUES ('$name',$unit,$tax,$stock,$minimum,$shop)";
if($con->query($bill_id_sql))
{
    echo "0";
}
 else {
      echo "1";
    
    
}