
<?php 
    session_start();

    include '../appearance/cabecalho.php'; 
    include '../../lib/mylib.php'; 
    include '../connection.php'; 
    include '../../lib/database.php'; 
    include '../appearance/header.php'; 
    include '../DAO/VendedorDAO.php';
  
?>

<style>
    body {
        background-color: black;
    }

    .centralizar{
        width:100vw;
        max-width:1140px;
        margin-top:20px;
        display:flex;
        flex-wrap:wrap;
        justify-content:space-around;
    }
    .space {
        margin-top: 20px;
        margin-right: 20px;
    }
</style>

<?php if(@validar($_SESSION['email'])): ?>
    <?= @abertura_light(['titulo' => 'Funcionarios', 'id' => 'JaCadastrados']) ?>
        <div class="centralizar">
            <?= @carregarfunc(); ?>
        </div>
    </div>
    </section>
<?php endif; ?>

<?= @abertura_dark(['titulo' => 'Cadastrar funcionario', 'id' => 'JaCadastrados']) ?>
<div class="section-contact">
        <form method="POST" enctype="multipart/form-data" action="/projeto/inc/controller/ProcessamentoCadastrarVendedor.php">
            <input type="text" value="<?= setValue('nomeCompleto') ?>" name="NOME" placeholder="NOME COMPLETO" required style="color: white;"/>
            <div class="section-contact--split">
                <input type="text" value="<?= setValue('codigo_vendedor') ?>" name="CODIGO_VENDEDOR" placeholder="CODIGO DO VENDEDOR" style="color: white;"/>
                <input type="text" value="<?= setValue('cpf') ?>" name="CPF" placeholder="CPF" required style="color: white;"/>
            </div>

            <div class="section-contact--split">
                <input type="text" value="<?= setValue('data_de_nascimento') ?>" name="nascimento" placeholder="NASCIMENTO: Y/m/a" required style="color: white;"/>
                <input type="text" value="<?= setValue('nascionalidade') ?>" name="nacionalidade" placeholder="NASCIONALIDADE" required style="color: white;"/>
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
