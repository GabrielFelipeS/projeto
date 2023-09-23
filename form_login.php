<?php include './inc/appearance/cabecalho.php'; ?>
<?php include './inc/connection.php'; ?>
</head>

<body>
  <style>
    html,
    body {
      overflow: hidden;
      height: 100%;
      margin: 0;
      padding: 0;
    }

    body {
      background-color: black;
    }

    .container {
      display: flex;
      justify-content: center;
      align-items: flex-end;
      height: 70vh;
    }

    .login-form {
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      max-width: 600px;
      width: 100%;
      box-sizing: border-box;
      border: 2px solid black;
      border: fixed;
    }

    input {
      background-color: white;
    }

    #email,
    #senha {
      border: 2px solid black;
      border-radius: 10px;
      padding: 10px;
      width: 100%;
      margin-bottom: 20px;
    }
  </style>
  <header>
    <div class="header">
      <div class="logo">
        <div class="logoimg"><img src="./assets/images/livro_icon.png" alt="icone livro"></div>
      </div>
      <h2>BIBLIOTEX</h2>
    </div>
  </header>
  <main>
  <section>

    <div class="container">
      <div class="login-form">
      <form method="POST" action="login-processamento.php">
          <h2 style="color:#fff; text-align: center;">LOGIN</h2>
          <div class="form-group" style="margin-top: 20px;"> 
          <input type="email" id="email" name="email" placeholder="Email" required class="rounded-input">
          </div>

          <div class="form-group">
          <input type="password" id="senha" name="senha" placeholder="Senha" required class="rounded-input">
          </div>

          <input type="submit" value="Login" class="button" />
        </form>
        <div class="section-fact"><p>Ainda não possui cadastro? <a href="form-cadastrar-usuario.php">Cadastre-se</a>.</p></div>
      </div>
    </div>
  </section>
</main>
</body>
</html>

<style>
  .form-group {
    margin-bottom: 20px;
  }

  .button {
    padding: 15px 150px;
    border: none;
    margin-left: 5.5rem;
  }

  .rounded-input {
    width: 100%;
    padding: 15px 60px;
    border: none;
    border-radius: 10px;
    margin: 0;
  }
</style>
<?php
session_start();
if (isset($_SESSION["login_error"])) {
    echo '<div class="error-message">' . $_SESSION["login_error"] . '</div>';
    unset($_SESSION["login_error"]); // Limpa a mensagem de erro após exibi-la
}
?>
