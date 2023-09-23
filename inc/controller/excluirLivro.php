<?php
include '../../lib/mylib.php';
include '../../lib/database.php';
include '../connection.php'; 
include '../DAO/LivroDAO.php';

$ISBN = $_GET['ISBN'];
$livroDAO = new LivroDAO($conn);
$livroDAO->deleteByID($ISBN);

header('Location: ../view/CadastrarExibirLivros.php');