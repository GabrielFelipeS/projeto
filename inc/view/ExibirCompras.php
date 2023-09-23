<?php 
    include '../appearance/cabecalho.php'; 
    include '../../lib/mylib.php'; 
    include '../connection.php'; 
    include '../../lib/database.php';
    include '../appearance/header.php';
    $vendas = getall('compras');
 ?>


<?= @abertura_light(['titulo' => '<strong>Lista de Vendas</strong>', 'id' => 'LivrosCadastrados']) ?>
<div style="color: black;">
<h4 style="display: flex; justify-content: center; margin: 10px;"></h4>
    <table class="table table-striped">
      <thead>
        <tr>
          <th>ID do vendedor</th>
          <th>ISBN</th>
          <th>Nome do livro</th>
          <th>CPF do comprador</th>
          <th>Quantidade</th>
          <th>Valor da compra</th>
          <th>Excluir</th>
          <th>Editar</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($vendas as $venda) { 
            $condicao = $venda['ISBNlivro'];    
            $livro = get('livros', "ISBN =  $condicao");
            $quantidade = $venda['valor']/$livro['valorLivro']; ?>
          <tr>
            <td><?php echo $venda['codVendedor']; ?></td>
            <td><?php echo $venda['ISBNlivro']; ?></td>
            <td><?php echo $livro['nomeLivro']; ?></td>
            <td><?php echo $venda['cpfComprador']; ?></td>
            <td><?php echo $quantidade; ?></td>
            <td><?php echo $venda['valor']; ?></td>
            <td>
                <a href="/projeto/inc/controller/excluirCompra.php?id=<?= $venda['id']; ?>"><button type="button" class="btn btn-primary" style="background-color: black; border-color: black; margin-right: 25px;"><img style="width: 30px;  filter: invert(1);" src="/projeto/assets/images/excluir.png" alt="excluir" ></button></a> 
            </td>
            <td>      
                <a href="/projeto/inc/view/cadastrarCompra.php?ISBN=<?= $venda['ISBNlivro'].'-'.$venda['id'].'-'.'Editando o livro'.'-'.'salvarCompra.php?id='?>"><button type="button" class="btn btn-primary" style="background-color: black; border-color: black;"><img style="width: 30px; filter: invert(1);" src="/projeto/assets/images/editar.png" alt="editar"></button></a>           
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>
</div>
</section>


<?php include '../appearance/footer.php'; ?>
<?php include '../appearance/rodape.php'; ?>