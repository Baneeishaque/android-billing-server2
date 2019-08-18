<?php
include_once 'config.php';
$admin=$_POST['admin'];
$shop=$_POST['shop'];
$bill_id_sql="UPDATE `shop` SET `admin`=$admin WHERE `reg.no`=$shop";
if($con->query($bill_id_sql))
{
    echo "0";
}
 else {
      echo "1";
    
    
}