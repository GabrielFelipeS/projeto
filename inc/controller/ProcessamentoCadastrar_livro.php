<?php
    include '../../lib/mylib.php';
    include '../../lib/database.php';
    include '../connection.php'; 

    $ISBN = $_POST['ISBN']; 
    $BuscarNoBanco = get('livros', "ISBN = $ISBN");
    #die(print($BuscarNoBanco['nomeLivro']));

    if (empty($BuscarNoBanco['ISBN'])){  //Verifica se já existe
        $nome = $_POST['NOME'];
        $descricao = $_POST['DESCRICAO'];
        $valor = $_POST['VALOR'];

        $ext = strtolower(substr($_FILES['imagem']['name'],-4)); //Pegando extensão do arquivo
        $new_name =  $ISBN .'.'.$ext; //Definindo um novo nome para o arquivo
        $dir = '../../media/'; //Diretório para uploads, coloquei em lib pra facilitar o senhor achar
        move_uploaded_file($_FILES['imagem']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo 
        $caminho = 'media/'.$new_name;
        create('livros', [$ISBN,  $nome, $valor, $descricao, $caminho]);    
    }

header('Location: ../view/CadastrarExibirlivros.php');