<?php

class LivroDAO {
    private $conn;

    function __construct($conn) {
        $this->conn = $conn;
    }

    function getValorLivroByISBN($ISBN) {
        $sql = "SELECT valorLivro FROM livros WHERE ISBN = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("d", $ISBN);
        return $stmt->get_result();
    }

}