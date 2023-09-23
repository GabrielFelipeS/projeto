<?php 
    include '../../lib/mylib.php';
    include '../../lib/database.php';
    include '../connection.php'; 
    include '../DAO/VendedorDAO.php';
    include '../DAO/EnderecoDAO.php';
    include '../modelo/Vendedor.php';
    include '../modelo/Endereco.php';

    $VendedorDAO = new VendedorDAO($conn);
    
    $cpf = $_POST['CPF']; 
    #$BuscarNoBanco = get('vendedor', "cpf = $cpf");
    
    if ($VendedorDAO->trueIfNotExist($cpf)){  //Verifica se já existe

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

        echo "nome". $nome;
        $vendedor = new Vendedor((int) $CODIGO_VENDEDOR, $cpf, $nome, $nascimento, $nacionalidade);
        #var_dump($vendedor);


        $VendedorDAO->cadastrarVendedor($vendedor);
        #create('vendedor', [$CODIGO_VENDEDOR, $cpf, $nome, $nascimento, $nacionalidade]);   

        $endereco = new Endereco($cpf,  $bairro, $endereco, $cidade, $estado,  $cep, $complemento);

        $enderecoDAO = new EnderecoDAO($conn);
        $enderecoDAO->cadastrar($endereco);
        #create('endereco', [$cpf,  $bairro, $endereco, $cidade, $estado,  $cep, $complemento]);
        echo 'ta rodando até aqui'; 
    }

header('Location: ../view/Cadastrar_vendedor.php');
