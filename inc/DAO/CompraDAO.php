<?php

class CompraDAO {
    private $conn;
    function __construct($conn) {
        $this->conn = $conn;
    }

    ['id = "'.$ID.'"','cpfComprador = "'. $_POST['cpf'].'"', 'ISBNlivro = "'.$ISBN.'"', 'codVendedor = "'.
    $_POST['codigo_vendedor'].'"', 'valor = "'.$valorCompra.'"', 'cartao = "'.$_POST['cartao'].'"']

    function modificarCompra($id, $compra) {
        $sql = "UPTDATE $this->NomeTabela SET id = ?, cpfComprador = ? , ISBNLivro = ? , codVendedor = ?, valor = ?, cartao = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("d", $id);
    }

    function deleteByID($id) {
        $sql = 'DELETE FROM compras WHERE id = ?';
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("d", $id);
        $stmt->execute();
    }
}