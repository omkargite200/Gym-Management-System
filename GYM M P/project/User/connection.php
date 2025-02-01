<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "gym";

$con = mysqli_connect($server, $username, $password, $dbname);

if(!$con)
{
    echo "Not Connected.....!";
}
else
{
    // echo "You Are Connected With database..";
}
?>