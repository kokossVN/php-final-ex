<?php
$conn = mysqli_connect("kokossvn.ddns.net:10336", "kokoss", "justmonika", "laptrinhphp_de3");
$id = $_GET["id"];
$sql = "DELETE FROM contact WHERE contact.id = $id";


if (mysqli_query($conn, $sql)) {
  header("location: list.php?status=ok");
} else {
  header("location: list.php?status=bad");
}
