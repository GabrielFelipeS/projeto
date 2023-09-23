<?php 
    include '../../lib/mylib.php';
    include '../../lib/database.php';
    include '../connection.php'; 

    $partes = explode("-",$_GET['id']);

    $ID = $partes[0];
    $ISBN = $partes[1];

    $dados = get('livros', "ISBN=$ISBN");
    $valor = $dados['valorLivro'] * $_POST['quantidade'];

    echo '</br>ID: '.$ID;
    echo '</br>ISBN: '.$ISBN;
    echo '</br>Valor: '.$valor;

    modificar('compras', ['id = "'.$ID.'"','cpfComprador = "'. $_POST['cpf'].'"', 'ISBNlivro = "'.$ISBN.'"', 'codVendedor = "'.$_POST['codigo_vendedor'].'"', 'valor = "'.$valor.'"', 'cartao = "'.$_POST['cartao'].'"'], "id = $ID");

    header('Location: ../view/ExibirCompras.php');