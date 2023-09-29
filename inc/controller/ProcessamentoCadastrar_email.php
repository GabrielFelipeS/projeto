<?php
    include '../../lib/mylib.php';

    $email = $_POST['email']; 
    
    $email_post = fopen('arquivo_temp', "w") or die("Você não tem permissão para gravar neste diretório!");
    wline($email_post, $email);
    fclose($email_post);

    $email_post = fopen('arquivo_temp', "r") or die("Você não tem permissão para gravar neste diretório!");
    $post = fgets($email_post);
    fclose($email_post);

    $myfile = fopen('emails', "r") or die("Você não tem permissão para gravar neste diretório!");

    while(!feof($myfile)){      
        $email_arquivo = fgets($myfile);

        if (strcasecmp($email_arquivo, $post) == 0){  //Verifica se já não existe
            fclose($myfile);
            fclose($email_post);
            header('Location: ../index.php');
            break;
        }
    }
    fclose($myfile);
    echo "teste";

    $myfile = fopen('emails', "a") or die("Você não tem permissão para gravar neste diretório!");
    wline($myfile, $email);
    fclose($myfile);
    header('Location: /projeto/index.php');