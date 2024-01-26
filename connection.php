<?php
$localhost="127.0.0.1";
$username="root";
$passwd="";
$dbname="grocery store";
$connect=new mysqli($localhost,$username,$passwd,$dbname);
$connect->set_charset("utf8mb4");

if($connect->connect_error)
{
    die("connection failed");
}

?>