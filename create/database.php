<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbName = "userdata";

//create connection
$connect = new mysqli($servername,
$username,
$password,
$dbName
);

if($connect -> connect_error){
    die("connection failed ".$connect->connect_error);
}