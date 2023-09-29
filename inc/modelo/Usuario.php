<?php
class Usuario{
    private $nome;
    private $nascimento;
    private $telefone;
    private $email;
    private $senha;
    private $fotoPerfil;

    function __construct($nome, $nascimento, $telefone, $email, $senha, $fotoPerfil){
        $this->nome = $nome;
        $this->nascimento = $nascimento;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->senha = $senha;
        $this->fotoPerfil = $fotoPerfil;
    }
    
    function get_nome(){
        return $this->nome;
    }
    //function set_nome($nome){
   //     $this->nome = $nome; 
   // }
    function get_nascimento(){
        return $this->nascimento;
    }
    //function set_nascimento($nascimento){
    //    $this->nascimento = $nascimento; 
   // }
    function get_telefone(){
        return $this->telefone;
    }
   // function set_telefone($telefone){
   //     $this->telefone = $telefone; 
   // }
    function get_email(){
        return $this->email;
    }
   // function set_email($email){
   //     $this->email = $email;
   // }
    function get_senha(){
        return $this->senha;
    }
  // // function set_senha($senha){
   ///     $this->senha = $senha;
   // }
    function get_fotoPerfil(){
        return $this->fotoPerfil;
    }
    //function set_fotoPerfil($fotoPerfil){
    //    $this->fotoPerfil = $fotoPerfil; 
    //}
}
?>
