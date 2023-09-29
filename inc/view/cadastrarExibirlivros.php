<?php 
    session_start();
    include "../appearance/cabecalho.php"; 
    include '../../lib/mylib.php'; 
    include '../connection.php'; 
    include '../../lib/database.php'; 
    include '../DAO/LivroDAO.php'; 
    include '../appearance/header.php'; 
    
?>

</header>

<?php 
    //INICO- trecho de confirmação de exclusão
        #var_dump($_SESSION);
        
        $mensagem = '';
        if (isset($_SESSION['mensagem'])):
            $mensagem = "<h6 style='display: flex; color: ".$_SESSION['cor']."; justify-content: center;'><strong>".$_SESSION['mensagem']."</strong></h6>";
    
            unset($_SESSION['mensagem'], $_SESSION['cor']);
        ?>
    
            <?php if ($mensagem): ?>
                <div class="default light" id="mensagem">
                    <?= $mensagem ?>
                </div>
            <?php endif; ?>
        
            <script id="script">
            // Obtém a referência ao elemento da mensagem de erro
            //const mensagem = document.getElementById("mensagem");
            // Define um intervalo de tempo em milissegundos (por exemplo, 5000ms = 5 segundos)
            let tempoExibicao = 10000; // 10 segundos
            // Função para ocultar a mensagem após o tempo definido
            function deletaMensagem() {
                var node = document.getElementById("mensagem");
                if (node.parentNode) {
                    node.parentNode.removeChild(node);
                }

                var node = document.getElementById("script");
                if (node.parentNode) {
                    node.parentNode.removeChild(node);
                }
            }
            // Configura o temporizador para chamar a função após o tempo definido
            setTimeout(deletaMensagem, tempoExibicao);
            //FIM -trecho de confirmação de exclusão
        </script>
    <?php endif; ?>
<?= @abertura_light(['titulo' => 'Livros já cadastrados', 'id' => 'LivrosCadastrados']) ?>
    <div class="section-livros">
        <div class="section-livros--photos">
            <?= @carregarLivrosParaEditar()?>
        </div>
    </div>
</div>
</section>


<?= @abertura_dark(['titulo' => 'Gostaria de inserir um livro?', 'id' => 'inserirLivros']) ?>
    <div class="section-contact">
        <form method="POST" enctype="multipart/form-data" action="/projeto/inc/controller/ProcessamentoCadastrar_livro.php">
            <div class="section-contact--split">
                <input type="text" name="ISBN" placeholder="ISBN" required style="color: white;"/>
                <input type="text" name="VALOR" placeholder="VALOR" required style="color: white;"/>
            </div>
            <input type="text" name="NOME" placeholder="NOME" required style="color: white;"/>
            <textarea name="DESCRICAO" placeholder="DESCRIÇÃO" required style="color: white;"></textarea>
            <div class="custom-file">
                        <input type="file" accept="media/*" class="custom-file-input" id="imagem" name="imagem" required>                        
                        <label class="custom-file-label" for="comprovonte">Escolher arquivo</label>
            </div>
            <input type="submit" value="Enviar livro" class="button"/>
        </form>
    </div>
</div>
</section>
<?php include '../appearance/footer.php'; ?>
<?php include '../appearance/rodape.php'; ?>
