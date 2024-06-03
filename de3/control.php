<?php
$fname = $_POST["fname"];
$email = $_POST["email"];
$phoneno = $_POST["tax"];
$message  = $_POST["message"];

$conn = mysqli_connect("kokossvn.ddns.net:10336", "kokoss", "justmonika", "laptrinhphp_de3");


$sql = "INSERT INTO contact (fullname,email,phoneno,message) VALUE ('$fname','$email','$phoneno','$message')";

if (mysqli_query($conn, $sql)) {
  header("location: _index.php?status=ok");
} else {
  header("location: _index.php?status=bad");
}
