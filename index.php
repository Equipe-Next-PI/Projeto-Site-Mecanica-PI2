<body>
  <div class="root">
    <section class="nav-wrapper">
      <?php include_once('./Includes/header.php'); ?>
    </section>

    <section id="home" class="swiper mySwiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide card-carousel-parent carousel-slide--1">
          <div class="card-carousel">
            <h1 class="lorem-ipson">MECÂNICA DE CONFIANÇA</h1>
            <p class="carousel-subtitle">Especialistas em câmbio automático e injeção eletrônica na Freguesia do Ó.</p>
            <div class="cta-buttons">
              <a class="conhea" href="#sobre">Conheça a NEXT</a>
              <a class="component-3" href="#servicos">Serviços</a>
            </div>
          </div>
        </div>

        <div class="swiper-slide card-carousel-parent carousel-slide--2">
          <div class="card-carousel">
            <h1 class="lorem-ipson">TECNOLOGIA DE PONTA</h1>
            <p class="carousel-subtitle">Diagnóstico computadorizado para identificar problemas com precisão.</p>
            <div class="cta-buttons">
              <a class="conhea" href="#contato">Agendar Agora</a>
            </div>
          </div>
        </div>

        <div class="swiper-slide card-carousel-parent carousel-slide--3">
          <div class="card-carousel">
            <h1 class="lorem-ipson">QUALIDADE GARANTIDA</h1>
            <p class="carousel-subtitle">Peças originais e mão de obra especializada para o seu veículo.</p>
            <div class="cta-buttons">
              <a class="conhea" href="#contato">Fale Conosco</a>
            </div>
          </div>
        </div>
      </div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
      <div class="swiper-pagination"></div>
    </section>

    <section class="image-banner">
      <div class="frame-group">
        <div class="rectangle-parent">
          <!-- Substituir src pela imagem desejada. Tamanho ideal: 600x400px -->
          <img class="frame-child" loading="lazy" alt="Diagnóstico Veicular" src="./assets/img/cards.png" />
          <div class="card-overlay-text">Diagnóstico preciso e rápido para o seu veículo.</div>
        </div>
        <div class="rectangle-parent">
          <!-- Substituir src pela imagem desejada. Tamanho ideal: 600x400px -->
          <img class="frame-child" loading="lazy" alt="Manutenção Preventiva" src="./assets/img/mecanica1.jpg" />
          <div class="card-overlay-text">Manutenção preventiva com peças originais.</div>
        </div>
        <div class="rectangle-parent">
          <!-- Substituir src pela imagem desejada. Tamanho ideal: 600x400px -->
          <img class="frame-child" loading="lazy" alt="Equipe Especializada" src="./assets/img/mecanica3.jpg" />
          <div class="card-overlay-text">Equipe especializada em carros nacionais e importados.</div>
        </div>
      </div>
    </section>

    <section class="produtos-wrapper" id="servicos">
      <div class="produtos">
        <div class="services-header-container">
          <h2 class="section-title">Nossas Especialidades</h2>
          <div class="section-subtitle">
            Confira nossos serviços <span class="star-icon">★</span>
          </div>
        </div>

        <div class="services-grid">
          <div class="flip-card">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <div class="card-content">
                  <h3 class="card-title">Câmbio Automático</h3>
                  <img class="chevron-icon" src="./assets/icons/icon-ionicons-sharp-chevron-down-sharp.svg"
                    alt="Ver mais" />
                </div>
                <div class="orange-bar"></div>
              </div>
              <div class="flip-card-back">
                <div class="card-content">
                  <p>Manutenção preventiva, troca de óleo e reparo completo do sistema de transmissão.</p>
                </div>
                <div class="orange-bar"></div>
              </div>
            </div>
          </div>

          <div class="flip-card">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <div class="card-content">
                  <h3 class="card-title">Manutenção de Câmbio</h3>
                  <img class="chevron-icon" src="./assets/icons/icon-ionicons-sharp-chevron-down-sharp.svg"
                    alt="Ver mais" />
                </div>
                <div class="orange-bar"></div>
              </div>
              <div class="flip-card-back">
                <div class="card-content">
                  <p>Diagnóstico computadorizado e conserto de engrenagens e válvulas.</p>
                </div>
                <div class="orange-bar"></div>
              </div>
            </div>
          </div>

          <div class="flip-card">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <div class="card-content">
                  <h3 class="card-title">Troca de Óleo do Motor</h3>
                  <img class="chevron-icon" src="./assets/icons/icon-ionicons-sharp-chevron-down-sharp.svg"
                    alt="Ver mais" />
                </div>
                <div class="orange-bar"></div>
              </div>
              <div class="flip-card-back">
                <div class="card-content">
                  <p>Utilizamos os melhores óleos do mercado para proteção total do seu motor.</p>
                </div>
                <div class="orange-bar"></div>
              </div>
            </div>
          </div>

          <div class="flip-card">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <div class="card-content">
                  <h3 class="card-title">Suspensão e Direção</h3>
                  <img class="chevron-icon" src="./assets/icons/icon-ionicons-sharp-chevron-down-sharp.svg"
                    alt="Ver mais" />
                </div>
                <div class="orange-bar"></div>
              </div>
              <div class="flip-card-back">
                <div class="card-content">
                  <p>Troca de amortecedores, molas, bandejas e alinhamento completo.</p>
                </div>
                <div class="orange-bar"></div>
              </div>
            </div>
          </div>

          <div class="flip-card">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <div class="card-content">
                  <h3 class="card-title">Injeção Eletrônica</h3>
                  <img class="chevron-icon" src="./assets/icons/icon-ionicons-sharp-chevron-down-sharp.svg"
                    alt="Ver mais" />
                </div>
                <div class="orange-bar"></div>
              </div>
              <div class="flip-card-back">
                <div class="card-content">
                  <p>Limpeza de bicos, rastreamento de falhas e substituição de sensores.</p>
                </div>
                <div class="orange-bar"></div>
              </div>
            </div>
          </div>

          <div class="flip-card">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <div class="card-content">
                  <h3 class="card-title">Troca de Pneus</h3>
                  <img class="chevron-icon" src="./assets/icons/icon-ionicons-sharp-chevron-down-sharp.svg"
                    alt="Ver mais" />
                </div>
                <div class="orange-bar"></div>
              </div>
              <div class="flip-card-back">
                <div class="card-content">
                  <p>Venda e montagem de pneus, balanceamento 3D e rodízio programado.</p>
                </div>
                <div class="orange-bar"></div>
              </div>
            </div>
          </div>

          <div class="flip-card">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <div class="card-content">
                  <h3 class="card-title">Correias e Tensionadores</h3>
                  <img class="chevron-icon" src="./assets/icons/icon-ionicons-sharp-chevron-down-sharp.svg"
                    alt="Ver mais" />
                </div>
                <div class="orange-bar"></div>
              </div>
              <div class="flip-card-back">
                <div class="card-content">
                  <p>Prevenção contra quebra de motor com a troca de correia dentada e do alternador.</p>
                </div>
                <div class="orange-bar"></div>
              </div>
            </div>
          </div>

          <div class="flip-card">
            <div class="flip-card-inner">
              <div class="flip-card-front">
                <div class="card-content">
                  <h3 class="card-title">Sistema de Freios</h3>
                  <img class="chevron-icon" src="./assets/icons/icon-ionicons-sharp-chevron-down-sharp.svg"
                    alt="Ver mais" />
                </div>
                <div class="orange-bar"></div>
              </div>
              <div class="flip-card-back">
                <div class="card-content">
                  <p>Troca de pastilhas, discos, fluidos e manutenção avançada do sistema ABS.</p>
                </div>
                <div class="orange-bar"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php include_once('./Includes/produtos.php'); ?>

    <section class="divisoria-cont"></section>

    <section id="sobre" class="about-container-wrapper">
      <div class="about-container">
        <div class="about-content">
          <section class="about-description">
            <img class="image-4-icon" loading="lazy" alt="Oficina" src="./assets/img/sobre.png" />
            <div class="years-experience">
              <div class="experience-detail">
                <b class="experience-counter"><span>20 </span><span class="span">+ </span></b>
              </div>
              <div class="anos-de-experiencia">Anos de experiência</div>
            </div>
          </section>

          <section class="about-paragraph">
            <div class="rectangle-parent3">
              <h3 class="sobre-a-lorem">Sobre a Oficina NEXT</h3>
              <div class="nossa-oficina-mecnica">
                Nossa oficina mecânica é especializada em oferecer serviços de qualidade na Freguesia do Ó. Com uma
                equipe altamente qualificada e experiente, estamos prontos para atender às necessidades de manutenção e
                reparo do seu veículo.<br><br>
                Oferecemos uma ampla gama de serviços, desde troca de óleo, balanceamento de rodas, troca de pneus até
                diagnóstico avançado de problemas mecânicos. Conte conosco para cuidar do seu veículo com o máximo de
                profissionalismo.
              </div>
            </div>
          </section>
        </div>
      </div>
    </section>

    <section class="statistics-section">
      <div class="statistics-card">
        <div class="stat-item">
          <img src="./assets/icons/Vector1.svg" alt="Tempo" class="stat-icon" />
          <div class="stat-text">
            <span class="stat-number">20 +</span>
            <span class="stat-desc">Anos de experiência</span>
          </div>
        </div>

        <div class="stat-item">
          <img src="./assets/icons/Vector3.svg" alt="Clientes" class="stat-icon" />
          <div class="stat-text">
            <span class="stat-number">5000+</span>
            <span class="stat-desc">Clientes Satisfeitos</span>
          </div>
        </div>

        <div class="stat-item">
          <img src="./assets/icons/Vector2.svg" alt="Aprovação" class="stat-icon" />
          <div class="stat-text">
            <span class="stat-number">100%</span>
            <span class="stat-desc">Taxa de Aprovação</span>
          </div>
        </div>

        <div class="stat-item">
          <img src="./assets/icons/Clip-path-group.svg" alt="Certificações" class="stat-icon" />
          <div class="stat-text">
            <span class="stat-number">10+</span>
            <span class="stat-desc">Certificações</span>
          </div>
        </div>
      </div>
    </section>

    <section id="contato" class="form-container-wrapper">
      <div class="form-container">
        <section class="form-contato">
          <div class="solicite-um-oramento">Solicite um orçamento</div>
          
          <?php if (isset($_GET['sucesso']) && $_GET['sucesso'] == '1'): ?>
              <div class="form-alert form-alert--success">
                  Orçamento enviado com sucesso! A nossa equipe entrará em contato em breve.
              </div>
          <?php elseif (isset($_GET['erro'])): ?>
              <div class="form-alert form-alert--danger">
                  Erro ao enviar orçamento. Verifique se preencheu todos os campos obrigatórios.
              </div>
          <?php endif; ?>

          <form action="./modules/formularios/enviar_orcamento.php" method="POST">
            <div class="input-fields">
              <input name="nome" type="text" class="input-nome" placeholder="Nome:" required />
              <input name="email" type="email" class="input-email" placeholder="Email:" required />

              <div class="input-pair">
                <input name="telefone" class="input-tel" placeholder="Telefone:" type="text" />
                <input name="celular" class="input-cel" placeholder="Celular:" type="text" required />
              </div>
              <div class="input-pair">
                <input name="marca" class="input-marca" placeholder="Marca do Veículo:" type="text" required />
                <input name="modelo" class="input-modelo" placeholder="Modelo e Ano:" type="text" required />
              </div>
              <input name="servico" class="input-tipo" placeholder="Tipo de Serviço:" type="text" required />
              <textarea name="descricao" class="input-desc" placeholder="Descrição do Problema:" required></textarea>
            </div>
            <div class="btn-submit-wrapper">
              <button type="submit" class="btn-submit">
                <div class="enviar">Enviar Orçamento</div>
              </button>
            </div>
          </form>
        </section>

        <section class="service-area">
          <div class="nossoserv">
            <img class="services-background-icon" loading="lazy" alt="Mecânico trabalhando" src="./assets/img/forms.png" />
            <div class="services-info">
              <h3 class="nossos-servios">Nossos Serviços</h3>
              <ul class="service-list">
                <li>Manutenção Preventiva</li>
                <li>Reparos Gerais</li>
                <li>Troca de Óleo e Filtros</li>
                <li>Alinhamento e Balanceamento</li>
                <li>Freios e Suspensão</li>
                <li>Diagnóstico Eletrônico</li>
              </ul>
            </div>
          </div>

          <div class="map-area">
            <h3 class="mapa">Onde estamos</h3>
            <div class="map-interface">
              <div class="map-location">
                <iframe
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14634.33161280387!2d-46.7056037088118!3d-23.511520110469623!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cef85566f19ecf%3A0xc682f6e91316b208!2sFreguesia%20do%20%C3%93%2C%20S%C3%A3o%20Paulo%20-%20SP!5e0!3m2!1spt-BR!2sbr!4v1714500000000!5m2!1spt-BR!2sbr"
                  width="100%" height="180" allowfullscreen="" loading="lazy" title="Localização Mecânica NEXT"></iframe>
              </div>

              <div class="contact-list-right">
                <div class="contact-item">
                  <img class="contact-icon" loading="lazy" alt="Local"
                    src="./assets/icons/icon-heroicons-Solid-location-marker.svg" />
                  <span>Rua das Flores, 123 - Freguesia do Ó</span>
                </div>
                <div class="contact-item">
                  <img class="contact-icon" loading="lazy" alt="Telefone"
                    src="./assets/icons/icon-heroicons-Solid-phone.svg" />
                  <span>(11) 98765-4321</span>
                </div>
                <div class="contact-item">
                  <img class="contact-icon" loading="lazy" alt="Email"
                    src="./assets/icons/icon-jam-icons-filled-envelope-f.svg" />
                  <span>contato@oficinanext.com.br</span>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </section>

  </div>
  <?php include_once('./includes/footer.php'); ?>

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="./assets/script.js"></script>
</body>

</html>