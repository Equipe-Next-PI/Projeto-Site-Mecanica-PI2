<body>
  <div class="root">
    <section class="nav-wrapper">
      <?php include_once('./Includes/header.php'); ?>
    </section>

    <section id="home" class="swiper mySwiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide card-carousel-parent"
          style="background-image: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('./assets/img/slide1.png');">
          <div class="card-carousel">
            <h1 class="lorem-ipson">MECÂNICA DE CONFIANÇA</h1>
            <p class="lorem-ipsum-dolor">Especialistas em câmbio automático e injeção eletrônica na Freguesia do Ó.</p>
            <div class="cta-buttons">
              <button class="conhea">Conheça a NEXT</button>
              <button class="component-3">Serviços</button>
            </div>
          </div>
        </div>

        <div class="swiper-slide card-carousel-parent"
          style="background-image: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('./assets/img/slide2.png');">
          <div class="card-carousel">
            <h1 class="lorem-ipson">TECNOLOGIA DE PONTA</h1>
            <p class="lorem-ipsum-dolor">Diagnóstico computadorizado para identificar problemas com precisão.</p>
            <div class="cta-buttons">
              <button class="conhea">Agendar Agora</button>
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
          <img class="frame-child" loading="lazy" alt="Serviço 1" src="./assets/img/cards.png" />
          <div class="card-overlay-text">Diagnóstico preciso e rápido para o seu veículo.</div>
        </div>
        <div class="rectangle-parent">
          <img class="frame-child" loading="lazy" alt="Serviço 2" src="./assets/img/cards.png" />
          <div class="card-overlay-text">Manutenção preventiva com peças originais.</div>
        </div>
        <div class="rectangle-parent">
          <img class="frame-child" loading="lazy" alt="Serviço 3" src="./assets/img/cards.png" />
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
          <form action="./Includes/contato.php" method="POST">
            <div class="input-fields">
              <input name="nome" type="text" class="input-nome" placeholder="Nome:" required />
              <input name="email" type="email" class="input-email" placeholder="Email:" required />

              <div class="input-pair">
                <input name="telefone" class="input-tel" placeholder="Telefone:" type="text" />
                <input name="celular" class="input-cel" placeholder="Celular:" type="text" />
              </div>
              <div class="input-pair">
                <input name="marca" class="input-marca" placeholder="Marca do Veículo:" type="text" />
                <input name="modelo" class="input-modelo" placeholder="Modelo e Ano:" type="text" />
              </div>
              <input name="servico" class="input-tipo" placeholder="Tipo de Serviço:" type="text" />
              <textarea name="descricao" class="input-desc" placeholder="Descrição do Problema:"></textarea>
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
            <img class="services-background-icon" loading="lazy" alt="Mecânico" src="./assets/img/forms.png" />
            <div class="services-info">
              <div class="services-title">
                <b class="nossos-servios">Nossos Serviços</b>
              </div>
              <div class="service-list">
                <div class="manuteno-preventiva-reparos-container">
                  <ul class="manuteno-preventiva-reparos">
                    <li>Manutenção Preventiva</li>
                    <li>Reparos Gerais</li>
                    <li>Troca de Óleo e Filtros</li>
                    <li>Alinhamento e Balanceamento</li>
                    <li>Freios e Suspensão</li>
                    <li>Diagnóstico Eletrônico</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <div class="map-area">
            <b class="mapa">Mapa</b>
            <div class="map-interface">
              <div class="map-location">
                <iframe
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14634.33161280387!2d-46.7056037088118!3d-23.511520110469623!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cef85566f19ecf%3A0xc682f6e91316b208!2sFreguesia%20do%20%C3%93%2C%20S%C3%A3o%20Paulo%20-%20SP!5e0!3m2!1spt-BR!2sbr!4v1714500000000!5m2!1spt-BR!2sbr"
                  width="100%" height="120" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
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

    <?php include_once('./includes/footer.php'); ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <script src="./assets/script.js"></script>
</body>

</html>