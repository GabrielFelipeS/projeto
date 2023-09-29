<?php
    include '../../lib/mylib.php';
    include '../../lib/database.php';
    include '../connection.php'; 
    include '../DAO/livroDAO.php';
    include '../modelo/Livro.php';

    session_start();

    if(!validar($_SESSION['email'])) {
        header('Location: /projeto/index.php');
    }

    $ISBN = $_GET['ISBN'];
    $caminho = '';

    echo var_dump($_FILES);
    if(!empty($_FILES['imagem']['name'])) {
        echo 'teste';
        $ext = strtolower(substr($_FILES['imagem']['name'],-4)); //Pegando extensão do arquivo
        $new_name =  $ISBN .'.'.$ext; //Definindo um novo nome para o arquivo
        $dir = '../../media/'; //Diretório para uploads, coloquei em lib pra facilitar o senhor achar
        move_uploaded_file($_FILES['imagem']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo 
        $caminho = 'media/'.$new_name;
    } 
    
    echo '<br><br><br>POST: ';
    var_dump($_POST);
    $livro = new Livro($_POST['ISBN'], $_POST['NOME'], $_POST['VALOR'],  $_POST['DESCRICAO'], $caminho);

    echo '<br>Livro: ';
    var_dump($livro);

    $livroDAO = new livroDAO($conn);

    echo '<br>CAMINHO: ' . $caminho;
    
    if(empty($caminho)) {
        echo '<br>SEM IMAGE: ';
        $livroDAO->modificarSemImagem($livro, $ISBN);
    } else {
        echo '<br>COM IMAGE: ';
        $livroDAO->modificar($livro, $ISBN);
    }
   

    #modificar('livros', ['ISBN = "'.$_POST['ISBN'].'"','valorLivro = "'. $_POST['VALOR'].'"', 'nomeLivro = "'.$_POST['NOME'].'"', 'descricao = "'.$_POST['DESCRICAO'].'"', 'nome_da_foto = "'.$caminho.'"'], "ISBN = $ISBN");

    $_SESSION['mensagem'] = 'Livro editado com sucesso!';
    $_SESSION['cor'] = 'green';

    header('Location: ../view/CadastrarExibirLivros.php');