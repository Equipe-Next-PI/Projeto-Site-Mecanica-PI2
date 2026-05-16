<?php
/* ============================================================
   CONFIGURAÇÃO DA CAMADA DE DADOS (PDO) — EQUIPE NEXT
   ============================================================ */

$host = 'localhost';
$dbname = 'oficina_next';
$usuario = 'root';
$senha = ''; // Padrão do XAMPP é vazio

try {
    // Inicializa a instância do PDO com suporte a caracteres UTF-8
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $usuario, $senha);

    // Define o modo de erro para exceções (essencial para tratamento com try/catch)
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Define o retorno padrão de consultas como Array Associativo
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // Em caso de falha catastrófica, interrompe a execução sem expor credenciais na tela
    error_log("Falha na conexão: " . $e->getMessage());
    die("Erro interno no servidor. Não foi possível conectar ao banco de dados.");
}