<?php
    include '../../lib/mylib.php';
    include '../../lib/database.php';
    include '../connection.php'; 

    $ISBN = $_GET['ISBN'];
    delete('livros', ["ISBN = $ISBN"]);
    header('Location: ../view/CadastrarExibirLivros.php');