<?php
include 'connection.php';

$id = $_GET['ISBN'];

$sql = "SELECT * FROM livros WHERE ISBN = $id";
$res = mysqli_query($conn, $sql);
$_POST = mysqli_fetch_assoc($res);

// gerar as variáveis dinamicamente e eliminar setValue