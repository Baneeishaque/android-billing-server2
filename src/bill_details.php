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
                    <!-- <li class="active"><span><span><a href="shop_details.php">Shop Details</a></span></span></li> -->
                    <!--<li><span><span><a href="src/pub_view.php">Stock Details</a></span></span></li>-->
    <!--                <li><span><span><a href="src/pub_per_view.php">Account Overview</a></span></span></li> -->
                    <li class="active"><span><span><a href="#">Bill Details</a></span></span></li>
                    <!-- <li><span><span><a href="src/pub_per_view.php">Purchase Bills</a></span></span></li> -->
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

                                $sql = "SELECT * FROM PURCHASE WHERE `BILL-NO`=" . $_GET['bill'];
                                $result = $conn->query($sql);
                                if ($result->execute()) {
                                    $row = $result->fetch(PDO::FETCH_ASSOC);
                                    echo '
                        <th class="full" >Client Name</th>
                            <th class="full" >' . $row['customer-name'] . '</th>
                            <th class="full" >Mobile</th>
                            <th class="full" >' . $row['customer-mob'] . '</th>

                            <th class="full" ></th>
';
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
                            <?php
                            echo '
                        <th class="full" >Tim</th>
                            <th class="full" >' . $_GET['time'] . '</th>
                            <th class="full" ></th>
                            <th class="full" ></th>
                            <th class="full" ></th>
                            <th class="full" ></th>

                            <th class="full" ></th>
';
                            ?>

                        </tr>

                    </table>
                    <br></br>
                    <table class="listing form" cellpadding="0" cellspacing="0">

                        <tr>
                            <th class="full" >Item</th>
                            <th class="full" >Qty</th>
                            <th class="full" >Price</th>
                            <th class="full" >Tax</th>
                            <th class="full" >Total Price</th>
                            <th class="full" >Net Price</th>


                        </tr>
                        <?php
                        try {
                            $sql = "SELECT `product`.`name`,`qty`,`product`.`unit-price`,`product`.`tax`,`product`.`unit-price`+`product`.`tax` AS `total_price`,(`product`.`unit-price`+`product`.`tax`)*`qty` AS `net_price` FROM `product`,`bill` WHERE `bill`.`id`=" . $_GET['bill'] . " AND `product`.`id`=`bill`.`product_id`";
//                            echo $sql;
                            $result = $conn->prepare($sql);
                            if ($result->execute()) {
                                $grand_price=0;
                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                    echo '<tr>
                            <td>' . $row['name'] . '</td>
                            <td>' . $row['qty'] . '</td>';
              echo '              <td>' . $row['unit-price'] . '</td>
                                <td>' . $row['tax'] . '</td>
                       <td>' . $row['total_price'] . '</td>'
                      . '<td>' . $row['net_price'] . '</td>';
$grand_price=$grand_price+$row['net_price'];

                                    echo '</tr>';
                                }
                                
                                         echo '<tr>
                            <td></td>
                            <td></td>';
              echo '              <td></td>
                                <td></td>
                       <td>Grand Total</td>'
                      . '<td>' . $grand_price . '</td>';

                                    echo '</tr>';
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
