<?php
session_start();

function verificarLogin($email, $senha) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bibliotex";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Erro na conexão com o banco de dados: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("SELECT senha FROM usuario WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $senhaHashArmazenada = $row["senha"];

        if (hash('sha256', $senha) === $senhaHashArmazenada) {
            $stmt->close();
            $conn->close();
            return true;
        }
    }

    $stmt->close();
    $conn->close();
    return false;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    if (verificarLogin($email, $senha)) {
        header("Location: index.php");
        exit();
    } else {
        $_SESSION["login_error"] = "Email ou senha incorretos";
        header("Location: form_login.php");
        exit();
    }
}
?>


