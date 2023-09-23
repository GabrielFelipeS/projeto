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


    function modificar($cpf, $endereco) {
        var_dump($endereco);
        /*$stmt = $this->conn->prepare("UPDATE endereco SET cpfDono = :cpfDono, bairro = :bairro, cidade = :cidade, estado = :estado, cep = :cep, complemento = :complemento WHERE cpfDono = :cpfDono");

        // Vincule os valores com os parâmetros da declaração
        $stmt->bindParam(':cpfDono', $endereco->getCpfDono());
        $stmt->bindParam(':bairro', $endereco->getBairro());
        $stmt->bindParam(':cidade', $endereco->getCidade());
        $stmt->bindParam(':estado', $endereco->getEstado());
        $stmt->bindParam(':cep', $endereco->getCep());
        $stmt->bindParam(':complemento', $endereco->getComplemento());
        $stmt->bindParam(':cpfDono', $cpf);
        
        // Execute a declaração preparada
        $stmt->execute();
        */
        

        $sql = "UPDATE $this->NomeTabela SET cpfDono = ?, bairro = ?,cidade = ?, estado = ?, cep = ?, complemento = ? WHERE cpfDono = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("sssssss", 
        $endereco->getCpf(), 
        $endereco->getBairro(), 
        $endereco->getCidade(), 
        $endereco->getEstado(), $endereco->getCep(),
        $endereco->getComplemento(),
        $cpf    
        );
        $stmt->execute();
        
    }

    function deleteByCPF($cpf) {
        $sql = "DELETE FROM $this->NomeTabela WHERE cpfDono = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $cpf);
        $stmt->execute();
    }

}