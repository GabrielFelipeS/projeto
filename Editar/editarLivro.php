<?php
    include '../inc/appearance/cabecalho.php'; 
    include '../lib/mylib.php'; 
    include '../lib/database.php';
    include '../inc/connection.php'; 
    #$ISBN = $_GET['ISBN'];
    include '../inc/dados_editar.php';
    include '../inc/appearance/header.php';
?>
    
    <?= @abertura_dark(['titulo' => 'Gostaria de editar um livro?', 'id' => 'inserirLivros']) ?>
    <div class="section-contact">
        <form method="POST" enctype="multipart/form-data" action="./inc/salvarAlteracoes.php?ISBN=<?=$_GET['ISBN']?>">
            <div class="section-contact--split">
                <input type="text" value="<?= setValue('ISBN') ?>" name="ISBN" placeholder="ISBN" required style="color: white;"/>
                <input type="text" value="<?= setValue('valorLivro') ?>" name="VALOR" placeholder="VALOR" required style="color: white;"/>
            </div>
            <input type="text" value="<?= setValue('nomeLivro') ?>" name="NOME" placeholder="NOME" required style="color: white;"/>
            <textarea name="DESCRICAO" placeholder="DESCRIÇÃO" required style="color: white;"><?= setValue('descricao') ?></textarea>
            <div class="custom-file">
                    <input type="file" accept="media/*" class="custom-file-input" id="imagem" name="imagem" required>                        
                    <label class="custom-file-label" for="imagem">Escolher arquivo</label>
            </div>
            <input type="submit" value="Envie a mensagem" class="button"/>
        </form>
    </div>
</div>
</section>

<?php include '../inc/appearance/footer.php'; ?>
<?php include '../inc/appearance/rodape.php'; ?>
