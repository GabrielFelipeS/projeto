<?php
class UsuarioDAO{
    private $conn;

    function __construct($conn){
        $this->conn = $conn;
        
    }

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

    function cadastrar($usuario) {
        $senhaHash = password_hash($usuario->get_senha(), PASSWORD_DEFAULT);
        $dataSQL = date('Y-m-d', strtotime(str_replace('/', '-', $usuario->get_nascimento())));
        //var_dump($_FILES);
        $ext = strtolower(substr($usuario->get_fotoPerfil(),-4)); //Pegando extensão do arquivo
        $new_name =  $usuario->get_nome().$ext; //Definindo um novo nome para o arquivo
        $dir = '../fotosPerfil/'; //Diretório para uploads, coloquei em lib pra facilitar o senhor achar
        move_uploaded_file($_FILES['fotoPerfil']['tmp_name'], $dir.$new_name); //Fazer upload do arquivo 
        $caminho = 'fotosPerfil/'.$new_name;

        $sql = "INSERT INTO usuario (nome, nascimento, telefone, email, senha, fotoPerfil) VALUES 
            (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssssss", $usuario->get_nome(), $dataSQL, $usuario->get_telefone(), $usuario->get_email(), $senhaHash, $caminho);
        
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>
