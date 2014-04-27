<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'lcss.php';
$buf = "";
lcss("thisisatest", "testing123testing", $buf);
echo $buf;


//test

?>