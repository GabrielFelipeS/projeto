<?php

class LivroDAO {
    private $conn;
    private $NomeTabela = "livros";

    function __construct($conn) {
        $this->conn = $conn;
    }

    function modificar($livro, $ISBN) {
        $sql = "UPDATE $this->NomeTabela SET isbn = ?, nomeLivro = ? , valorLivro = ? , descricao = ?, nome_da_foto = ? WHERE ISBN = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssdsss", $ISBN, $livro->getnomeLivro(), $livro->getValorLivro(), $livro->getDescricao(), $livro->getNome_da_foto(), $ISBN);
        $stmt->execute();
    }

    function getAll() {
        $sql = "SELECT * FROM $this->NomeTabela";
        $stmt = $this->conn->query($sql);
        $livros = [];
        while($row = $stmt->fetch_assoc()) {
            $livros[] = $row;
        }
        return $livros;
        #return $stmt->fetch();
    }

    function getByISBN($isbn) {
        $sql = "SELECT * FROM $this->NomeTabela WHERE ISBN = ".$isbn;
        $stmt = $this->conn->query($sql);
        $livro = $stmt->fetch_assoc();
        return $livro;
        #return $stmt->fetch();
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
        $stmt->bind_param("isdss", $livro->getISBN(), $livro->getnomeLivro(), $livro->getValorLivro(), $livro->getDescricao(), $livro->getNome_da_foto());
        $stmt->execute();
    }

}