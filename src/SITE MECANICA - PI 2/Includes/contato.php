<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pegando os dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $descricao = $_POST['descricao'];

    // Lógica futura: salvar no banco de dados (MySQL/SQLite)
    echo "Orçamento recebido para: " . $nome;
}
?>