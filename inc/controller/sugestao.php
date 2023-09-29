<?php
    include '../../lib/mylib.php';
    session_start();
    //var_dump($_FILES);

   /*
    $email = $_POST['email']; 
    $email_post = fopen('arquivo_temp', "w") or die("Você não tem permissão para gravar neste diretório!");
    wline($email_post, $email);
    fclose($email_post);

    $email_post = fopen('arquivo_temp', "r") or die("Você não tem permissão para gravar neste diretório!");
    $email = fgets($email_post);
    fclose($email_post);

    $myfile = fopen('emails', "r") or die("Você não tem permissão para gravar neste diretório!"); 
    
    */

  

    #while(!feof($myfile)){    
        
        #$email_arquivo = fgets($myfile);
        //var_dump($email_arquivo);
        //echo '<br>teste 1: ' + $email_arquivo;  

        echo '<br>teste 1: ';
        echo $email_arquivo . ' - ';
        echo $email;
        echo 'Resultado' . strcasecmp($email_arquivo, $email);
        #if (strcmp($email_arquivo, $email) == 0){  //Verifica se já existe
            #fclose($myfile);
            echo '<br>teste 2';
            $new_name = '';
            if(isset($_FILES['imagem'])) {
                echo '<br>teste 3';
                $ext = strtolower(substr($_FILES['imagem']['name'],-4)); //Pegando extensão do arquivo
                $new_name = date("Y.m.d-H.i.s") . $ext; //Definindo um novo nome para o arquivo
                $dir = '../../lib/imagens/'; //Diretório para uploads, coloquei em lib pra facilitar o senhor achar
                move_uploaded_file($_FILES['imagem']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo     
            }
           
            $myfile = fopen('sugestoes', "a") or die("Você não tem permissão para gravar neste diretório!");
            echo '<br>teste 4';
            wline($myfile, $_POST['name']);
            wline($myfile, $_POST['email']);
            wline($myfile, $_POST['assunto']);
            wline($myfile, $_POST['message']);
            wline($myfile, $new_name);
            echo '<br>teste 5';
            #break;
        #}
    #}

    fclose($myfile);
    $_SESSION['mensagemSugestao'] = 'Sugestão cadastrada!';
    header('Location: ../../index.php#Sugestoes');
    //append: concatenação
    