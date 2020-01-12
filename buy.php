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
$error = $name = $address = $tel = '';
if (@$_POST['submit']) {
  $name = htmlspecialchars($_POST['name']);
  $address = htmlspecialchars($_POST['address']);
  $tel = htmlspecialchars($_POST['tel']);
  if (!$name) $error .= 'お名前を入力してください。<br>';
  if (!$address) $error .= 'ご住所を入力してください。<br>';
  if (!$tel) $error .= '電話番号を入力してください。<br>';
  if (preg_match('/[^\d-]/', $tel)) $error .= '電話番号が正しくありません。<br>';
  if (!$error) {
    $pdo = connect();
    $body = "商品が購入されました。\n\n"
      . "お名前: $name\n"
      . "ご住所: $address\n"
      . "電話番号: $tel\n\n";
    foreach ($_SESSION['cart'] as $code => $num) {
      $st = $pdo->prepare("SELECT * FROM goods WHERE code=?");
      $st->execute(array($code));
      $row = $st->fetch();
      $st->closeCursor();
      $body .= "商品名: {$row['name']}\n"
        . "単価: {$row['price']} 円\n"
        . "数量: $num\n\n";
    }
    $from = "newuser@localhost";
    $to = "newuser@localhost";
    mb_send_mail($to, "購入メール", $body, "From: $from");
    $_SESSION['cart'] = null;
    require 't_buy_complete.php';
    exit();
  }
}
require 't_buy.php';
