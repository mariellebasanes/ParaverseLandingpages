<?php

session_name('mbg');
session_start();

$_SESSION = array();
session_destroy();

session_start();
$_SESSION['temp_loggedin'] = true;
$_SESSION['verify'] = 1;
$_SESSION['identification'] = "T202403723N";
$_SESSION['email'] = "mmvillaruz@feutech.edu.ph";
header("location: /elicit/");

?>