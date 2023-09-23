<?php

class Endereco {
   
    private $cpf; 
    private $bairro; 
    private $endereco; 
    private $cidade; 
    private $estado;
    private $cep;
    private $complemento;
    
    function __construct( $cpf,  $bairro, $endereco, $cidade, $estado,  $cep, $complemento) {
        $this->cpf = $cpf;
        $this->bairro = $bairro;
        $this->endereco = $endereco;
        $this->cidade = $cidade;
        $this->estado = $estado;
        $this->cep = $cep;
        $this->complemento = $complemento;
    }


    /**
     * Get the value of cpf
     */ 
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * Get the value of bairro
     */ 
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * Get the value of endereco
     */ 
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * Get the value of cidade
     */ 
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * Get the value of estado
     */ 
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Get the value of cep
     */ 
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * Get the value of complemento
     */ 
    public function getComplemento()
    {
        return $this->complemento;
    }
}