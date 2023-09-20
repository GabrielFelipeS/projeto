<?php
    include '../lib/mylib.php';
    include '../lib/database.php';
    include 'connection.php'; 

    $cpf = $_GET['cpf'];

    modificar('vendedor', ['codigo_vendedor = "'.$_POST['CODIGO_VENDEDOR'].'"','cpf = "'. $_POST['CPF'].'"', 'nomeCompleto = "'.$_POST['NOME'].'"', 'data_de_nascimento = "'.$_POST['nascimento'].'"', 'nacionalidade = "'.$_POST['nacionalidade'].'"'], "cpf = $cpf");

    modificar('endereco', ['cpfDono = "'.$_POST['CPF'].'"','bairro = "'. $_POST['bairro'].'"', 'cidade = "'.$_POST['cidade'].'"', 'estado = "'.$_POST['estado'].'"', 'cep = "'.$_POST['cep'].'"', 'complemento = "'.$_POST['complemento'].'"'], "cpfDono = $cpf");
 
    header('Location: ../cadastrar_vendedor.php');