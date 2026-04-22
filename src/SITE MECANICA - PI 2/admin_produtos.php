<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin - Cadastro de Produtos | Equipe NEXT</title>
    <link rel="stylesheet" href="./assets/global.css" />
    <link rel="stylesheet" href="./assets/admin.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" />
</head>

<body>

    <header class="admin-nav">
        <div class="logo">
            <div class="logo2">Logo</div>
        </div>
        <div class="admin-nav-links">
            <a href="#" class="active">Produtos</a>
            <a href="#">Formulário</a>
            <a href="#">Contato</a>
        </div>
    </header>

    <main class="admin-container">

        <section class="admin-content">
            <div class="content-header">
                <h1>Cadastro de Produtos</h1>
            </div>

            <div class="table-container">
                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Produto</th>
                            <th>Descrição</th>
                            <th>Preço</th>
                            <th>Estoque</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Óleo 5W40</td>
                            <td>Óleo sintético para motores...</td>
                            <td>120,00</td>
                            <td>50</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Filtro de Ar</td>
                            <td>Filtro esportivo de alta...</td>
                            <td>85,00</td>
                            <td>30</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Pastilha de Freio</td>
                            <td>Pastilhas de cerâmica...</td>
                            <td>250,00</td>
                            <td>15</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>

        <aside class="admin-sidebar">

            <div class="search-box">
                <input type="text" placeholder="Pesquisar" class="search-input" />
            </div>

            <div class="form-container">
                <h3>Registre seu produto</h3>
                <form action="#" method="POST" class="admin-form">
                    <input type="text" name="produto" placeholder="Produto" required />
                    <input type="text" name="preco" placeholder="Preço" required />
                    <input type="number" name="estoque" placeholder="Estoque" required />
                    <textarea name="descricao" placeholder="Descrição" rows="4" required></textarea>

                    <button type="submit" class="btn-salvar">Salvar Produto</button>
                </form>
            </div>

        </aside>

    </main>
</body>

</html>