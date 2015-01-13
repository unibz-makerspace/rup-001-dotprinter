<?php

ini_set('display_errors',1);

// $mex = $_POST['mex'];
// $to = "daniele.gadler@yahoo.it";
// $object = $_POST['object'];
// $from = $_POST['email'];


$mex = $_GET['mex'];
$to = "daniele.gadler@yahoo.it";
$object = $_GET['object'];
$from = $_GET['email'];

mail($to,$object,$mex,$from);



?>