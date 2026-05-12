<?php
session_start();

// Verifica login e permissão de admin
if (empty($_SESSION['idusuarios']) || empty($_SESSION['tipo'])) {
    header('Location: ../Tela de login/login.php');
    exit;
}

include_once('../config.php');

if (empty($_GET['iddados'])) {
    header('Location: ../dados/dados.php');
    exit;
}

$iddados = (int) $_GET['iddados'];

// Prepared statement — sem SQL Injection
$stmt = $conexao->prepare("SELECT * FROM dados WHERE iddados = ?");
$stmt->bind_param("i", $iddados);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header('Location: ../dados/dados.php');
    exit;
}

$user_data = $result->fetch_assoc();
// Extrai variáveis com htmlspecialchars para exibição segura no HTML
$nome     = htmlspecialchars($user_data['nome']);
$nomemae  = htmlspecialchars($user_data['nomemae']);
$celular  = htmlspecialchars($user_data['celular']);
$telfixo  = htmlspecialchars($user_data['telfixo']);
$cpf      = htmlspecialchars($user_data['cpf']);
$datanasc = htmlspecialchars($user_data['datanasc']);
$genero   = htmlspecialchars($user_data['genero']);
$email    = htmlspecialchars($user_data['email']);
$cep      = htmlspecialchars($user_data['cep']);
$rua      = htmlspecialchars($user_data['rua']);
$numero   = htmlspecialchars($user_data['numero']);
$bairro   = htmlspecialchars($user_data['bairro']);
$cidade   = htmlspecialchars($user_data['cidade']);
$estado   = htmlspecialchars($user_data['estado']);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Dados pessoais</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/icone.ico" type="image/x-icon">
</head>

<body>
    <main>
        <form action="saveEdit.php" class="formulario" method="POST">
            <div class="voltar">
                <a href="../dados/dados.php">Voltar</a>
            </div>
            <h2>Alterar Dados pessoais</h2>
            <div>
                <div class="campo">
                    <label for="iddados">ID</label>
                    <input type="text" id="iddados" name="iddados" value="<?= $iddados ?>" readonly>
                </div>
                <div class="campo">
                    <label for="nome">Nome completo</label>
                    <input type="text" id="nome" name="nome" onkeyup="semnumero(this)" maxlength="80" value="<?= $nome ?>">
                </div>
                <div class="campo">
                    <label for="nomemae">Nome da mãe</label>
                    <input type="text" id="nomemae" name="nomemae" onkeyup="semnumero(this)" maxlength="80" value="<?= $nomemae ?>">
                </div>
                <div class="campo">
                    <label for="celular">Celular</label>
                    <input type="tel" id="celular" name="celular" onkeyup="ajustaCelular(this)" value="<?= $celular ?>">
                </div>
                <div class="campo">
                    <label for="telfixo">Telefone fixo</label>
                    <input type="tel" id="telfixo" name="telfixo" onkeyup="ajustaTelefone(this)" value="<?= $telfixo ?>">
                </div>
                <div class="campo">
                    <label for="cpf">CPF</label>
                    <input type="text" id="cpf" name="cpf" onblur="validarCPF(this)" onkeyup="ajustaCpf(this)" value="<?= $cpf ?>">
                </div>
                <div class="campo">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" value="<?= $email ?>">
                </div>
                <div class="campo">
                    <label for="datanasc">Data de nascimento</label>
                    <input type="date" id="datanasc" name="datanasc" value="<?= $datanasc ?>">
                </div>
                <div class="campo">
                    <p>Gênero:</p>
                    <select name="genero" id="genero">
                        <option value="<?= $genero ?>"><?= $genero ?></option>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                        <option value="Outro">Outro</option>
                    </select>
                </div>

                <h2>Alterar Endereço</h2>

                <div class="campo">
                    <label>CEP</label>
                    <input name="cep" type="text" id="cep" maxlength="9" value="<?= $cep ?>">
                </div>
                <div class="campo">
                    <label>Rua</label>
                    <input name="rua" type="text" id="rua" value="<?= $rua ?>">
                </div>
                <div class="campo">
                    <label>Número</label>
                    <input type="text" id="numero" name="numero" value="<?= $numero ?>">
                </div>
                <div class="campo">
                    <label>Bairro</label>
                    <input name="bairro" type="text" id="bairro" value="<?= $bairro ?>">
                </div>
                <div class="campo">
                    <label>Cidade</label>
                    <input name="cidade" type="text" id="cidade" value="<?= $cidade ?>">
                </div>
                <div class="campo">
                    <label>Estado</label>
                    <select name="estado" id="estado">
                        <option value="<?= $estado ?>"><?= $estado ?></option>
                        <option value="AC">Acre</option><option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option><option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option><option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option><option value="ES">Espírito Santo</option>
                        <option value="GO">Goiás</option><option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option><option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option><option value="PA">Pará</option>
                        <option value="PB">Paraíba</option><option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option><option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option><option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option><option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option><option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option><option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                    </select>
                </div>
                <div class="botaodiv">
                    <input class="botao" type="submit" name="update" id="update" value="Salvar Alterações">
                </div>
            </div>
        </form>
    </main>
</body>
</html>
