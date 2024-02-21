<?php
ob_start();
session_start();

$db_server = "127.0.0.1";
$db_user = "root";
$db_pass = "";
$db_name = "talatales";

$dbcon = new mysqli($db_server,$db_user,$db_pass,$db_name);
if ($dbcon->connect_error) 
{
    die("Connection failed: " . $dbcon->connect_error);
}
?>

