<?php
    include '../../lib/mylib.php';
    include '../../lib/database.php';
    include '../connection.php'; 
    include '../modelo/Usuario.php';

    var_dump($_FILES);
    
    #if (($_SERVER["REQUEST_METHOD"] == "POST")){
        
    //var_dump($_POST);
    $nome = $_POST["nome"];
    $nascimento = $_POST["nascimento"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    
//conexão com o banco de dados;
echo '<br>teste 1';
    $usuario = new Usuario($conn);
    echo '<br>teste 2';
//cadastrar o usuário
	
    if($usuario->verificarEmailExistente($email)){
    echo '<br>teste 3';
        header('Location: ../../form-cadastrar-usuario.php?erro=email_existente');
    }else{
        if ($usuario->cadastrar($nome, $nascimento, $telefone, $email, $senha)){
        // Redirecionar para a página de sucesso após o cadastro
            //header("Location: ../../form-cadastrar-usuario.php");
            echo '<br>teste 4';
            header('Location: ../../form_login.php?sucesso=cadastro_realizado');
            exit();
        }else{
            echo "Erro! tente novamente!";
        }
    }
    #}

    
    ?>


    
