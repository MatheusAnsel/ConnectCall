<?php
// Configuração de conexão com o banco de dados
// Para produção, use variáveis de ambiente:
//   $dbHost     = getenv('DB_HOST') ?: 'localhost';
//   $dbUsername = getenv('DB_USER') ?: 'root';
//   $dbPassword = getenv('DB_PASS') ?: '';
//   $dbName     = getenv('DB_NAME') ?: 'bdtelecall';

$dbHost     = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName     = 'bdtelecall';

$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($conexao->connect_errno) {
    error_log("Erro de conexão MySQL: " . $conexao->connect_error);
    die("Erro interno. Tente novamente mais tarde.");
}

$conexao->set_charset("utf8mb4");
