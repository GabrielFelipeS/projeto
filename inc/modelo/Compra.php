<?php 

class Compra {
    private $id;
    private $cpfComprador;
    private $ISBNLivro;
    private $codVendedor;
    private $codigoVendedor;
    private $valorCompra;
    private $cartao;

    public function __construct($id, $cpfComprador, $ISBNLivro, $codVendedor,  $valorCompra, $cartao)
    {
        $this->id = $id;
        $this->cpfComprador = $cpfComprador;
        $this->ISBNLivro = $ISBNLivro;
        $this->codVendedor = $codVendedor;
        $this->valorCompra = $valorCompra;
        $this->cartao = $cartao;
    }

    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of cpfComprador
     */ 
    public function getCpfComprador()
    {
        return $this->cpfComprador;
    }

    /**
     * Get the value of ISBNLivro
     */ 
    public function getISBNLivro()
    {
        return $this->ISBNLivro;
    }

    /**
     * Get the value of codigoVendedor
     */ 
    public function getCodigoVendedor()
    {
        return $this->codigoVendedor;
    }

    /**
     * Get the value of valorCompra
     */ 
    public function getValorCompra()
    {
        return $this->valorCompra;
    }

    /**
     * Get the value of cartao
     */ 
    public function getCartao()
    {
        return $this->cartao;
    }
}