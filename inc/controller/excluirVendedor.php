<?php
include '../../lib/mylib.php';
include '../../lib/database.php';
include '../connection.php';
include '../DAO/VendedorDAO.php'; 
include '../DAO/EnderecoDAO.php'; 

session_start();

if(!validar($_SESSION['email'])) {
    header('Location: /projeto/index.php');
}

$cod = $_GET['cod'];
$VendedorDAO = new VendedorDAO($conn);
$cpf = $VendedorDAO->getCPFByCod($cod);
$VendedorDAO->deleteByCPF($cpf);

$EnderecoDAO = new EnderecoDAO($conn);
$EnderecoDAO->deleteByCPF($cpf);

header('Location: ../view/cadastrar_vendedor.php');