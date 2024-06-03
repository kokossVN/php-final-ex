<?php
$server = "localhost:3306";
$user = "root";
$pass = "";
$database = "laptrinhphp";
$conn = mysqli_connect($server, $user, $pass, $database);
if (!$conn->connect_error) {
  echo "Hello world!";
}
