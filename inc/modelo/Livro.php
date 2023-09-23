<?php

class Livro {
    private $ISBN;
    private $nomeivro;
    private $valorLivro;
    private $descricao;
    private $nome_da_foto;




    /**
     * Get the value of ISBN
     */ 
    public function getISBN()
    {
        return $this->ISBN;
    }

    /**
     * Get the value of nomeivro
     */ 
    public function getNomeivro()
    {
        return $this->nomeivro;
    }

    /**
     * Get the value of valorLivro
     */ 
    public function getValorLivro()
    {
        return $this->valorLivro;
    }

    /**
     * Get the value of descricao
     */ 
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Get the value of nome_da_foto
     */ 
    public function getNome_da_foto()
    {
        return $this->nome_da_foto;
    }
}