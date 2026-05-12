<?php
session_start();

if (empty($_POST) || empty($_POST['usuario']) || empty($_POST['senha'])) {
    header('Location: login.php');
    exit;
}

include('../config.php');

$usuario = trim($_POST['usuario']);
$senha   = $_POST['senha'];

// Prepared statement — sem SQL Injection
$stmt = $conexao->prepare("SELECT idusuarios, usuario, senha, tipo FROM usuarios WHERE usuario = ?");
$stmt->bind_param("s", $usuario);
$stmt->execute();
$res = $stmt->get_result();

if ($res->num_rows > 0) {
    $row = $res->fetch_object();

    // Verifica a senha com password_verify (hash bcrypt)
    if (password_verify($senha, $row->senha)) {
        session_regenerate_id(true); // previne session fixation
        $_SESSION['usuario']    = $row->usuario;
        $_SESSION['tipo']       = $row->tipo;
        $_SESSION['idusuarios'] = $row->idusuarios;
        header('Location: ../Pagina principal/index.php');
        exit;
    }
}

// Credenciais inválidas — mensagem genérica (não revela se usuário existe)
header('Location: login.php?erro=1');
exit;
