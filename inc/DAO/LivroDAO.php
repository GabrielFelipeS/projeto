<?php

class LivroDAO {
    private $conn;
    private $NomeTabela = "livros";

    function __construct($conn) {
        $this->conn = $conn;
    }

    function trueIfNotExist($ISBN) {
        $sql = "SELECT * FROM $this->NomeTabela WHERE ISBN = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $ISBN);
        $stmt->execute();
        return empty($stmt->fetch());
    }

    function getValorLivroByISBN($ISBN) {
        $sql = "SELECT valorLivro FROM $this->NomeTabela WHERE ISBN = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $ISBN);
        $stmt->execute();

        $valorLivro = 0.0;
        $stmt->bind_result($valorLivro);
        $stmt->fetch();

        return $valorLivro;
    }

    function deleteByID($ISBN) {
        $sql = "DELETE FROM $this->NomeTabela WHERE ISBN = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $ISBN);
        $stmt->execute();
    }
    
    function inserirLivro($livro) {
        $sql = "INSERT INTO $this->NomeTabela VALUES(?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("isdss", $livro->getISBN(), $livro->getNomeivro(), $livro->getValorLivro(), $livro->getDescricao(), $livro->getNome_da_foto());
        $stmt->execute();
    }

}