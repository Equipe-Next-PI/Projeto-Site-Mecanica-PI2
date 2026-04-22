<?php
// O header já traz o menu e as configurações de HTML
include_once('./Includes/header.php');

/* SIMULAÇÃO DO BANCO DE DADOS (Painel do Administrador)*/

$produtos_cadastrados = [
    [
        "imagem" => "./assets/img/cards.png",
        "nome" => "Óleo de Motor Sintético 5W40",
        "descricao" => "Proteção máxima para motores de alta performance.",
        "preco" => "120,00"
    ],
    [
        "imagem" => "./assets/img/cards.png",
        "nome" => "Kit Pastilha de Freio",
        "descricao" => "Pastilhas de cerâmica com alta durabilidade.",
        "preco" => "250,00"
    ],
    [
        "imagem" => "./assets/img/forms.png",
        "nome" => "Bateria Automotiva 60Ah",
        "descricao" => "Bateria selada livre de manutenção com 18 meses de garantia.",
        "preco" => "450,00"
    ],
    [
        "imagem" => "./assets/img/forms.png",
        "nome" => "Filtro de Ar Esportivo",
        "descricao" => "Aumenta o fluxo de ar e melhora o desempenho do veículo.",
        "preco" => "85,00"
    ]
];
?>

<main class="page-produtos">
    <div class="services-header-container" style="margin-top: 40px;">
        <h2 class="section-title">Nossos Produtos</h2>
        <div class="section-subtitle">
            Peças e acessórios de qualidade <span class="star-icon">★</span>
        </div>
    </div>

    <section class="products-grid-container">
        <div class="products-grid">

            <?php foreach ($produtos_cadastrados as $produto): ?>
                <div class="product-card">
                    <div class="product-image-wrapper">
                        <img src="<?php echo $produto['imagem']; ?>" alt="<?php echo $produto['nome']; ?>"
                            class="product-image">
                    </div>
                    <div class="product-info">
                        <h3 class="product-name"><?php echo $produto['nome']; ?></h3>
                        <p class="product-desc"><?php echo $produto['descricao']; ?></p>
                        <div class="product-price-row">
                            <span class="product-price">R$ <?php echo $produto['preco']; ?></span>
                            <button class="btn-buy">Comprar</button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </section>
</main>