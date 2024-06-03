<?php


include "connect.php";

function selectContact()
{
  global $conn;
  $sql = "SELECT * FROM contact";
  return mysqli_query($conn, $sql);
}
function deleteContact($id)
{
  global $conn;
  $sql = "DELETE FROM contact WHERE ID=$id";
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

  function selectUser_username($username)
  {
    global  $conn;
    $sql = "SELECT * FROM user WHERE username='$username'";
    $run = mysqli_query($conn, $sql);
    return $run;
  }
}
class listProduct
{
  function selectCategory()
  {
    global $conn;
    $sql = "SELECT * FROM category";
    return mysqli_query($conn, $sql);
  }

  public  function addProduct($name, $number, $picture, $categoryID, $date, $price, $description)
  {
    global $conn;
    $sql = "INSERT INTO listProduct(name,number,picture,categoryID,date,price,description) VALUES  ('$name',$number,'$picture',$categoryID,'$date','$price','$description')";
    mysqli_query($conn, $sql);
  }

  function deleteProduct($id)
  {
    global $conn;
    $sql = "DELETE FROM listProduct WHERE ID=$id";
    return mysqli_query($conn, $sql);
  }

  function selectListProduct()
  {
    global $conn;
    $sql = "SELECT * FROM listProduct";
    return mysqli_query($conn, $sql);
  }
  function updateQty($id, $qty)
  {
    global $conn;
    $sql = "UPDATE listProduct SET number='$qty' WHERE listProduct.ID='$id'";
    return mysqli_query($conn, $sql);
  }
}
