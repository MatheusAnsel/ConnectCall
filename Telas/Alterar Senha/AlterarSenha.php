<?php
session_start();

if (empty($_SESSION['idusuarios'])) {
    header('Location: ../Tela de login/login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style.css" />
  <link rel="shortcut icon" href="img/icone.ico" type="image/x-icon">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <title>Alterar senha</title>
</head>

<style>
  .error { color: #e63636; font-size: 14px; margin: 0; }
  .errorH { display: none; }
</style>

<body>

  <?php include "../nav/nav.php"; ?>

  <main class="login">
    <form class="container" action="salvarsenha.php" id="form" method="POST">
      <img src="img/download.png">
      <h1>Altere sua senha</h1>

      <?php if (!empty($_GET['erro'])): ?>
        <?php $msg = $_GET['erro'] === 'curta' ? 'A senha deve ter no mínimo 8 caracteres.' : 'As senhas não coincidem.'; ?>
        <p style="color:#e63636;font-size:14px;text-align:center;"><?= htmlspecialchars($msg) ?></p>
      <?php endif; ?>

      <div class="form">
        <label class="label-password" for="senha">Nova senha</label>
        <i class="bx bxs-key"></i>
        <input class="input-password" type="password" id="senha" name="senha"
               placeholder="Mínimo 8 caracteres:" maxlength="64" minlength="8" required
               autocomplete="new-password">

        <label class="label-password" for="senha2">Digite novamente</label>
        <i class="bx bxs-key"></i>
        <input class="input-password" type="password" id="senha2" name="senha2"
               placeholder="Repita a senha:" maxlength="64" required autocomplete="new-password">
        <p class="error errorH" id="msgsenha2">As senhas devem ser iguais</p>

        <input type="checkbox" onclick="Mostrarsenha()"> Mostrar senha

        <input class="button" type="submit" name="update" id="update" value="Mudar">
        <input class="button" type="reset" value="Limpar">
      </div>
    </form>
  </main>

  <?php include "../footer/footer.php"; ?>

  <script>
    const formulario = document.getElementById("form");
    const campoSenha  = document.getElementById("senha");
    const campoSenha2 = document.getElementById("senha2");

    formulario.onsubmit = e => {
      if (campoSenha2.value !== campoSenha.value) {
        e.preventDefault();
        campoSenha2.focus();
        campoSenha2.style.border = "5px solid red";
        document.getElementById("msgsenha2").classList.remove("errorH");
      }
    };

    campoSenha2.addEventListener("input", () => {
      campoSenha2.style.border = "";
      document.getElementById("msgsenha2").classList.add("errorH");
    });

    function Mostrarsenha() {
      const tipo = campoSenha.type === "password" ? "text" : "password";
      campoSenha.type  = tipo;
      campoSenha2.type = tipo;
    }
  </script>

</body>
</html>
