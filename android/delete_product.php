<?php
include_once 'config.php';
$id=$_POST['id'];
$bill_id_sql="DELETE FROM `product` WHERE `id`=$id";
if($con->query($bill_id_sql))
{
    echo "0";
}
 else {
      echo "1";
    
    
}