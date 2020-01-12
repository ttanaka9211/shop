<?php
//require 'common.php';
session_start();
function connect()
{
  try {
    // return new PDO("host=localhost;charset=utf8", "root"); testのため
    return new PDO("mysql:dbname=shop;host=localhost;chrset=utf8", "root", "root");
    echo "接続OK!";
  } catch (PDOException $e) {
    echo 'DB接続エラー！: ' . $e->getMessage();
  }
}
function img_tag($code)
{
  if (file_exists("images/$code.jpg")) $name = $code;
  else $name = 'noimage';
  return '<img src="images/' . $name . '.jpg" alt="">';
}
$_SESSION['cart'] = null;
header('Location: cart.php');
