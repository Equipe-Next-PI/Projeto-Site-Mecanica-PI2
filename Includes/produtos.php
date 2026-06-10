<?php
require_once './config/conexao.php';

try {
    $stmt = $pdo->query("SELECT id, nome, descricao, preco, estoque, imagem FROM produtos WHERE estoque > 0");
    $produtos = $stmt->fetchAll();
} catch (PDOException $e) {
    echo "Erro ao carregar o catálogo: " . $e->getMessage();
    $produtos = [];
}
?>

<main class="page-produtos" id="produtos">
    <div class="services-header-container services-header-container--top">
        <h2 class="section-title">Nossos Produtos</h2>
        <div class="section-subtitle">
            Peças e acessórios de qualidade <span class="star-icon">★</span>
        </div>
    </div>

    <section class="products-grid-container">
        <div class="products-grid">
            <?php foreach ($produtos as $produto): ?>
                <article class="product-card">
                    <div class="product-image-wrapper">
                        <img
                            class="product-image"
                            src="<?php echo htmlspecialchars($produto['imagem']); ?>"
                            alt="<?php echo htmlspecialchars($produto['nome']); ?>"
                            loading="lazy"
                            onerror="this.src='./assets/img/forms.png'"
                        />
                    </div>
                    <div class="product-info">
                        <h3 class="product-name"><?php echo htmlspecialchars($produto['nome']); ?></h3>
                        <?php if (!empty($produto['descricao'])): ?>
                            <p class="product-desc"><?php echo htmlspecialchars($produto['descricao']); ?></p>
                        <?php endif; ?>
                        <div class="product-price-row">
                            <span class="product-price">R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></span>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </div>
    </section>
</main>
