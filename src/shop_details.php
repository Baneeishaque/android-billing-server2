<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>


    <head>
        <title>User Dashboard</title>
        <meta http-equiv="content-type" content="text/html; charset=iso-8859-1"/>
        <style media="all" type="text/css">@import "../css/all.css";</style>
    </head>
    <body>
        <div id="main">
            <div id="header">
                <a href="shops.php" class="logo"><img src="../img/logos.jpeg" width="501" height="50" alt=""/></a>
                <ul id="top-navigation">

                    <li><span><span><a href="shops.php">Shops</a></span></span></li>
                    <li class="active"><span><span><a href="shop_details.php">Shop Details</a></span></span></li>
<!--                    <li><span><span><a href="src/pub_view.php">Stock Details</a></span></span></li>-->
    <!--                <li><span><span><a href="src/pub_per_view.php">Account Overview</a></span></span></li>
                    <li><span><span><a href="src/pub_per_view.php">Account Details</a></span></span></li>
                    <li><span><span><a href="src/pub_per_view.php">Purchase Bills</a></span></span></li> -->
                    <li><span><span><a href="../index.php">Logout</a></span></span></li>
                </ul>
            </div>
            <div id="middle">
                <div id="left-column">

                </div>
                <div id="center-column">
                    <table class="listing form" cellpadding="0" cellspacing="0">
                        <tr>
                            <?php
                            require 'dbconfig.php';
                            try {
                                $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

                                $bill_id_sql = "SELECT SHOP.NAME AS NAME,USER.NAME AS `ADMIN-NAME` FROM SHOP,USER WHERE `REG.NO`=" . $_GET['id'] . " AND `shop_id`=" . $_GET['id'] . "";
                                $result = $conn->prepare($bill_id_sql);
                                if ($result->execute()) {
                                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                        echo '
                        <th class="full" >Name</th>
                            <th class="full" >' . $row['NAME'] . '</th>
                            <th class="full" >Keeper</th>
                            <th class="full" >' . $row['ADMIN-NAME'] . '</th>
                            <th class="full" >Mobile</th>
                            <th class="full" >9895204814</th>

                            <th class="full" ></th>
';
                                    }
                                } else {
                                    die("Can't execute the query");
                                }
                            } catch (PDOException $pe) {
                                die("Can't connect to the database $dbname :" . $pe->getMessage());
                            }
                            ?>

                        </tr>

                    </table>
                    <br></br>
                    <table class="listing form" cellpadding="0" cellspacing="0">


                        <tr>
                            <th class="full" ><input type="button" value="Per Day" name="search" /></th>
                            <th class="full" ><input type="button" value="Per Month" name="search" /></th>
                            <th class="full" ><input type="button" value="Per Year" name="search" /></th>
                            <th class="full" ><input type="text" name="search_key" value="" /></th>
                            <th class="full" ><input type="button" value="Custom Date" name="search" /></th>
                            <th class="full" ></th>


                        </tr>


                    </table>
                    <br></br>
                    <table class="listing form" cellpadding="0" cellspacing="0">

                        <tr>
                            <th class="full" >Date</th>
                            <th class="full" >Total Amount</th>
                            <th class="full" >Total Tax</th>
                            <th class="full" >Net Amount</th>
                            <th class="full" ></th>


                        </tr>
                        <?php
                        try {
                            $bill_id_sql = "SELECT DISTINCT DATE_FORMAT(`time`,'%d-%m-%Y') AS `date` FROM `purchase` WHERE `SHOP-ID`=" . $_GET['id'] . "";
//                            echo $bill_id_sql;
                            $result = $conn->prepare($bill_id_sql);
                            if ($result->execute()) {
//                                $total_price = 0;
//                                $total_tax = 0;
                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                    echo '<tr>
                            <td>' . $row['date'] . '</td>';
                                    $bill_id_sql2 = "SELECT `bill-no` FROM `purchase` WHERE `shop-id`=" . $_GET['id'] . " AND DATE_FORMAT(`time`,'%d-%m-%Y')='" . $row['date'] . "'";
                                    
                                    $day=$row['date'];
                                    $result2 = $conn->prepare($bill_id_sql2);
                                    if ($result2->execute()) {
                                        $i = 0;
                                        while ($row2 = $result2->fetch(PDO::FETCH_ASSOC)) {
                                            if ($i == 0) {
                                                $bill_id_sql3 = "SELECT name,`unit-price`,`tax`,SUM(`unit-price`*`qty`) AS `product_total`,SUM(`tax`*`qty`) AS `tax_total`,SUM(  `unit-price` *  `qty` ) + SUM(  `tax` *  `qty` ) AS total FROM `product`,`bill` WHERE `bill`.`product_id`=`product`.`id` AND (`bill`.`id`=" . $row2['bill-no'] . "";
                                            } else {
                                                $bill_id_sql3 = $bill_id_sql3 . " OR `bill`.`id`=" . $row2['bill-no'] . "";
                                            }
                                            $i++;
                                        }
                                        $bill_id_sql3 = $bill_id_sql3 . ")";


                                        $result3 = $conn->prepare($bill_id_sql3);
                                        if ($result3->execute()) {
                                            $row3 = $result3->fetch(PDO::FETCH_ASSOC);
                                            echo "<td>" . $row3['product_total'] . "</td>
                            <td>" . $row3['tax_total'] . "</td>
                            <td>" . $row3['total'] . "</td>";
                                        } else {
                                            die("Can't execute the query");
                                        }
//                                        echo $bill_id_sql3;
                                    } else {
                                        die("Can't execute the query");
                                    }
                                    $shop_id = $_GET['id'];
                                    echo '<td><a href="account_details.php?id=' . $shop_id . '&day=' . $day . '"><input type="button" value="View" name="view" /></a></td>

                        </tr>';
                                }
                            } else {
                                die("Can't execute the query");
                            }
                        } catch (PDOException $pe) {
                            die("Can't connect to the database $dbname :" . $pe->getMessage());
                        }
                        ?>

                    </table>
                </div>
            </div>
        </div>

    </body>



</html>
