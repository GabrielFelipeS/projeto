<?php include './inc/cabecalho.php'; ?>
  <?php include './lib/mylib.php'; ?>
  <?php include './inc/connection.php'; ?>
  <?php include './lib/database.php'; ?>
  </head>
  
  <body>
  <header>
    <div class="header">
        <div class="logo">
            <div class="logoimg"><img src="./assets/images/livro_icon.png" alt="icone livro"></div>
        </div>
        <h2>BIBLIOTEX</h2>
      </header>

<main>

    <section>
    
    <?= @abertura_dark(['titulo' => 'Cadastro', 'id' => 'cadastroUsuario']) ?>


    
    <div class="section-contact">
        <form method="POST" enctype="multipart/form-data" action="./inc/cadastrar-usuario-processamento.php">
            <input type="text" name="nome" placeholder="Nome Completo" required style= "color: white;"/>
            <div class="section-contact--split">
                <input type="text" name="nascimento" placeholder="Data de nascimento" required style="color: white;"/>
                <input type="text" name="telefone" placeholder="Telefone"  style="color: white;"/>
            </div>

            <input type="text" name="email" placeholder="E-mail" required style="color: white;">
            <input type="password" name="senha" placeholder="Senha" required style="color: white; "/>

            <div class="custom-file">
                        <input type="file" accept="media/*" class="custom-file-input" id="fotoPerfil" name="fotoPerfil" >                        
                        <label class="custom-file-label" for="comprovonte">Foto de perfil</label>
            </div>
            <input type="submit" value="Cadastrar" class="button"/>
            <div class="section-fact"><p>Já possui cadastro? <a href=" ">Faça login<a>.</p></div>
        </form>
    </div>

</section>
<?php include './inc/footer.php'; ?>
<?php include './inc/rodape.php'; ?>

