<?php 
    include './inc/appearance/cabecalho.php';
    include './lib/mylib.php';
    include './inc/connection.php';
    include './lib/database.php'; 
?>

  </head>
  
  <body>
  <header>
    <div class="header">
        <div class="logo">
            <div class="logoimg"><img src="./assets/images/livro_icon.png" alt="icone livro"></div>
        </div>
        <h2>BIBLIOTEX</h2>

       <style>
          body {
              background-color: black;
          }

          .section-contact {
            padding: 17px;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 600px;
            width: 100%;
            box-sizing: border-box;
            border: 2px solid black; 
            border: fixed;
          }


          .section-contact input[type=text],input[type=password],
          .section-contact textarea {
              display:block;
              width:100%;
              height:40px;
              border:0;
              background:transparent;
              border-bottom:1px solid #CCC;
              outline:0;
              margin-top:10px;
              margin-bottom: 10px;
          }
       </style>
    </header>

<body>
  


        <?php 
           $erro = $_GET['erro'] ?? '';

           if ($erro == 'email_existente'){
            echo "<h4 style='display: flex; color: red; justify-content: center;'><strong>E-mail já cadastrado.</strong></h4><p style='display: flex; color: red; justify-content: center;'><strong>Tente novamente!</strong></p>";
           }


        ?>
   
     
<?= @abertura_dark(['titulo' => 'Cadastro', 'id' => 'cadastroUsuario']) ?>
      <div class="section-contact">
          <form method="POST" enctype="multipart/form-data"  action="./inc/controller/ProcessamentoCadastrar-usuario-processamento.php">
              <input type="text" name="nome" placeholder="Nome Completo" required style= "color: white;"/>
              <div class="section-contact--split">
                  <input type="text" name="nascimento" placeholder="Nascimento(dd/mm/YY) " required style="color: white;"/>
                  <input type="text" name="telefone" placeholder="Telefone"  style="color: white;"/>
              </div>

              <input type="text" name="email" placeholder="E-mail" required style="color: white;"/>

              <input type="password" id = "senhaCad" name="senha" placeholder="Senha" required style="color: white; "/>

              <div class="custom-file">
                  <input type="file" accept="image/*" class="custom-file-input" id="fotoPerfil" name="fotoPerfil" >                        
                  <label class="custom-file-label" for="fotoPerfil">Escolher arquivo</label>
                </div>

              <input type="submit" value="Cadastrar" class="button"/>
              <div class="section-fact"><p>Já possui cadastro? <a href="form_login.php">Faça login<a>.</p></div>
          </form>
    </div>
    </div>
    </section>
</body>



