<!DOCTYPE html>
<?php
$conn = mysqli_connect("kokossvn.ddns.net:10336", "kokoss", "justmonika", "laptrinhphp_de3");
$sql = "SELECT * FROM contact";
$reader = mysqli_query($conn, $sql);
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Danh sach</title>
</head>

<body>
  <a href="_index.php">Contact...</a>
  <table border="1">
    <thead>
      <tr>
      </tr>
    </thead>
    <tbody>
      <?php
      if ($reader->num_rows > 0) {
        while ($row = $reader->fetch_assoc()) {
      ?>
          <tr>
            <?php foreach ($row as $key => $value) { ?>
              <td> <?php echo $value ?></td>
            <?php } ?>
            <td><a href="Delete_user.php?id=<?php echo $row['id'] ?>">Delete</a></td>
            <td><a href="Update_user.php?id=<?php echo $row['id'] ?>">Update</a></td>
        <?php
        }
      } else {
        echo "Ko co gi de xem";
      }
        ?>
    </tbody>
  </table>
  <script>
    <?php
    switch ($_GET["status"]) {
      case 'ok': ?>
        alert("Thanh cong!")
      <?php break;
      case 'bad': ?>
        alert("That Bai!")
    <?php break;
      default:
        break;
    }
    ?>
  </script>
</body>

</html>
