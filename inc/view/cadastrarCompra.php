 <?php
    session_start();
    include '../appearance/cabecalho.php';
    include '../../lib/mylib.php';
    include '../connection.php';
    include '../../lib/database.php';
    include '../appearance/header.php';

    //var_dump($_SESSION);
    //var_dump($_POST);
/*
    $partes = explode("-",$_GET['ISBN']);
    $ISBN = $partes[0];
    $id = empty($partes[1])? '': $partes[1];

    $titulo = empty($partes[2])? 'Comprando o livro!': $partes[2];

    $link = empty($partes[3])? 'ProcessamentoCadastrarCompra.php?ISBN='.$ISBN : "../controller/".$partes[3].$id.'&ISBN='.$ISBN;

    $dadosDoLivro = get('livros', "ISBN = $ISBN");
    
    
    if($id != '') {
        $_POST = get('compras', "id = $id");
        $quantidade = $_POST['valor']/$dadosDoLivro['valorLivro'];
    } else {
        $quantidade = '';
    }*/
    
    var_dump($_SESSION);
    var_dump($_POST);
    var_dump($_GET);

    $ISBN = $_GET['ISBN'] ?? '';
    $id = $_GET['id'] ?? '';
    $dadosDoLivro = get('livros', "ISBN = $ISBN");

    $mensagemBotao = $_GET['mensagemBotao'] ?? 'Efetuar Compra!';
    $link = empty($_GET['link'])? 'ProcessamentoCadastrarCompra.php?ISBN='.$ISBN : $_GET['link'].$id.'&ISBN='.$ISBN;
    echo '<br>' . $_GET['link'] . '<br>';
    echo '<br>' . $link . '<br>';

    if(isset($_GET['id'])) {
        $titulo = $_GET['titulo'];
        $_POST = get('compras', "id = $id");
        var_dump($_POST);
        $_SESSION['codigoVendedor'] = $_POST['codVendedor'];
        $_SESSION['cartao'] = $_POST['cartao'];
        $_SESSION['cpf'] = $_POST['cpfComprador'];
        $_SESSION['quantidade'] =  $_POST['valor']/$dadosDoLivro['valorLivro'];;
    }

?>





<?= @abertura_light(['titulo' => "$titulo", 'id' => 'inserirLivros']) ?>

    <?php 
    //INICO- trecho de confirmação de exclusão
        $mensagem = '';
        if (isset($_SESSION['mensagem'])) {
            $mensagem = "<p style='display: flex; color: red; justify-content: center;'><strong>".$_SESSION['mensagem']."</strong></p>";
    
            unset($_SESSION['mensagem']);
        }
        ?>
    
        <?php if ($mensagem): ?>
            <div class="mensagem" id="mensagem">
                <?= $mensagem ?>
            </div>
        <?php endif; ?>
    
        <script>
        // Obtém a referência ao elemento da mensagem de erro
        const mensagem = document.getElementById("mensagem");
        // Define um intervalo de tempo em milissegundos (por exemplo, 5000ms = 5 segundos)
        const tempoExibicao = 10000; // 4 segundos
        // Função para ocultar a mensagem após o tempo definido
        function ocultarMensagemErro() {
            mensagem.style.display = "none"; // Oculta a mensagem de erro
        }
        // Configura o temporizador para chamar a função após o tempo definido
        setTimeout(ocultarMensagemErro, tempoExibicao);
        //FIM -trecho de confirmação de exclusão
    </script>

    <section>
        <div style="display: flex; justify-content: center; align-items: start;">
            <?= dados_do_livro($dadosDoLivro)?>
        </div>
        <div style="display: flex; justify-content: center; align-items: start;">
        <p><strong>O livro vai ser comprado por R$<?= number_format($dadosDoLivro['valorLivro'], 2, ',', ' ');?></strong></p>
        </div>
        <div class="section-contact">
            <!-- ./inc/salvarAlteracoes.php?ISBN=<#?=$_GET['ISBN']?> -->
                <form method="POST" enctype="multipart/form-data" action="../controller/<?=$link?>">
                    <div class="section-contact--split">
                        <input type="text" value="<?= $_SESSION['codigoVendedor'] ?? '' ?>" name="codigo_vendedor" placeholder="CODIGO DO VENDEDOR" required />
                        <input type="text" value="<?= $_SESSION['cpf'] ?? '' ?>" name="cpf" placeholder="CPF" required />
                    </div>
                    <div class="section-contact--split">
                        <input type="text" name="quantidade" value="<?= $_SESSION['quantidade'] ?? '' ?>" placeholder="QUANTIDADE" required/>
                        <input type="text" value="<?= $_SESSION['cartao'] ?? '' ?>" name="cartao" placeholder="CARTÃO" required />
                    </div>
                    <input type="submit" value="<?= $mensagemBotao?>" class="button"/>
                </form>
            </div>
    </section>
</div>
</section>


<?php unset($_SESSION['codigoVendedor'], $_SESSION['cartao'], $_SESSION['cpf'], $_SESSION['quantidade']); ?>
<?php include '../apparance/footer.php'; ?>
<?php include '../apparance/rodape.php'; ?>
