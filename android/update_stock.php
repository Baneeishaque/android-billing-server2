<?php
include_once 'config.php';
$stock=$_POST['stock'];
$id=$_POST['id'];
$bill_id_sql="UPDATE `product` SET `stock`=$stock WHERE `id`=$id";
if($con->query($bill_id_sql))
{
    echo "0";
}
 else {
      echo "1";
    
    
}