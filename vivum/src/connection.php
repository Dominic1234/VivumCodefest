<?php
$servername = "localhost:3306";
$username   = "root";
$password   = "codefest";
$dbname     = "vivum";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
}

?>
