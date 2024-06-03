<?php
include "connect.php";
function addContact($data)
{
  global $conn;
  $fullname = $data["fullname"];
  $email = $data["email"];
  $phonenumber = $data["phonenumber"];
  $message = $data["message"];
  $sql = "INSERT INTO contact (fullname,email,phonenumber,message) VALUES ('$fullname','$email','$phonenumber','$message')";
  mysqli_query($conn, $sql);
}

class ninomUser
{
  public function  signupUser($username, $passwd, $avatar, $address, $hobby)
  {
    global $conn;
    $sql = "INSERT INTO user (username,passwd,avatar,address,hobby) VALUE ('$username','$passwd','$avatar','$address','$hobby')";
    mysqli_query($conn, $sql);
  }
  public function  userExist($username)
  {
    global  $conn;
    $sql = "SELECT username FROM user WHERE username='$username'";
    $run = mysqli_query($conn, $sql);
    echo $run->num_rows;
    return $run->num_rows > 0  ? true : false;
  }
  public function login($username, $passwd)
  {
    global  $conn;
    $sql = "SELECT username FROM user WHERE username='$username' AND passwd='$passwd'";
    $run = mysqli_query($conn, $sql);
    echo $run->num_rows;
    return $run->num_rows == 1  ? true : false;
  }
  public function orderProduct($userName, $productID, $qty)
  {
    global $conn;
    $sql = "INSERT INTO listOrder (userID,productID,qty,statusID) VALUE ((SELECT ID FROM user  WHERE username='$userName'),'$productID','$qty',1)";
    echo $sql;
    $run = mysqli_query($conn, $sql);
    return $run;
  }
  public function addToCart($id, $qty)
  {
    $listProductData = new listProduct;
    $run = $listProductData->getProduct_id($id)->fetch_assoc();
    if (!is_array($_SESSION["cart"])) {
      $_SESSION["cart"] = [];
    }
    if (isset($_SESSION["cart"][$id])) {
      $_SESSION["cart"][$id]["qty"] += $qty;
    } else {
      $_SESSION["cart"]["$id"] = [
        'id' => $id,
        'name' => $run["name"],
        'price' => $run["price"],
        'qty ' => $qty
      ];
    }
  }
}

class listProduct
{
  public function getProduct_all()
  {
    global  $conn;
    $sql = "SELECT * FROM listProduct";
    $run = mysqli_query($conn, $sql);
    return $run;
  }
  public function getProduct_id($id)
  {
    global  $conn;
    $sql = "SELECT * FROM listProduct WHERE ID=$id";
    $run = mysqli_query($conn, $sql);
    return $run;
  }
}
