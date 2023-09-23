<?php

class CompraDAO {
    private $conn;
    private $NomeTabela = "compras";

    function __construct($conn) {
        $this->conn = $conn;
    }

    function cadastrarCompra($compra) {
        $sql = "INSERT INTO $this->NomeTabela VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("issids",
        $compra->getId(),
        $compra->getCpfComprador(), $compra->getISBNLivro(), $compra->getCodigoVendedor(), $compra->getValorCompra(), $compra->getCartao());
        $stmt->execute();
    }

    function modificarCompra($id, $compra) {
        $sql = "UPDATE $this->NomeTabela SET id = ?, cpfComprador = ? , ISBNLivro = ? , codVendedor = ?, valor = ?, cartao = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("issidsi", $id, $compra->getCpfComprador(), $compra->getISBNLivro(), $compra->getCodigoVendedor(), $compra->getValorCompra(), $compra->getCartao(), $id);
        $stmt->execute();
    }

    function getAll() {
        $sql = "SELECT * FROM $this->NomeTabela";
        $stmt = $this->conn->query($sql);
        $compras = [];
        while($row = $stmt->fetch_assoc()) {
            $compras[] = $row;
        }
        return $compras;
        #return $stmt->fetch();
    }

    function deleteByID($id) {
        $sql = "DELETE FROM $this->NomeTabela WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }


}