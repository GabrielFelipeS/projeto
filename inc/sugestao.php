<?php
    include '../lib/mylib.php';

 
    $email = $_POST['email']; 
    $email_post = fopen('arquivo_temp', "w") or die("Você não tem permissão para gravar neste diretório!");
    wline($email_post, $email);
    fclose($email_post);

    $email_post = fopen('arquivo_temp', "r") or die("Você não tem permissão para gravar neste diretório!");
    $email = fgets($email_post);
    fclose($email_post);

    $myfile = fopen('./cadastrar/emails', "r") or die("Você não tem permissão para gravar neste diretório!");

    while(!feof($myfile)){      
        $email_arquivo = fgets($myfile);

        if (strcasecmp($email_arquivo, $email) == 0){  //Verifica se já existe
            fclose($myfile);

            $ext = strtolower(substr($_FILES['imagem']['name'],-4)); //Pegando extensão do arquivo
            $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
            $dir = '../lib/imagens/'; //Diretório para uploads, coloquei em lib pra facilitar o senhor achar
            move_uploaded_file($_FILES['imagem']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo 

            $myfile = fopen('sugestoes', "a") or die("Você não tem permissão para gravar neste diretório!");
            
            wline($myfile, $_POST['name']);
            wline($myfile, $_POST['email']);
            wline($myfile, $_POST['assunto']);
            wline($myfile, $_POST['message']);
            wline($myfile, $new_name);
            break;
        }
    }

    fclose($myfile);
    header('Location: ../index.php');
    //append: concatenação
    