<?php

include '../sql_details.php';

$result = mysql_query("SELECT active FROM dot_matrix_printer WHERE id = '1'");
if (!$result) {
    echo 'Could not run query: ' . mysql_error();
    exit;
}
$row = mysql_fetch_row($result);

$status = $row[0]; //print the status 

echo "Current status is " . $status;




















?>