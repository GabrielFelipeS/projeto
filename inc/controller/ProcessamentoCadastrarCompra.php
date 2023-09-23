<?php 
    include '../../lib/mylib.php';
    include '../../lib/database.php';
    include '../connection.php'; 


$ISBN = $_GET['ISBN'];

$dados = get("livros", "ISBN = $ISBN");
$valor = $_POST['quantidade'] * $dados['valorLivro'];

create('compras', [NULL,$_POST['cpf'], $ISBN, $_POST['codigo_vendedor'], $valor, $_POST['cartao']]);




#cpfComprador varchar(13),
#ISBNlivro varchar(30),
#codVendedor INT,
#valor REAL,
#cartao varchar(19)
header("Location: ../view/ExibirCompras.php");