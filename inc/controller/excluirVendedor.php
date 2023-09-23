<?php
    include '../../lib/mylib.php';
    include '../../lib/database.php';
    include '../connection.php'; 

    $cod = $_GET['cod'];
    $buscar = get('vendedor', "codigo_vendedor = $cod");
    echo $buscar['cpf'];
    delete('vendedor', ['cpf ='. $buscar['cpf']]);
    delete('endereco', ['cpfDono ='. $buscar['cpf']]);
    header('Location: ../cadastrar/cadastrar_vendedor.php');