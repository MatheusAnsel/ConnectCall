<?php
session_start();

// Verifica login e permissão de admin (tipo != 0)
if (empty($_SESSION['idusuarios']) || empty($_SESSION['tipo'])) {
    header('Location: ../Tela de login/login.php');
    exit;
}

if (!empty($_GET['iddados'])) {
    include_once('../config.php');

    $iddados = (int) $_GET['iddados']; // cast para inteiro previne SQLi

    // Verifica se o registro existe antes de deletar
    $stmtCheck = $conexao->prepare("SELECT iddados FROM dados WHERE iddados = ?");
    $stmtCheck->bind_param("i", $iddados);
    $stmtCheck->execute();
    $stmtCheck->store_result();

    if ($stmtCheck->num_rows > 0) {
        // Prepared statement — sem SQL Injection
        $stmtDel = $conexao->prepare("DELETE FROM dados WHERE iddados = ?");
        $stmtDel->bind_param("i", $iddados);
        $stmtDel->execute();
    }
}

header('Location: ../dados/dados.php');
exit;
