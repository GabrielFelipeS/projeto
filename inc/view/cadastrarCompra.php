 <?php
    include '../appearance/cabecalho.php';
    include '../../lib/mylib.php';
    include '../connection.php';
    include '../../lib/database.php';
    include '../appearance/header.php';

    
    $partes = explode("-",$_GET['ISBN']);
    $ISBN = $partes[0];
    $id = empty($partes[1])? '': $partes[1];

    $titulo = empty($partes[2])? 'Comprando o livro!': $partes[2];

    $link = empty($partes[3])? 'ProcessamentoCadastrarCompra.php?ISBN='.$ISBN : "../controller/".$partes[3].$id.'-'.$ISBN;

    $dadosDoLivro = get('livros', "ISBN = $ISBN");
    if($id != '') {
        $_POST = get('compras', "id = $id");
        $quantidade = $_POST['valor']/$dadosDoLivro['valorLivro'];
    } else {
        $quantidade = '';
    }

?>


<?= @abertura_light(['titulo' => "$titulo", 'id' => 'inserirLivros']) ?>
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
