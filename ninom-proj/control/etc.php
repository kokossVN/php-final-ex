<?php
function generateRandomString($filename)
{
  $ext = pathinfo($filename, PATHINFO_EXTENSION);
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < 8; $i++) {
    $randomString .= $characters[random_int(0, $charactersLength - 1)];
  }
  return $randomString . "." . $ext;
}
