<?php

class Vendedor {
    
    private $codigoVendedor; 
    private $cpf; 
    private $nome; 
    private $nascimento; 
    private $nacionalidade;
    
    function __construct($codigoVendedor, $cpf, $nome, $nascimento, $nacionalidade) {
        $this->codigoVendedor = $codigoVendedor;
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->nascimento = $nascimento;
        $this->nacionalidade = $nacionalidade;
    }


    /**
     * Get the value of CODIGO_VENDEDOR
     */ 
    public function getCodigoVendedor()
    {
        return $this->codigoVendedor;
    }

    /**
     * Get the value of cpf
     */ 
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Get the value of nascimento
     */ 
    public function getNascimento()
    {
        return $this->nascimento;
    }

    /**
     * Get the value of nacionalidade
     */ 
    public function getNacionalidade()
    {
        return $this->nacionalidade;
    }
}