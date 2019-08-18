<?php

     require_once('config.php');
     
     
     $date = $_GET["date"];
     $branch = $_GET["branch"];
     $semester = $_GET["semester"];
     
     $bill_id_sql = "SELECT `register no`, name, presence FROM attendence where date='.$date.' and branch='.$branch.' and semester='.$semester.";
        foreach ($db->query($bill_id_sql) as $row) {
       
        $msg='<table class="listing form" cellpadding="0" cellspacing="0">
                            <tr>
                                <th class="full">SEARCH RESULT</th>
                                </th>
                                <tr>
                                    <th class="full">Register No</th>
                                    <th class="full">Name </th>
                                    <th class="full">Pre/Absc </th>
                                </tr>
                                <tr>
                                    <td>'.$row["register no"].'</td>
                                    <td>'.$row["name"].'</td>
                                    <td>'.$row["presence"].'</td>
                                </tr>
                               
                        </table>';
    }
     
    
     
     echo $msg;







