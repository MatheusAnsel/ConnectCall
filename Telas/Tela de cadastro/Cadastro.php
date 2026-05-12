<?php
session_start();

// Se já está logado, redireciona
if (!empty($_SESSION['usuario'])) {
    header('Location: ../Pagina principal/index.php');
    exit;
}

$erros = [];

if (isset($_POST['submit'])) {
    include_once('../config.php');

    $nome           = trim($_POST['nome']);
    $nomemae        = trim($_POST['nomemae']);
    $celular        = trim($_POST['cel']);
    $fixo           = trim($_POST['fixo']);
    $cpf            = trim($_POST['cpf']);
    $datanascimento = trim($_POST['datanascimento']);
    $genero         = trim($_POST['genero']);
    $cep            = trim($_POST['cep']);
    $rua            = trim($_POST['rua']);
    $num            = trim($_POST['num']);
    $bairro         = trim($_POST['bairro']);
    $cidade         = trim($_POST['cidade']);
    $estado         = trim($_POST['uf']);
    $email          = trim($_POST['email']);
    $usuario        = trim($_POST['login']);
    $senha          = $_POST['senha'];

    // Validações básicas
    if (empty($usuario) || empty($senha)) {
        $erros[] = "Usuário e senha são obrigatórios.";
    }
    if (strlen($senha) < 8) {
        $erros[] = "A senha deve ter no mínimo 8 caracteres.";
    }

    if (empty($erros)) {
        // Verifica se usuário já existe — prepared statement
        $stmtCheck = $conexao->prepare("SELECT idusuarios FROM usuarios WHERE usuario = ?");
        $stmtCheck->bind_param("s", $usuario);
        $stmtCheck->execute();
        $stmtCheck->store_result();

        if ($stmtCheck->num_rows > 0) {
            $erros[] = "Nome de usuário já está em uso. Escolha outro.";
        } else {
            // Hash da senha com bcrypt
            $senhaHash = password_hash($senha, PASSWORD_BCRYPT);

            // Insere usuário — prepared statement
            $stmtUser = $conexao->prepare(
                "INSERT INTO usuarios (usuario, senha, tipo) VALUES (?, ?, 0)"
            );
            $stmtUser->bind_param("ss", $usuario, $senhaHash);
            $stmtUser->execute();
            $novoIdUsuario = $conexao->insert_id;

            // Insere dados pessoais com FK do usuário — prepared statement
            $stmtDados = $conexao->prepare(
                "INSERT INTO dados (idusuarios, nome, nomemae, celular, telfixo, cpf, datanasc, genero, email, cep, rua, numero, bairro, cidade, estado)
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
            );
            $stmtDados->bind_param(
                "issssssssssssss",
                $novoIdUsuario, $nome, $nomemae, $celular, $fixo,
                $cpf, $datanascimento, $genero, $email,
                $cep, $rua, $num, $bairro, $cidade, $estado
            );
            $stmtDados->execute();

            // Login automático após cadastro
            session_regenerate_id(true);
            $_SESSION['usuario']    = $usuario;
            $_SESSION['tipo']       = 0;
            $_SESSION['idusuarios'] = $novoIdUsuario;
            header('Location: ../Pagina principal/index.php');
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="shortcut icon" href="img/icone.ico" type="image/x-icon">
   <title>Cadastro</title>
   <link rel="stylesheet" href="style.css">
</head>

<body>

   <main class="corpo">
      <div class="formulario">

         <?php if (!empty($erros)): ?>
           <div style="background:#ffeaea;border:1px solid #e63636;border-radius:8px;padding:10px 16px;margin-bottom:16px;color:#c0392b;font-size:14px;">
             <?php foreach ($erros as $e): ?>
               <p style="margin:4px 0;"><?= htmlspecialchars($e) ?></p>
             <?php endforeach; ?>
           </div>
         <?php endif; ?>

         <form name="form" id="form" action="Cadastro.php" method="POST">
            <div class="form-header">
               <h1>Cadastre-se</h1>
               <a href="../Pagina principal/index.php"> <img src="img/imagen.png"></a>
            </div>
            <h2>Dados pessoais</h2>
            <div class="inputgroup">
               <div class="inputbox">
                  <label for="nome">Nome completo</label>
                  <input type="text" id="nome" name="nome" placeholder="Digite seu nome completo"
                         onkeyup="semnumero(this)" minlength="15" maxlength="80" class="invalido"
                         value="<?= htmlspecialchars($_POST['nome'] ?? '') ?>">
                  <p class="error errorH" id="msgnome">Nome inválido — mínimo 15 letras</p>
               </div>
               <div class="inputbox">
                  <label for="nomemae">Nome da mãe</label>
                  <input type="text" id="nomemae" name="nomemae" placeholder="Digite nome da mãe"
                         onkeyup="semnumero(this)" minlength="15" maxlength="80"
                         value="<?= htmlspecialchars($_POST['nomemae'] ?? '') ?>">
                  <p class="error errorH" id="msgnomemae">Digite nome materno</p>
               </div>
               <div class="inputbox">
                  <label for="cel">Celular</label>
                  <input type="tel" id="cel" name="cel" title="Digite o Celular" maxlength="18"
                         placeholder="Ex.(55)21 99999-9999" onkeyup="ajustaCelular(this)"
                         value="<?= htmlspecialchars($_POST['cel'] ?? '') ?>">
                  <p class="error errorH" id="msgcel">Celular inválido</p>
               </div>
               <div class="inputbox">
                  <label for="fixo">Telefone fixo</label>
                  <input type="tel" id="fixo" name="fixo" maxlength="17"
                         placeholder="Ex.(55)21 9999-9999" onkeyup="ajustaTelefone(this)"
                         value="<?= htmlspecialchars($_POST['fixo'] ?? '') ?>">
                  <p class="error errorH" id="msgfixo">Telefone fixo inválido</p>
               </div>
               <div class="inputbox">
                  <label for="cpf">CPF</label>
                  <input type="text" id="cpf" name="cpf" onblur="validarCPF(this)"
                         onkeyup="ajustaCpf(this)" maxlength="14"
                         value="<?= htmlspecialchars($_POST['cpf'] ?? '') ?>">
                  <p class="error errorH" id="msgcpf">CPF inválido</p>
               </div>
               <div class="inputbox">
                  <label for="datanascimento">Data de nascimento</label>
                  <input type="date" id="datanascimento" name="datanascimento"
                         value="<?= htmlspecialchars($_POST['datanascimento'] ?? '') ?>">
               </div>
               <div class="inputbox">
                  <label for="genero">Gênero</label>
                  <select id="genero" name="genero">
                     <option value="">Selecione</option>
                     <option value="Masculino">Masculino</option>
                     <option value="Feminino">Feminino</option>
                     <option value="Outro">Outro</option>
                  </select>
               </div>
               <div class="inputbox">
                  <label for="email">E-mail</label>
                  <input type="email" id="email" name="email" maxlength="100"
                         value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                  <p class="error errorH" id="msgemail">E-mail inválido</p>
               </div>
            </div>

            <h2>Endereço</h2>
            <div class="inputgroup">
               <div class="inputbox">
                  <label for="cep">CEP</label>
                  <input type="text" id="cep" name="cep" maxlength="9" onkeyup="buscaCep(this)"
                         placeholder="00000-000"
                         value="<?= htmlspecialchars($_POST['cep'] ?? '') ?>">
               </div>
               <div class="inputbox">
                  <label for="rua">Rua</label>
                  <input type="text" id="rua" name="rua" maxlength="100"
                         value="<?= htmlspecialchars($_POST['rua'] ?? '') ?>">
               </div>
               <div class="inputbox">
                  <label for="num">Número</label>
                  <input type="text" id="num" name="num" maxlength="10"
                         value="<?= htmlspecialchars($_POST['num'] ?? '') ?>">
               </div>
               <div class="inputbox">
                  <label for="bairro">Bairro</label>
                  <input type="text" id="bairro" name="bairro" maxlength="60"
                         value="<?= htmlspecialchars($_POST['bairro'] ?? '') ?>">
               </div>
               <div class="inputbox">
                  <label for="cidade">Cidade</label>
                  <input type="text" id="cidade" name="cidade" maxlength="60"
                         value="<?= htmlspecialchars($_POST['cidade'] ?? '') ?>">
               </div>
               <div class="inputbox">
                  <label for="uf">Estado</label>
                  <select id="uf" name="uf">
                     <option value="">Selecione</option>
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
            </div>

            <h2>Acesso</h2>
            <div class="inputgroup">
               <div class="inputbox">
                  <label for="login">Nome de usuário</label>
                  <input type="text" id="login" name="login" maxlength="30" minlength="3"
                         placeholder="Mínimo 3 caracteres"
                         value="<?= htmlspecialchars($_POST['login'] ?? '') ?>">
               </div>
               <div class="inputbox">
                  <label for="senha">Senha</label>
                  <input type="password" id="senha" name="senha" maxlength="64" minlength="8"
                         placeholder="Mínimo 8 caracteres" autocomplete="new-password">
                  <p class="error errorH" id="msgsenha">Senha deve ter no mínimo 8 caracteres</p>
               </div>
               <div class="inputbox">
                  <label for="senha2">Confirmar senha</label>
                  <input type="password" id="senha2" name="senha2" maxlength="64"
                         placeholder="Repita a senha" autocomplete="new-password">
                  <p class="error errorH" id="msgsenha2">As senhas não coincidem</p>
               </div>
            </div>

            <div class="inputgroup">
               <input class="botao" type="submit" name="submit" value="Cadastrar">
            </div>
         </form>
      </div>
   </main>

   <?php include "../footer/footer.php"; ?>

   <script src="script.js"></script>
</body>

</html>
