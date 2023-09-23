<?php 
    include '../../lib/mylib.php';
    include '../../lib/database.php';
    include '../connection.php'; 

    $cpf = $_POST['CPF']; 
    $BuscarNoBanco = get('vendedor', "cpf = $cpf");
    
    if (empty($BuscarNoBanco['CPF'])){  //Verifica se já existe

        $nome = $_POST['NOME'];
        $CODIGO_VENDEDOR = $_POST['CODIGO_VENDEDOR'];
        $cpf = $_POST['CPF'];
        $nascimento = $_POST['nascimento'];
        $nacionalidade = $_POST['nacionalidade'];
        $bairro = $_POST['bairro'];
        $endereco = $_POST['endereco'];
        $cidade = $_POST['cidade'];    
        $estado = $_POST['estado'];   
        $cep = $_POST['cep'];
        $complemento = empty($_POST['complemento'])? NULL: $_POST['complemento'];     

        create('vendedor', [$CODIGO_VENDEDOR, $cpf, $nome, $nascimento, $nacionalidade]);   
        create('endereco', [$cpf,  $bairro, $endereco, $cidade, $estado,  $cep, $complemento]);
        echo 'ta rodando até aqui'; 
    }

header('Location: ../view/Cadastrar_vendedor.php');
