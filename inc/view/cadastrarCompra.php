 <?php
    session_start();
    include '../appearance/cabecalho.php';
    include '../../lib/mylib.php';
    include '../connection.php';
    include '../../lib/database.php';
    include '../appearance/header.php';

    //var_dump($_SESSION);
    //var_dump($_POST);

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
                        <input type="text" value="<?= setValue('codVendedor') ?>" name="codigo_vendedor" placeholder="CODIGO DO VENDEDOR" required />
                        <input type="text" value="<?= setValue('cpfComprador') ?>" name="cpf" placeholder="CPF" required />
                    </div>
                    <div class="section-contact--split">
                        <input type="text" value="<?= $quantidade ?>" name="quantidade" placeholder="QUANTIDADE" required/>
                        <input type="text" value="<?= setValue('cartao') ?>" name="cartao" placeholder="CARTÃO" required />
                    </div>
                    <input type="submit" value="Efetuar Compra!" class="button"/>
                </form>
            </div>
    </section>
</div>
</section>

<?php include '../apparance/footer.php'; ?>
<?php include '../apparance/rodape.php'; ?>
