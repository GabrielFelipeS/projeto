<?php
session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bibliotex";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    $email = $_POST["email"];
    $senha = hash('sha256', $_POST["senha"]);

    $sql = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        //ir pra tela de ínicio 
        header("Location: index.php");
        exit();
    } else {
        // incorreto: exibir mensagem de erro
        $_SESSION["login_error"] = "Login não existente, cadastre-se";
        header("Location: form_login.php");
        exit();
    }
}
    $conn->close();

?>

