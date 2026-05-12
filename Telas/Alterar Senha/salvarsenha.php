<?php
session_start();

// Verifica se está logado
if (empty($_SESSION['idusuarios'])) {
    header('Location: ../Tela de login/login.php');
    exit;
}

include_once('../config.php');

if (isset($_POST['update'])) {
    $novaSenha    = $_POST['senha'];
    $confirmaSenha = $_POST['senha2'];

    if (strlen($novaSenha) < 8) {
        header('Location: AlterarSenha.php?erro=curta');
        exit;
    }

    if ($novaSenha !== $confirmaSenha) {
        header('Location: AlterarSenha.php?erro=diverge');
        exit;
    }

    // Hash bcrypt da nova senha
    $senhaHash = password_hash($novaSenha, PASSWORD_BCRYPT);

    // Prepared statement — sem SQL Injection
    $stmt = $conexao->prepare("UPDATE usuarios SET senha = ? WHERE idusuarios = ?");
    $stmt->bind_param("si", $senhaHash, $_SESSION['idusuarios']);
    $stmt->execute();
}

header('Location: ../Pagina principal/index.php');
exit;
