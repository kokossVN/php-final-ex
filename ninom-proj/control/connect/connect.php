<?php
$server = "kokossvn.ddns.net:10336";
$user = "kokoss";
$pass = "justmonika";
$database = "laptrinhphp";
$conn = mysqli_connect($server, $user, $pass, $database);
function conn_test()
{
  global $conn;
  if (!$conn->connect_error) {
    echo "Hello world!";
  }
}
