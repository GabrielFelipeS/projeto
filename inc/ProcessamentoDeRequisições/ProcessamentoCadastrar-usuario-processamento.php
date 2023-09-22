<?php
    include '../../lib/mylib.php';
    include '../../lib/database.php';
    include '../connection.php'; 
    include '../modelo/Usuario.php';
    var_dump($_FILES);
    if (($_SERVER["REQUEST_METHOD"]=="POST")){
        
        //var_dump($_POST);
        $nome = $_POST["nome"];
        $nascimento = $_POST["nascimento"];
        $telefone = $_POST["telefone"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $fotoPerfil = $_POST["fotoPerfil"];
    //conexão com o banco de dados;
        $usuario = new Usuario($conn);
    //cadastrar o usuário
        if ($usuario->cadastrar($nome, $nascimento, $telefone, $email, $senha, $fotoPerfil)){
        // Redirecionar para a página de sucesso após o cadastro
            header("Location: ../form-cadastrar-usuario.php");
            exit();
        }else{
            echo "erro! tente novamente!";
        }
    }

    header('Location: ../../form_login.php');
    ?>


    