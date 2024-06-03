<?php
include "control.php";
$ninomUser = new ninomUser;
session_start();
switch ($_GET["action"]) {
  case 'signup':
    $userHobby = "";
    if (isset($_POST["userHobby"])) {
      foreach ($_POST["userHobby"] as $key => $value) {
        $userHobby .= $value . " ";
      }
    } else {
      $userHobby = "";
    }
    /* move_uploaded_file($_FILES["userAvt"]["tmp_name"], 'uploaded/user_avt/' . $_FILES["uploadfile"]["name"]); */

    if ($_POST["userPasswd"]  == $_POST["userRePasswd"]) {
      if ($ninomUser->userExist($_POST["userName"])) {
        header("Location: /ninom-proj/user/signup.php?error=2");
      } else {
        $ninomUser->signupUser($_POST["userName"], $_POST["userPasswd"], $_FILES["userAvt"]["name"], $_POST["userAddr"], $userHobby);
        header("Location: /ninom-proj/user/signup.php");
      }
    } else {
      header("Location: /ninom-proj/user/signup.php?error=1");
    }
    break;
  case  'login':
    if ($ninomUser->login($_POST["userName"], $_POST["userPasswd"])) {
      $_SESSION["userName"] = $_POST["userName"];
      header("Location: /ninom-proj/user/login.php");
    } else {
      header("Location: /ninom-proj/user/login.php?status=1");
    }
    break;
  case 'logout':
    session_destroy();
    header("Location: /ninom-proj/user/login.php");
  case 'sentContact':
    addContact($_POST);
    header("location: /ninom-proj/user/_index.php");
    break;

  case 'orderEvent':
    if (isset($_POST["order"])) {
      $ninomUser->orderProduct($_SESSION["userName"], $_POST["order"], $_POST["qty"]);
    }
    if (isset($_POST["addToCart"])) {
      $ninomUser->addToCart($_POST["addToCart"], $_POST["qty"]);
    }

  case 'addToCart':
    $ninomUser->addToCart($_GET["ID"], 1);
    break;
  case 'order':
    echo "order: " . $_GET["ID"];
    break;
  default:
    # code...
    break;
}
