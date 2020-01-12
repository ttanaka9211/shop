<?php
require 'common.php';
$pdo = connect();
$st = $pdo->query("DELETE FOM goods WHERE code={$_GET['code']}");
header('Location: index.php');
