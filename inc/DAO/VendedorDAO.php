<?php

class VendedorDAO {
    private $conn;
    private $NomeTabela = "vendedor";

    function __construct($conn) {
        $this->conn = $conn;
    }
  
    function cadastrarVendedor($vendedor) {
        $sql = "INSERT INTO $this->NomeTabela VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("issss", $vendedor->getCodigoVendedor(), $vendedor->getCpf(), $vendedor->getNome(), $vendedor->getNascimento(), $vendedor->getNacionalidade());
        $stmt->execute();
    }

    function trueIfNotExist($cpf) {
        $sql = "SELECT * FROM $this->NomeTabela WHERE cpf = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $cpf);
        $stmt->execute();

        return empty($stmt->fetch());
    }

    function getCPFByCod($cod) {
        $sql = "SELECT cpf FROM $this->NomeTabela WHERE codigo_vendedor = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $cod);
        $stmt->execute();

        $cpf = null;
        $stmt->bind_result($cpf);
        $stmt->fetch();
        
        return $cpf;
    }

    function deleteByCPF($cpf) {
        $sql = "DELETE FROM $this->NomeTabela WHERE cpf = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $cpf);
        $stmt->execute();
    }

}