<?php 
include '../../lib/mylib.php';
include '../../lib/database.php';
include '../connection.php'; 
include '../DAO/LivroDAO.php';
include '../DAO/CompraDAO.php';
include '../modelo/Compra.php';

session_start();
try {
    $codigoVendedor = $_POST['codigo_vendedor'];
    $cpf = $_POST['cpf'];
    $quantidade = $_POST['quantidade'];
    $cartao = $_POST['cartao'];

    $_SESSION['codigoVendedor'] = $codigoVendedor;
    $_SESSION['cpf'] = $cpf;
    $_SESSION['quantidade'] = $quantidade;
    $_SESSION['cartao'] = $cartao;

    if(!isset($_SESSION['email'])) {
        throw new Exception('É necessario fazer login para comprar um livro.');
    }



    $ISBN = $_GET['ISBN'];

    $livroDAO = new LivroDAO($conn);
    $valorLivro = $livroDAO->getValorLivroByISBN($ISBN);

    $valorCompra = $valorLivro * $quantidade;
    echo $valorCompra;


    $compra = new Compra(null, $cpf, $ISBN, $codigoVendedor, $valorCompra, $cartao);

    var_dump($compra);

    $compraDAO = new CompraDAO($conn);
    $compraDAO->cadastrarCompra($compra);

} catch (Exception $e) {
    $_SESSION['mensagem'] = $e->getMessage();

    header("Location: /projeto/inc/view/cadastrarCompra.php?ISBN=".$_GET['ISBN']);
    exit(0);
}

#cpfComprador varchar(13),
#ISBNlivro varchar(30),
#codVendedor INT,
#valor REAL,
#cartao varchar(19)

unset($_SESSION['codigoVendedor'], $_SESSION['cpf'], $_SESSION['quantidade'], $_SESSION['cartao']);

$_SESSION['mensagem'] = 'Sua compra foi realizada! Agradeçemos a preferencia';
$_SESSION['cor'] = 'green';

header("Location: ../view/ExibirCompras.php");