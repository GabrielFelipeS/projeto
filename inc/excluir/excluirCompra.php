<?php
include '../lib/mylib.php';
include '../lib/database.php';
include 'connection.php'; 

$ID = $_GET['id'];
delete('compras', ["id = $ID"]);
header('Location: ../ExibirCompras.php');