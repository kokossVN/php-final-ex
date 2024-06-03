<?php


require "control.php";
require "../etc.php";

$ninomUser = new ninomUser;
$listProductData = new listProduct;
session_start();

switch ($_GET["action"]) {
  case "login":
    if ($ninomUser->login($_POST["userName"], $_POST["userPasswd"])) {
      $_SESSION["userName"] = $_POST["userName"];
      header("Location: /ninom-proj/admin/login.php");
    } else {
      header("Location: /ninom-proj/admin/login.php?status=1");
    }
    break;

  case 'logout':
    session_destroy();
    header("Location: /ninom-proj/admin/login.php");
    break;

  case "addProduct":
    $img_name = generateRandomString(
      filename: $_FILES["pictureProduct"]["name"]
    );

    move_uploaded_file($_FILES["pictureProduct"]["tmp_name"], 'uploaded/product/' . $img_name);

    $name = $_POST["nameProduct"];
    $number = (int)$_POST["numberProduct"];
    $picture = $img_name;
    $categoryID = (int)$_POST["catogoryProduct"];
    $date = $_POST["dateProduct"];
    $price = $_POST["priceProcuct"];
    $desc = (string)$_POST["descriptionProduct"];
    $listProductData->addProduct($name, $number, $picture, $categoryID, $date, $price, $desc);

    header("Location: /ninom-proj/admin/listProduct_table.php");
    break;

  case "tableProduct":
    if (isset($_POST["update"])) {
      if (isset($_POST["productQty"]) && $_POST["productQty"] > 0) {
        $listProductData->updateQty($_POST["update"], $_POST["productQty"]);
        $status = 1;
      } else {
        $status = 2;
      }
    } elseif (isset($_POST["delete"])) {
      $listProductData->deleteProduct($_POST["delete"]);
      $status = 1;
    }
    header("Location: /ninom-proj/admin/listProduct_table.php?status=$status");
    break;

  case "deleteContact":
    deleteContact($_GET["ID"]);
    echo $_GET["ID"];
    header("Location: /ninom-proj/admin/contact_table.php");
    break;
  default:
    /* header("Location: ../contact_table.php"); */
}
