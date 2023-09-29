<?php 
include '../../lib/mylib.php';
include '../../lib/database.php';
include '../connection.php'; 
include '../DAO/LivroDAO.php';
include '../DAO/CompraDAO.php';
include '../modelo/Compra.php';

echo '</br>Valor livro: '.$valorLivro;
echo '</br>Quantidade: '.$quantidade;
echo '</br>ID: '.$ID;
echo '</br>ISBN: '.$ISBN;
echo '</br>Valor: '.$valor;

session_start();

if(!validar($_SESSION['email'])) {
    header('Location: /projeto/index.php');
}

$ID = $_GET['id'];
$ISBN = $_GET['ISBN'];
$quantidade = $_POST['quantidade'];

$livroDAO = new LivroDAO($conn);
$valorLivro = $livroDAO->getValorLivroByISBN($ISBN);

$valorCompra = $valorLivro * $quantidade;

$compra = new Compra($ID, $_POST['cpf'], $ISBN, $_POST['codigo_vendedor'], $valorCompra, $_POST['cartao']);

$compraDAO = new CompraDAO($conn);
$compraDAO->modificarCompra($ID ,$compra);

$_SESSION['mensagem'] = 'Compra editada com sucesso!';
$_SESSION['cor'] = 'green';

header('Location: ../view/ExibirCompras.php');