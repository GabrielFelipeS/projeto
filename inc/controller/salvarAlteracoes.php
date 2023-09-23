<?php
    include '../../lib/mylib.php';
    include '../../lib/database.php';
    include '../connection.php'; 
    include '../DAO/livroDAO.php';
    include '../modelo/Livro.php';

    $ISBN = $_GET['ISBN'];

    $ext = strtolower(substr($_FILES['imagem']['name'],-4)); //Pegando extensão do arquivo
    $new_name =  $ISBN .'.'.$ext; //Definindo um novo nome para o arquivo
    $dir = '../../media/'; //Diretório para uploads, coloquei em lib pra facilitar o senhor achar
    move_uploaded_file($_FILES['imagem']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo 
    $caminho = 'media/'.$new_name;
    echo 'POST: ';
    var_dump($_POST);
    $livro = new Livro($_POST['ISBN'], $_POST['VALOR'], $_POST['NOME'], $_POST['DESCRICAO'], $caminho);

    echo '<br>Livro: ';
    var_dump($livro);
    $livroDAO = new livroDAO($conn);
    $livroDAO->modificar($livro, $ISBN);

    #modificar('livros', ['ISBN = "'.$_POST['ISBN'].'"','valorLivro = "'. $_POST['VALOR'].'"', 'nomeLivro = "'.$_POST['NOME'].'"', 'descricao = "'.$_POST['DESCRICAO'].'"', 'nome_da_foto = "'.$caminho.'"'], "ISBN = $ISBN");
 
    //header('Location: ../view/CadastrarExibirLivros.php');