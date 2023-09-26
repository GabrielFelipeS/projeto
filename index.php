  <?php 
    session_start();

    include './inc/appearance/cabecalho.php'; 
    include './lib/mylib.php'; 
    include './inc/connection.php'; 
    include './lib/database.php'; 
    include './inc/DAO/LivroDAO.php'; 

     
  ?>
  
  </head>
  
  <body>
      <?php include './inc/appearance/header.php';  ?>
      
      </header>

      

        <?php 
    //INICO- trecho de confirmação de exclusão
        $mensagem = '';
        if (isset($_SESSION['compraRealizada'])) {
            $mensagem = "<p style='display: flex; color: green; justify-content: center;'><strong>".$_SESSION['compraRealizada']."</strong></p>";
    
            unset($_SESSION['compraRealizada']);
        }
        ?>
    
        <?php if ($mensagem): ?>
            <?= abertura_dark(['titulo' => 'Compra realizada', 'descricao' => $mensagem, 'id' => 'mensagem']) ?>
            </div>
            </div>
            </section>
        <?php endif; ?>
    
    <script>
        // Obtém a referência ao elemento da mensagem de erro
        const mensagem = document.getElementById("mensagem");
        // Define um intervalo de tempo em milissegundos (por exemplo, 5000ms = 5 segundos)
        let tempoExibicao = 10000; // 4 segundos
        // Função para ocultar a mensagem após o tempo definido
        function deletaMensagem() {
            var node = document.getElementById("mensagem");
            if (node.parentNode) {
                node.parentNode.removeChild(node);
            }
        }
        // Configura o temporizador para chamar a função após o tempo definido
        setTimeout(deletaMensagem, tempoExibicao);
        //FIM -trecho de confirmação de exclusão
    </script>


      <main>
        <section class="banner">
            <div class="sliders">
                
                <?= slide_area(['titulo' => 'Melhores preços só na', 'titulo_colorido' => 'Bibliotex', 'subtitulo' => 'Ligue para: +00 0 1234 5678', 'botao' => 'Compre já!', 'button1' => 'actives buttonarea1', 'button2' => 'buttonarea1']) ?>
                <?= slide_area(['titulo' => 'Garanta a oferta', 'titulo_colorido' => 'Compre seu o já', 'subtitulo' => 'Ligue para: +00 0 1234 5678', 'botao' => 'Compre já!', 'button1' => 'buttonarea2', 'button2' => 'actives buttonarea2']) ?>
            </div>
        </section>

        <?= abertura_light(['titulo' => 'Sobre nós', 'descricao' => 'Quem somos?', 'id' => 'Empresa']) ?>
        <div class="section-aboutus">
            <div class="section-aboutus--left">

                <p>A <span>Bibliotex</span> é a maior fornecedor de livros do Brasil, defendemos a eduacação e o incentivo a leitura. Livros foram feitos para serem lidos e deveriam ser lido por todos independentemente da idade, seja criança ou idoso. E a <span>Bibliotex</span> oferece os melhores livros com variedade para todos os gostos e idades, desde livros em quadrinhos e mangás a livros de romances clássicos.
                </p>

                <br />
                <a href="" class="button">Leia mais</a>
            </div>
            <div class="section-aboutus--right">
                <img src="./assets/images/lendo.jpg" />
            </div>
        </div>
        </div>
        </section>

        <?= abertura_dark(['titulo' => 'Serviços', 'descricao' => 'SERVIÇOS QUE PRESTAMOS', 'id' => 'Servicos']) ?>
        <div class="section-services">
            <?= section_service(['imagem' => 'assets/images/medalha.png', 'titulo' => 'Alta qualidade', 'paragrafo' => 'Livros com qualidade altissimos']) ?>

            <?= section_service(['imagem' => 'assets/images/estrela.png', 'titulo' => 'Livros inesquecíveis', 'paragrafo' => 'Nem mesmo a maldição de Addie LaRue vai te fazer esquece-lós']) ?>

            <?= section_service(['imagem' => 'assets/images/relogio.png', 'titulo' => 'Entrega mais rápida do Olimpo', 'paragrafo' => 'Entrega feita o mais rápido que Hermes consegue']) ?>

            <?= section_service(['imagem' => 'assets/images/balao.png', 'titulo' => 'Suporte rápido e gratuito', 'paragrafo' => 'Até os Deuses ficam com inveja']) ?>
        </div>
        </div>
        </section>

        <!-- CARREGAMENTO DOS LIVROS -->
        <?= abertura_light(['titulo' => 'Melhores livros', 'descricao' => 'Para todos os gostos', 'id' => 'Livros']) ?>
        <div class="section-livros">
            <div class="section-livros--photos">

                <?= carregarLivros()?>

            </div>
            <a href="./inc/view/cadastrarExibirlivros.php" class="button">Mais livros</a>
        </div>
        </div>
        </section>

        <?= abertura_dark(['titulo' => 'Melhores escritores', 'descricao' => 'Best-sellers', 'id' => 'autor']) ?>
        <div class="section-team">
            <div class="sliders">
                
                <?= slider_team(['nome' => 'V.E Schwab' , 'role' => 'Autora de A vida invisivel de Addie LaRue' , 'imagem' => 'media/v-e-schwab.png']); ?>


                <?= slider_team(['nome' => 'Matt Haig' , 'role' => 'Autor de A biblioteca da meia-noite' , 'imagem' => 'media/haig.png']); ?>

                <?= slider_team(['nome' => 'Victoria Aveyard' , 'role' => 'Escritora de A Rainha Vermelha' , 'imagem' => 'media/aveyard.png']); ?>
                                    

            </div>
        </div>
        </div>
        </section>


        <!-- CARREGAMENTO DAS SUGESTOES DO CLIENTE -->
        <?= abertura_light(['titulo' => 'Clientes', 'descricao' => 'Sugestões de clientes', 'id' => 'Clientes']) ?>
        <div class="section-testimonials">
        <div class="sliders">         
            <?php  
                $slides = rfile('./inc/controller/sugestoes'); 
                foreach($slides as $slide) {
                    echo '</br>'.$slide;
                }
            ?>
        </div>
        </div>
        </div>
        </section>

        <?= include './inc/appearance/companies.php'; ?>

        <?= abertura_light(['titulo' => 'Preços', 'descricao' => 'Assinaturas', 'id' => 'Preco']) ?>
        <div class="section-price">
            <?= price_item(['nome' => 'Leitor Bebê', 'preco' => 'R$ 10.00', 'periodo' => 'Mês', 'item' => '<span>Esse plano é: </span>', 'desc' => 'Para pequenos leiores que acabaram de chegar ao mundo ou ainda estão aprendendo a falar e descobrindo o mundo ao seu redor'])?>
            
            <?= price_item(['nome' => 'Leitor iniciante', 'preco' => 'R$ 18.90', 'periodo' => 'Mês', 'item' => '<span>Esse plano é: </span>', 'desc' => 'Para leitores que necessitam de alguma ajuda para ler ou que estão se aventurando pelo vasto mundo da leitura'])?>

            <?= price_item(['nome' => 'Leitor autônomo', 'preco' => 'R$ 29.90', 'periodo' => 'Mês', 'item' => '<span>Esse plano é: </span>', 'desc' => 'Para crianças e jovens que já se tornaram grandes leitores e se atreven a ler obras mais completas e longas'])?>

            <?= price_item(['nome' => 'Leitor Experiente', 'preco' => 'R$ 49.99', 'periodo' => 'Mês', 'item' => '<span>Esse plano é: </span>', 'desc' => 'Para leitores veteranos que não tem medo de se arriscar em um mundo completamente novo e cheio de novos livros'])?>

        </div>
        </div>
        </section>

        <?= abertura_light(['titulo' => 'Os livros', 'descricao' => 'Podem te levar a qualquer lugar do mundo', 'id' => 'premium']) ?>     
        <div style="color: white;"><?= include './inc/appearance/carrosel.php'; ?> </div>     
        </div>
        </section>

        <?= abertura_dark(['titulo' => 'Detalhes', 'descricao' => 'Sobre nossa empresa', 'id' => 'Detalhes']) ?>
        <div class="section-facts">
            <div class="section-fact">
                <h3>10000</h3>
                <div class="section-fact-line"></div>
                <h4>Assinantes</h4>
                <p>Nem Luke tem tantos</p>
            </div>
            <div class="section-fact">
                <h3>900</h3>
                <div class="section-fact-line"></div>
                <h4>Livros</h4>
                <p>Uma variedade tão grande quanto a biblioteca da meia-noite</p>
            </div>
            <div class="section-fact">
                <h3>500</h3>
                <div class="section-fact-line"></div>
                <h4>Lojas</h4>
                <p>Espalhadas por todo Brasil</p>
            </div>
            <div class="section-fact">
                <h3>100</h3>
                <div class="section-fact-line"></div>
                <h4>Boxes de livros</h4>
                <p>Nem mesmo no olimpo cabe tanto livro</p>
            </div>
        </div>
        </div>
        </section>

        <section class="section-share">
            <div class="section-share--legend">
                <img src="assets/images/share.png" />
                Compartilhe em:
            </div>
            <div class="section-share--item">
                <div class="section-share--icon twitter">
                    <img src="assets/images/twitter.png" />
                </div>
                564
            </div>
            <div class="section-share--item">
                <div class="section-share--icon linkedin">
                    <img src="assets/images/linkedin.png" />
                </div>
                260
            </div>
            <div class="section-share--item">
                <div class="section-share--icon facebook">
                    <img src="assets/images/facebook.png" />
                </div>
                486
            </div>
            <div class="section-share--item">
                <div class="section-share--icon googleplus">
                    <img src="assets/images/googleplus.png" />
                </div>
                152
            </div>
            <div class="section-share--item">
                <div class="section-share--icon pinterest">
                    <img src="assets/images/pinterest.png" />
                </div>
                349
            </div>
        </section>


        <?=  abertura_light(['titulo' => 'Sugestões', 'descricao' => 'Deixe sua sugestão aqui', 'id' => 'Sugestoes'])?>
        

    <?php
          $mensagemSugestao = '';
          $sugestao = $_GET['Sugestoes?sugestao'] ?? '';
      
          if ($sugestao == 'recebida') {
              $mensagemSugestao = "<p style='display: flex; color: green; justify-content: center;'><strong>Sugestao recebida.</strong></p>";
          }
          ?>
          <?php if ($mensagemSugestao): ?>
              <div class="sugestao-mensagem" id="sugestaoMensagem">
                  <?= $mensagemSugestao ?>
              </div>
          <?php endif; ?>
      
          <script>
          // Obtém a referência ao elemento da mensagem de erro
          const sugestaoMensagem = document.getElementById("sugestaoMensagem");
          // Define um intervalo de tempo em milissegundos (por exemplo, 5000ms = 5 segundos)
          tempoExibicao = 4000; // 4 segundos
          // Função para ocultar a mensagem após o tempo definido
          function ocultarMensagemSugestao() {
              sugestaoMensagem.style.display = "none"; // Oculta a mensagem de erro
          }
          // Configura o temporizador para chamar a função após o tempo definido
          setTimeout(ocultarMensagemSugestao, tempoExibicao);
          //FIM -trecho de confirmação de exclusão
      </script>
      
      

        <div class="section-contact" id= 'Sugestoes?sugestao=recebida'>
            <form method="POST" enctype="multipart/form-data" action="./inc/controller/sugestao.php" >
                <div class="section-contact--split">
                    <input type="text" name="name" placeholder="NOME" required/>
                    <input type="text" name="email" placeholder="EMAIL" required/>
                </div>
                <input type="text" name="assunto" placeholder="ASSUNTO" required/>
                <textarea name="message" placeholder="SUGESTAO" required></textarea>
                <div class="custom-file">
                            <input type="file" accept="image/*" class="custom-file-input" id="imagem" name="imagem" required>                        
                            <label class="custom-file-label" for="comprovonte">Escolher arquivo</label>
                </div>
                <input type="submit" value="Envie a mensagem" class="button"/>
            </form>
        </div>
        </div>
        </section>
        
        <section class="section-map" title="CONTATOS">
            <div class="section-map--area">
                <div class="section-map--info">
                    <div class="section-map--info-item">
                        <br>
                        <div class="section-map--info-item-img">
                            <img src="assets/images/carta.png" />
                        </div>
                        bibliiotex@leitores.com
                    </div>
                    <div class="section-map--info-item">
                        <div class="section-map--info-item-img">
                            <img src="assets/images/localizacao.png" />
                        </div>
                        Av. Salgado Filho, 3501 - Centro, Guarulhos - SP, 07115-000
                    </div>
                    <div class="section-map--info-item">
                        <div class="section-map--info-item-img">
                            <img src="assets/images/telefone.png" />
                        </div>
                        (11) 1234-5678
                    </div>
                    <div class="section-map--info-item">
                        <div class="section-map--info-item-img">
                            <img src="assets/images/arroba.png" />
                        </div>
                        @bibliotex
                    </div>
                    <div class="section-map--info-item">
                        <div class="section-map--info-item-img">
                            <img src="assets/images/web.png" />
                        </div>
                        www.bibliotex.com
                    </div>
                </div>
            </div>
        </section>

      </main>

      <?php include './inc/appearance/footer.php'; ?>
      <?php include './inc/appearance/rodape.php'; ?>



  </body>

  </html>