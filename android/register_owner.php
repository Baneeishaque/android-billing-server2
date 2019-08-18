<?php
include_once 'config.php';
$username=$_POST['username'];
$password=$_POST['password'];
$email=$_POST['email'];
$bill_id_sql="INSERT INTO `user`(`username`, `password`, `email`, `role`,name) VALUES ('$username','$password','$email','owner','0')";
if($con->query($bill_id_sql))
{
    echo "0";
}
 else {
      echo "1";
    
    
}