<?php
include '../../lib/mylib.php';
include '../../lib/database.php';
include '../connection.php'; 
include '../DAO/CompraDAO.php';

$ID = $_GET['id'];

$compraDAO = new CompraDAO($conn);
$compraDAO->deleteByID($ID);

header('Location: ../view/ExibirCompras.php?excluido=excluido_sucesso');