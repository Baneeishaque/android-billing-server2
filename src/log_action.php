<?php

require 'dbconfig.php';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    $bill_id_sql = "SELECT * FROM USER WHERE `username`=:user AND `password`=:pass AND `role`='owner'";
    $result = $conn->prepare($bill_id_sql);
    $result->bindParam(':user', $_POST['username'], PDO::PARAM_STR);
    $result->bindParam(':pass', $_POST['password'], PDO::PARAM_STR);

    if ($result->execute()) {
        $number_of_rows = $result->rowCount();

        if ($number_of_rows > 0) {

//            session_start();
//            $_SESSION["user"] = $_POST['username'];
            $row = $result->fetch(PDO::FETCH_ASSOC);
			$id=$row['id'];
//            if ($row['role'] == "admin") {
//              header("Location: admin_das.php");
//              } else {
//              header("Location: user_das.php");
//              }
			$location="Location: shops.php?owner=$id";
            header($location);
        } else {
//            echo '<div id="box"><label>Username Or Password Was Incorrect</label></div>';
            echo '<script>alert("Username Or Password Was Incorrect")</script>';
            header("Location: ../index.php");
        }
    } else {
        die("Can't execute the query");
    }
} catch (PDOException $pe) {
    die("Can't connect to the database $dbname :" . $pe->getMessage());
}
