<?php
require 'common.php';
$pdo = connect();
$st = $pdo->query("SELECT * FORM goods");
$goods = $st->fetchAll();
require 't_index.php';
