<?php
include '../sql_details.php';


$status = $_GET['status'];

mysql_query("UPDATE dot_matrix_printer SET active= '$status' WHERE id = 1");


echo "new status is now " . $status;







?>
