<?php
    include '../../lib/mylib.php';
    include '../../lib/database.php';
    include '../connection.php'; 
    include '../DAO/VendedorDAO.php';
    include '../DAO/EnderecoDAO.php';
    include '../modelo/Vendedor.php';
    include '../modelo/Endereco.php';

    $cpf = $_GET['cpf'];
    $vendedor = new Vendedor($_POST['CODIGO_VENDEDOR'], $_POST['CPF'], $_POST['NOME'], $_POST['nascimento'] ,$_POST['nacionalidade']);
    $vendedorDAO = new VendedorDAO($conn);
    $vendedorDAO->modificarByCPF($cpf, $vendedor);

    echo 'Vendedor: ';
    var_dump($vendedor);

    #modificar('vendedor', ['codigo_vendedor = "'.$_POST['CODIGO_VENDEDOR'].'"','cpf = "'. $_POST['CPF'].'"', 'nomeCompleto = "'.$_POST['NOME'].'"', 'data_de_nascimento = "'.$_POST['nascimento'].'"', 'nacionalidade = "'.$_POST['nacionalidade'].'"'], "cpf = $cpf");

    $endereco = new Endereco( $_POST['CPF'], $_POST['bairro'], $_POST['endereco'] ,$_POST['cidade'], $_POST['estado'],$_POST['cep'], $_POST['complemento']);
    $enderecoDAO = new EnderecoDAO($conn);
    $enderecoDAO->modificar($cpf, $endereco);

    echo '<br><br>endereco: ';
    var_dump($endereco);

    #modificar('endereco', ['cpfDono = "'.$_POST['CPF'].'"','bairro = "'. $_POST['bairro'].'"', 'cidade = "'.$_POST['cidade'].'"', 'estado = "'.$_POST['estado'].'"', 'cep = "'.$_POST['cep'].'"', 'complemento = "'.$_POST['complemento'].'"'], "cpfDono = $cpf");
 
   header('Location: ../view/cadastrar_vendedor.php');