# 📦 Oficina Integrada – Sistema de Gestão para Mecânica de Bairro

### 📌 Visão Geral
O **Site para Oficina Mecânica** é uma solução web robusta desenvolvida pela equipe **NEXT**, focada em transformar a gestão operacional de oficinas mecânicas de pequeno e médio porte. O sistema substitui agendas de papel e controles manuais por um ecossistema digital que integra desde os serviços até o controle de estoque.

#### 🎯 Diferenciais de Engenharia:
* **Arquitetura Modular:** Divisão clara entre responsabilidades (Autenticação, Cadastros e Estoque).
* **Persistência Relacional:** Modelagem de banco de dados SQL otimizada para garantir transações seguras.
* **Interface Centrada no Usuário (UX):** Design intuitivo focado na rotina rápida de uma oficina.
* **Segurança de Acesso:** Controle de sessão e autenticação .

---

### 🏗️ Arquitetura do Sistema
O projeto segue uma estrutura organizada para garantir escalabilidade e facilidade de manutenção:

* **Interface (Front-end):** HTML5, CSS3 (Bootstrap 5) e JavaScript (ES6+).
* **Lógica de Negócio (Back-end):** PHP 8.x (ou Node.js), processando validações e regras de cálculo.
* **Camada de Dados:** Banco de dados **MySQL** com integridade referencial.

---

### 🧱 Stack Tecnológica
* **Linguagem Principal:** PHP 8.x / JavaScript
* **Banco de Dados:** MySQL 8.0
* **Framework CSS:** Bootstrap 5
* **Prototipagem:** Figma (Design de Interface)
* **Ambiente Local:** XAMPP / WampServer

---

 📁 Estrutura de Diretórios
```text
.
├── sql/                  # Scripts de criação do banco (schema.sql)
├── src/
│   ├── config/           # Conexão com banco de dados
│   ├── includes/         # Componentes reutilizáveis (Header, Footer)
│   ├── modules/          # Lógica dividida por funcionalidades
│   │   ├── estoque/      # Controle de peças
│   ├── assets/           # CSS, Imagens e Bibliotecas JS
│   └── index.php         # Dashboard Principal / Login
└── .env.example          # Template de variáveis de ambiente

```
---

### ⚙️ Setup de Desenvolvimento

Clone o Repositório:

```text
git clone https://github.com/Mr-Torugo/Projeto-Site-Mecanica-PI2.git
```

Servidor Local: Mova a pasta para o htdocs (XAMPP).

Banco de Dados: Crie o banco oficina_db e importe o arquivo sql/schema.sql.

Acesso: Abra http://localhost/oficina-mecanica no navegador.

---

### Fluxo de Commits:

Para manter a organização no GitHub, a equipe adota regras para os commits:

`feat`: Nova funcionalidade (ex: `feat:` adiciona cadastro de veículos)

`fix`: Correção de bug (ex: `fix:` corrige erro no cálculo do total financeiro)

`docs`: Mudanças na documentação (ex: `docs:` atualiza instruções de setup)

`style`: Formatação de código (ex: `style:` formata indentation do index.php)

---

Controle de Versão (Git Flow Simplificado):

A branch `main` é reservada para a versão estável e final do projeto.

Todo o desenvolvimento é feito em branches específicas (feat/cadastro-clientes, fix/login).

O `merge` para a `main` requer a revisão de pelo menos dois membros da equipe.

---

### 📝 Equipe NEXT (TSI - 2º Semestre)

ALICKSON RAMOS LISBOA – [Front-end / Integração]

PEDRO NASCIMENTO JESUS – [Banco de Dados / Lógica Back-end]

VITOR HUGO DE JESUS SILVA – [Product Owner / Back-end / Front-end]

WALLACE FRANCISCO OLIVEIRA SILVA – [Lógica Back-end / Documentação]

---

Projeto acadêmico desenvolvido para a disciplina de Projetos de Sistemas para Internet.
