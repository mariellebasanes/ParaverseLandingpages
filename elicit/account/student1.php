<?php

session_name('mbg');
session_start();

$_SESSION = array();
session_destroy();

session_start();
$_SESSION['temp_loggedin'] = true;
$_SESSION['verify'] = 1;
$_SESSION['identification'] = "T202110117";
$_SESSION['email'] = "mdbasanes@fit.edu.ph";
header("location: /elicit/");

?>