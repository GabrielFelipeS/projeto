<?php 
include '../../lib/mylib.php';
include '../../lib/database.php';
include '../connection.php'; 

$ISBN = $_GET['ISBN'];
$quantidade = $_POST['quantidade'];

$livroDAO = new LivroDAO($conn);
$valorLivro = $livroDAO->getValorLivroByISBN($ISBN);

$valorCompra = $valorLivro * $quantidade;

$compra = new Compra($ID, $_POST['cpf'], $ISBN, $_POST['codigo_vendedor'], $valorCompra, $_POST['cartao']);

$compraDAO = new CompraDAO($conn);
$compraDAO->cadastrarCompra($id, $compra);



#cpfComprador varchar(13),
#ISBNlivro varchar(30),
#codVendedor INT,
#valor REAL,
#cartao varchar(19)
header("Location: ../view/ExibirCompras.php");