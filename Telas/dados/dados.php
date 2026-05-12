<?php
session_start();

// Apenas admin (tipo != 0) pode ver esta página
if (empty($_SESSION['idusuarios']) || empty($_SESSION['tipo'])) {
    header('Location: ../Tela de login/login.php');
    exit;
}

include_once('../config.php');

// Busca com prepared statement para evitar SQL Injection
if (!empty($_GET['search'])) {
    $busca = '%' . trim($_GET['search']) . '%';
    $stmt = $conexao->prepare("SELECT * FROM dados WHERE nome LIKE ? ORDER BY iddados DESC");
    $stmt->bind_param("s", $busca);
} else {
    $stmt = $conexao->prepare("SELECT * FROM dados ORDER BY iddados DESC");
}
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dados do Usuário</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/icone.ico" type="image/x-icon">
</head>

<style>
   .campo {
    display: flex;
    justify-content: center;
    margin: 20px;
}
.campo input {
    border: white;
    margin: 0.6rem 0;
    padding: 0.8rem 1.2rem;
    border-radius: 10px;
    box-shadow: 1px 1px 10px #000000c1;
}
.campo input:hover {
    background-color: #eeeeee75;
    transform: scale(1.1)
}
.campo input:focus-visible {
    outline: 3px solid #0170B9;
}
.campo button{
    border: 0;
    width: 50px;
    height: 50px;
    margin: 5px 5px 5px 15px;
    border-radius: 4px;
    font-weight: 900;
    background: linear-gradient(135deg, #2676EF, #40A9F4);
    cursor: pointer;
}
.campo button:hover{
    transform: scale(1.1);
    color: #003b71;
}
.campo img { width: 25px; }
.pdf img { width: 45px; }
</style>

<body>
    <main>
    <?php include "../nav/nav.php"; ?>
        <h1 class="pdf">Dados pessoais <a href="../PDF/pdf.php"><img src="img/baixar-pdf.png" alt="Baixar PDF"></a></h1>
        <div class="campo">
            <input type="search" name="pesquisar" id="pesquisar"
                   placeholder="Pesquisar"
                   value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
            <button onclick="searchData()"><img src="img/pesquisar-alt.png" alt="Pesquisar"></button>
        </div>

        <table>
            <tr class="titulo">
                <td>ID</td>
                <td>Nome</td>
                <td>Nome materno</td>
                <td>Celular</td>
                <td>Telefone Fixo</td>
                <td>CPF</td>
                <td>Data de nascimento</td>
                <td>Gênero</td>
                <td>Email</td>
                <td>CEP</td>
                <td>Rua</td>
                <td>Número</td>
                <td>Bairro</td>
                <td>Cidade</td>
                <td>Estado</td>
                <td>Editar/Deletar</td>
            </tr>

            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['iddados']) ?></td>
                <td><?= htmlspecialchars($row['nome']) ?></td>
                <td><?= htmlspecialchars($row['nomemae']) ?></td>
                <td><?= htmlspecialchars($row['celular']) ?></td>
                <td><?= htmlspecialchars($row['telfixo']) ?></td>
                <td><?= htmlspecialchars($row['cpf']) ?></td>
                <td><?= htmlspecialchars($row['datanasc']) ?></td>
                <td><?= htmlspecialchars($row['genero']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= htmlspecialchars($row['cep']) ?></td>
                <td><?= htmlspecialchars($row['rua']) ?></td>
                <td><?= htmlspecialchars($row['numero']) ?></td>
                <td><?= htmlspecialchars($row['bairro']) ?></td>
                <td><?= htmlspecialchars($row['cidade']) ?></td>
                <td><?= htmlspecialchars($row['estado']) ?></td>
                <td>
                    <a href="../Editar/editdados.php?iddados=<?= $row['iddados'] ?>">
                        <img src="img/editar.png" alt="Editar" style="width:25px;margin:5px;">
                    </a>
                    <a href="../Editar/delete.php?iddados=<?= $row['iddados'] ?>"
                       onclick="return confirm('Confirmar exclusão?')">
                        <img src="img/excluir.png" alt="Excluir" style="width:25px;margin:5px;">
                    </a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </main>
</body>

<script>
  var search = document.getElementById('pesquisar');
  function searchData() {
    window.location = 'dados.php?search=' + encodeURIComponent(search.value);
  }
</script>

</html>
