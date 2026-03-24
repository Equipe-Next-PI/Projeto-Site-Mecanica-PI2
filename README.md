📦 Site para Oficina Mecânica de Bairro – Sistema de Gestão Operacional
📌 Visão Geral
O Site para Oficina Mecânica é uma solução web completa para digitalizar e organizar as operações de oficinas de bairro. O sistema centraliza o controle de clientes, agendamentos, estoque de peças e fluxo financeiro em uma única plataforma online, permitindo que o dono da oficina abandone as agendas de papel e planilhas desorganizadas. O foco é a eficiência operacional e a facilidade de uso para o administrador.

🎯 Diferenciais do Projeto:
Centralização de Dados: Registro estruturado de clientes, veículos, serviços e produtos em um banco de dados relacional.

Segurança: Módulo de autenticação seguro para garantir que apenas o administrador (dono da oficina) acesse dados sensíveis.

Controle de Estoque Ativo: Acompanhamento automático da quantidade de peças com registro de entradas e saídas.

Visibilidade Financeira: Relatórios simples de entradas e saídas para controle do fluxo de caixa.

🏗️ Arquitetura do Sistema
O projeto é estruturado de forma modular e organizada, seguindo princípios de separação de responsabilidades (uma abordagem MVC simplificada):

Banco de Dados (MySQL): Camada de persistência com tabelas relacionais para Usuários, Clientes, Veículos, Produtos, Serviços, Agendamentos e Transações Financeiras.

Lógica de Negócio e Persistência (PHP/Node.js): Scripts responsáveis pelo processamento de dados (ex: cadastrar_cliente.php, agendar_servico.php) e interação direta com o banco de dados (consultas SQL).

Interface do Usuário (Front-end): Telas responsivas para o painel de controle (Dashboard), formulários de cadastro e visualização de relatórios, utilizando HTML5, CSS3, JavaScript e Bootstrap.

🧱 Stack Tecnológica
Linguagem (Back-end): PHP 8.x [ou Node.js v18 LTS]

Banco de Dados: MySQL 8.0 [ou MariaDB]

Linguagem (Front-end): JavaScript (ES6+), HTML5, CSS3

Framework CSS: Bootstrap 5 (para responsividade)

Ferramentas de Design: Figma (Prototipagem de Alta Fidelidade)

Servidor Web Local: XAMPP / WampServer 

📁 Estrutura de Diretórios (Exemplo em PHP)
Este projeto segue uma estrutura organizada para facilitar a manutenção e o desenvolvimento em equipe.

.
├── sql/                  # Scripts de criação do banco (schema.sql)
├── src/
│   ├── config/           # Conexão com banco de dados e variáveis globais
│   ├── includes/         # Componentes reutilizáveis (Header, Footer, Navbar)
│   ├── modules/          # Lógica de negócio dividida por funcionalidades
│   │   ├── agenda/       # Sistema de marcação de horários
│   │   ├── estoque/      # Controle de entradas e saídas de peças
│   │   ├── financeiro/   # Fluxo de caixa e relatórios
│   │   └── clientes/     # Gestão de Clientes e Veículos
│   ├── assets/           # CSS, Imagens e Bibliotecas JS
│   └── index.php         # Dashboard Principal / Login
├── docs/                 # Documentação do escopo e requisitos
└── .env.example          # Exemplo de configuração de ambiente

⚙️ Setup de Desenvolvimento
Para rodar o projeto localmente, siga os passos abaixo:

Pré-requisitos: Ter um ambiente WAMP/LAMP instalado (ex: XAMPP) ou Node.js e MySQL configurados.

Clone o Projeto:

Bash
git clone https://github.com/next-semester/oficina-mecanica.
Mova para o Servidor: Copie a pasta do projeto para o diretório htdocs (XAMPP) ou www (WampServer).

Configuração do Banco de Dados:

Abra o phpMyAdmin (ou seu gerenciador MySQL preferido).

Crie um novo banco de dados chamado oficina_db.

Importe o arquivo db/schema.sql para criar as tabelas.

Configuração de Ambiente:

Renomeie o arquivo .env.example para .env.

Edite o .env com suas credenciais locais do MySQL (usuário, senha, host).

Acesse o Sistema: Abra o navegador e digite http://localhost/oficina-mecanica.

📝 Governança e Qualidade de Código (NEXT SEMESTER)
Gestão da Equipe:

A equipe utiliza metodologias ágeis (Sprints semanais) para dividir o desenvolvimento dos módulos.

Membros e Atuações Principais:

ALICKSON RAMOS LISBOA – [Front-end / Integração]

PEDRO NASCIMENTO JESUS – [Banco de Dados / Lógica Back-end]

VITOR HUGO DE JESUS SILVA – [Product Owner / Back-end / Front-end]

WALLACE FRANCISCO OLIVEIRA SILVA – [Lógica Back-end / Documentação]

Fluxo de Commits:

Para manter a organização no GitHub, a equipe adota regras para os commits:

feat: Nova funcionalidade (ex: feat: adiciona cadastro de veículos)

fix: Correção de bug (ex: fix: corrige erro no cálculo do total financeiro)

docs: Mudanças na documentação (ex: docs: atualiza instruções de setup)

style: Formatação de código (ex: style: formata indentation do index.php)

Controle de Versão (Git Flow Simplificado):

A branch main é reservada para a versão estável e final do projeto.

Todo o desenvolvimento é feito em branches específicas (feat/cadastro-clientes, fix/login).

O merge para a main requer a revisão de pelo menos dois membros da equipe.
