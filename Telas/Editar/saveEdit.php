<?php
session_start();

// Verifica login e permissão de admin
if (empty($_SESSION['idusuarios']) || empty($_SESSION['tipo'])) {
    header('Location: ../Tela de login/login.php');
    exit;
}

include_once('../config.php');

if (isset($_POST['update'])) {
    $iddados  = (int) $_POST['iddados'];
    $nome     = trim($_POST['nome']);
    $nomemae  = trim($_POST['nomemae']);
    $celular  = trim($_POST['celular']);
    $telfixo  = trim($_POST['telfixo']);
    $cpf      = trim($_POST['cpf']);
    $datanasc = trim($_POST['datanasc']);
    $genero   = trim($_POST['genero']);
    $email    = trim($_POST['email']);
    $cep      = trim($_POST['cep']);
    $rua      = trim($_POST['rua']);
    $numero   = trim($_POST['numero']);
    $bairro   = trim($_POST['bairro']);
    $cidade   = trim($_POST['cidade']);
    $estado   = trim($_POST['estado']);

    // Prepared statement — sem SQL Injection
    $stmt = $conexao->prepare(
        "UPDATE dados SET nome=?, nomemae=?, celular=?, telfixo=?, cpf=?,
         datanasc=?, genero=?, email=?, cep=?, rua=?, numero=?,
         bairro=?, cidade=?, estado=?
         WHERE iddados=?"
    );
    $stmt->bind_param(
        "ssssssssssssssi",
        $nome, $nomemae, $celular, $telfixo, $cpf,
        $datanasc, $genero, $email, $cep, $rua, $numero,
        $bairro, $cidade, $estado, $iddados
    );
    $stmt->execute();
}

header('Location: ../dados/dados.php');
exit;
