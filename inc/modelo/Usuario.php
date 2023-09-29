<?php
class Usuario{
    private $conn;

    
    private $nome;
    private $nascimento;
    private $telefone;
    private $email;
    private $senha;
    private $fotoPerfil;

    function __construct($conn){
        $this->conn = $conn;
        
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
    public function verificarEmailExistente($email) {
        $sql = "SELECT COUNT(*) as count FROM usuario WHERE email = ?";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        // Verifique se o e-mail já existe
        return $row['count'] > 0;
    }

    function cadastrar($nome, $nascimento, $telefone, $email, $senha) {
        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);
        $dataSQL = date('Y-m-d', strtotime(str_replace('/', '-', $nascimento)));
        //var_dump($_FILES);
        $ext = strtolower(substr($_FILES['fotoPerfil']['name'],-4)); //Pegando extensão do arquivo
        $new_name =  $nome.$ext; //Definindo um novo nome para o arquivo
        $dir = '../fotosPerfil/'; //Diretório para uploads, coloquei em lib pra facilitar o senhor achar
        move_uploaded_file($_FILES['fotoPerfil']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo 
        $caminho = 'fotosPerfil/'.$new_name;

        $sql = "INSERT INTO usuario (nome, nascimento, telefone, email, senha, fotoPerfil) VALUES 
            (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssss", $nome, $dataSQL, $telefone, $email, $senhaHash, $caminho);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
