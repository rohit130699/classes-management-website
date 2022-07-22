<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "snclasses"; 

$con = mysqli_connect($servername,$username,$password,$dbname);

if(!$con)
{
die('Some Fault Occured..');
}
?>