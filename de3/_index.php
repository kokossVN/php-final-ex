<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>De 3</title>
</head>

<body>
  <a href="list.php">List...</a>
  <form method="post" action="control.php">
    <input type="text" name="fname" placeholder="full name"><br>
    <input type="text" name="email" placeholder="Email" required><br>
    <input type="text" name="tax" placeholder="Phone number" required><br>
    <textarea placeholder="Message" name="message"></textarea>
    <button name="send">SEND</button>
  </form>
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
