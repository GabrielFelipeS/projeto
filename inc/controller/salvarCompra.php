<?php 
include '../../lib/mylib.php';
include '../../lib/database.php';
include '../connection.php'; 
include '../DAO/LivroDAO.php';

$partes = explode("-",$_GET['id']);

$ID = $partes[0];
$ISBN = $partes[1];
$quantidade = $_POST['quantidade'];

$livroDAO = new LivroDAO($conn);

$valorLivro = $livroDAO->getValorLivroByISBN($ISBN);

#$dados = get('livros', "ISBN=$ISBN");

$valorCompra = $valorLivro * $quantidade;

echo '</br>ID: '.$ID;
echo '</br>ISBN: '.$ISBN;
echo '</br>Valor: '.$valor;

modificar('compras', ['id = "'.$ID.'"','cpfComprador = "'. $_POST['cpf'].'"', 'ISBNlivro = "'.$ISBN.'"', 'codVendedor = "'.$_POST['codigo_vendedor'].'"', 'valor = "'.$valorCompra.'"', 'cartao = "'.$_POST['cartao'].'"'], "id = $ID");

header('Location: ../view/ExibirCompras.php');