<?php 
include '../../lib/mylib.php';
include '../../lib/database.php';
include '../connection.php'; 
include '../DAO/LivroDAO.php';
include '../DAO/CompraDAO.php';
include '../modelo/Compra.php';

$ISBN = $_GET['ISBN'];
$quantidade = $_POST['quantidade'];

$livroDAO = new LivroDAO($conn);
$valorLivro = $livroDAO->getValorLivroByISBN($ISBN);

$valorCompra = $valorLivro * $quantidade;
echo $valorCompra;

$compra = new Compra(null, $_POST['cpf'], $ISBN, $_POST['codigo_vendedor'], $valorCompra, $_POST['cartao']);

var_dump($compra);

$compraDAO = new CompraDAO($conn);
$compraDAO->cadastrarCompra($compra);

#cpfComprador varchar(13),
#ISBNlivro varchar(30),
#codVendedor INT,
#valor REAL,
#cartao varchar(19)
header("Location: ../view/ExibirCompras.php");