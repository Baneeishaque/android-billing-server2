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

                    <li class="active"><span><span><a href="shops.php">Shops</a></span></span></li>
<!--                    <li><span><span><a href="src/pub_view.php">Stock Details</a></span></span></li>-->
                    <li><span><span><a href="../index.php">Logout</a></span></span></li>
                </ul>
            </div>
            <div id="middle">
                <div id="left-column">

                </div>
                <div id="center-column">
                    <table class="listing form" cellpadding="0" cellspacing="0">
                        <tr>
                            <th class="full" ></th>
                            <th class="full" ></th>
                            <th class="full" ></th>
                            <th class="full" ><input type="text" name="search_key" value="" /></th>
                            <th class="full" ><input type="button" value="Search" name="search" /></th>
                        </tr>
                        <tr>
                            <th class="full" >Reg. No.</th>
                            <th class="full" >Name</th>
                            <th class="full" >Category</th>
                            <th class="full" >Location</th>
                            <th class="full" ></th>

                        </tr>
                        <?php
                        require 'dbconfig.php';

                        try {
                            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                            $owner = $_GET['owner'];
                            $bill_id_sql = "SELECT * FROM SHOP where owner=$owner";
                            $result = $conn->prepare($bill_id_sql);
                            if ($result->execute()) {
                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                    echo '<tr>
                            <td>' . $row['reg.no'] . '</td>
                            <td>' . $row['name'] . '</td>
                            <td>' . $row['category'] . '</td>
                            <td>' . $row['location'] . '</td>
                            <td><a href="shop_details.php?id=' . $row['reg.no'] . '"><input type="button" value="View" name="view" /></a></td>
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

                    <table class="listing form" cellpadding="0" cellspacing="0">
                        <tr>
                            <th class="full" ></th>
                            <th class="full" ></th>
                            <th class="full" ></th>
                            <th class="full" ></th>
                            <th class="full" ></th>
                        </tr>
                        <tr>
                            <th class="full" ></th>
                            <th class="full" ></th>
                            <th class="full" ></th>
                            <th class="full" ></th>
                            <th class="full" ></th>

                        </tr>
                        <?php
                        require 'dbconfig.php';

                        try {
                            $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                            $owner = $_GET['owner'];
                            $bill_id_sql = "SELECT * FROM SHOP where owner!=$owner";
                            $result = $conn->prepare($bill_id_sql);
                            if ($result->execute()) {
                                while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                    echo '<tr>
                            <td>' . $row['reg.no'] . '</td>
                            <td>' . $row['name'] . '</td>
                            <td>' . $row['category'] . '</td>
                            <td>' . $row['location'] . '</td>
                            <td><a href="shop_details.php?id=' . $row['reg.no'] . '"><input type="button" value="View" name="view" /></a></td>
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
