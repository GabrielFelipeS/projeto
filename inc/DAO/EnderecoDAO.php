<?php

class EnderecoDAO {
    private $conn;
    private $NomeTabela = "endereco";

    function __construct($conn) {
        $this->conn = $conn;
    }
   
   
    function cadastrar($endereco) {
        $sql = "INSERT INTO $this->NomeTabela VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssssss", $endereco->getCpf(), $endereco->getBairro(), $endereco->getEndereco(), $endereco->getCidade(), $endereco->getEstado(),$endereco->getCep(), $endereco->getComplemento());
        $stmt->execute();
    }

    function deleteByCPF($cpf) {
        $sql = "DELETE FROM $this->NomeTabela WHERE cpfDono = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $cpf);
        $stmt->execute();
    }

}