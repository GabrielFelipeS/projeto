<?php
include '../../lib/mylib.php';
include '../../lib/database.php';
include '../connection.php'; 
include '../DAO/LivroDAO.php';

session_start();

if(!validar($_SESSION['email'])) {
    header('Location: /projeto/index.php');
}

$ISBN = $_GET['ISBN'];
$livroDAO = new LivroDAO($conn);
$livroDAO->deleteByID($ISBN);

$_SESSION['mensagem'] = 'Livro excluida com sucesso!';
$_SESSION['cor'] = 'red';

header('Location: ../view/CadastrarExibirLivros.php');