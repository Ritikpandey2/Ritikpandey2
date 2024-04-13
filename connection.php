<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "your_database_name";


if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
