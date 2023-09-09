

<?php 
    include './inc/cabecalho.php'; 
    include './lib/mylib.php'; 
    include './inc/connection.php'; 
    include './lib/database.php'; 
    include './inc/header.php';
    
    $id = $_GET['cod'];
    $cod = $_GET['cod'];
    $buscar = get('vendedor', "codigo_vendedor = $cod");
    #echo $buscar['cpf'];
    #$sql = "SELECT * FROM vendedor WHERE codigo_vendedor = $id";
    #$sql = "SELECT * FROM endereco WHERE cpfDono =". $buscar['cpf'];
    $sql = "SELECT * FROM vendedor v INNER JOIN endereco e ON v.cpf = e.cpfDono AND v.cpf =". $buscar['cpf'];
    $res = mysqli_query($conn, $sql);
    $_POST = mysqli_fetch_assoc($res);
?>



<?= @abertura_dark(['titulo' => 'Cadastrar funcionario', 'id' => 'JaCadastrados']) ?>
<div class="section-contact">
        <form method="POST" enctype="multipart/form-data" action="./inc/salvarVendedor.php?cpf=<?= $buscar['cpf'];?>">
            <input type="text" value="<?= setValue('nomeCompleto') ?>" name="NOME" placeholder="NOME COMPLETO" required style="color: white;"/>
            <div class="section-contact--split">
                <input type="text" value="<?= setValue('codigo_vendedor') ?>" name="CODIGO_VENDEDOR" placeholder="CODIGO DO VENDEDOR" style="color: white;"/>
                <input type="text" value="<?= setValue('cpf') ?>" name="CPF" placeholder="CPF" required style="color: white;"/>
            </div>

            <div class="section-contact--split">
                <input type="text" value="<?= setValue('data_de_nascimento') ?>" name="nascimento" placeholder="NASCIMENTO: Y/m/a" required style="color: white;"/>
                <input type="text" value="<?= setValue('nacionalidade') ?>" name="nacionalidade" placeholder="NACIONALIDADE" required style="color: white;"/>
            </div>

            <div class="section-contact--split">
                <input type="text" value="<?= setValue('endereco') ?>" name="endereco" placeholder="ENDEREÇO" required style="color: white;"/>
                <input type="text" value="<?= setValue('cep') ?>" name="cep" placeholder="CEP" required style="color: white;"/>
            </div>
            <div class="section-contact--split">
                <input type="text" value="<?= setValue('cidade') ?>" name="cidade" placeholder="CIDADE" required style="color: white;"/>
                <input type="text" value="<?= setValue('estado') ?>" name="estado" placeholder="ESTADO" required style="color: white;"/>
            </div>

            <div class="section-contact--split">
                <input type="text" value="<?= setValue('bairro') ?>" name="bairro" placeholder="BAIRRO" required style="color: white;"/>
                <input type="text" value="<?= setValue('complemento') ?>" name="complemento" placeholder="COMPLEMENTO" style="color: white;"/>
            </div>
  
            <input type="submit" value="Envie a mensagem" class="button"/>
        </form>
    </div>
</div>
</section>
<?php include './inc/footer.php'; ?>
<?php include './inc/rodape.php'; ?>
