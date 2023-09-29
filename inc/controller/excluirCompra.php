<?php
include '../../lib/mylib.php';
include '../../lib/database.php';
include '../connection.php'; 
include '../DAO/CompraDAO.php';
session_start();

if(!validar($_SESSION['email'])) {
    header('Location: /projeto/index.php');
}

$ID = $_GET['id'];

$compraDAO = new CompraDAO($conn);
$compraDAO->deleteByID($ID);

$_SESSION['mensagem'] = 'Compra excluida com sucesso!';
$_SESSION['cor'] = 'red';

header('Location: ../view/ExibirCompras.php?excluido=excluido_sucesso');