<?php
include_once 'config.php';
$name=$_POST['name'];
$category=$_POST['category'];
$location=$_POST['location'];
$owner=$_POST['owner'];
$bill_id_sql="INSERT INTO `shop`(`name`, `category`, `location`,owner) VALUES ('$name','$category','$location','$owner')";
if($con->query($bill_id_sql))
{
    echo "0";
}
 else {
      echo "1";
    
    
}