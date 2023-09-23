<?php

class LivroDAO {
    private $conn;

    function __construct($conn) {
        $this->conn = $conn;
    }

    function getValorLivroByISBN($ISBN) {
        $sql = "SELECT valorLivro FROM livros WHERE ISBN = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $ISBN);
        $stmt->execute();
        $valorLivro = 0.0;
        $stmt->bind_result($valorLivro);
        $stmt->fetch();
        return $valorLivro;
    }

}