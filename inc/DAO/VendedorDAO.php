<?php

class VendedorDAO {
    private $conn;
    private $NomeTabela = "vendedor";

    function __construct($conn) {
        $this->conn = $conn;
    }
  
    function modificar($vendedor, $id) {
        $sql = "UPDATE TABLE $this->NomeTabela SET codigo_vendedor = ?, cpf = ?, nomeCompleto = ?, data_de_nascimento = ?, nacionalidade = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("issssi", $vendedor->getCodigoVendedor(), $vendedor->getCpf(), $vendedor->getNome(), $vendedor->getNascimento(), $vendedor->getNacionalidade(),
        $id    
        );
        $stmt->execute();

    }

    function modificarByCPF($cpf, $vendedor) {
        var_dump($vendedor);
        
        $sql = "UPDATE $this->NomeTabela SET codigo_vendedor = ?, cpf = ?, nomeCompleto = ?, data_de_nascimento = ?, nacionalidade = ? WHERE cpf = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("isssss", $vendedor->getCodigoVendedor(), $vendedor->getCpf(), $vendedor->getNome(), $vendedor->getNascimento(), $vendedor->getNacionalidade(),
        $cpf    
        );
        $stmt->execute();

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