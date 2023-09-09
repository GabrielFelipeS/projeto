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
    
    <?= @abertura_dark(['titulo' => 'Cadastro realizado com sucesso', 'id' => 'cadastroUsuario']) ?>
         
   <div>
   <div class="section-contact">
   <section class="container-form">
        <form action="login.php" method="post">                      
            <input type="submit" value="Login" class="button"/>
        </form>
    </div>
   </div>
    

    
</section>
<?php include './inc/footer.php'; ?>
<?php include './inc/rodape.php'; ?>
