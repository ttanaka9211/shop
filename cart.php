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
$rows = array();
$sum = 0;
$pdo = connect();
if (!isset($_SESSION['cart'])) $_SESSION['cart'] = array();
if (@$_POST['submit']) {
  @$_SESSION['cart'][$_POST['code']] += $_POST['num'];
}
foreach ($_SESSION['cart'] as $code => $num) {
  $st = $pdo->prepare("SELECT * FROM goods WHERE code=?");
  $st->execute(array($code));
  $row = $st->fetch();
  $st->closeCursor();
  $row['num'] = strip_tags($num);
  $sum += $num * $row['price'];
  $rows[] = $row;
}
require 't_cart.php';
