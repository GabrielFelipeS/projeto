

<?php 
    session_start();
    include '../appearance/cabecalho.php'; 
    include '../../lib/mylib.php'; 
    include '../connection.php'; 
    include '../../lib/database.php'; 
    include '../appearance/header.php';
    

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
        <form method="POST" enctype="multipart/form-data" action="../controller/salvarVendedor.php?cpf=<?= $buscar['cpf'];?>">
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
  
            <input type="submit" value="Cadastrar" class="button"/>
        </form>
    </div>
</div>
</section>
<?php include '../appearance/footer.php'; ?>
<?php include '../appearance/rodape.php'; ?>
