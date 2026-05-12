<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Site Oficial - Telecall - Internet, Telefonia, Celular e muito mais </title>
  <link rel="shortcut icon" href="img/icone.ico" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
  <header>
    <nav>
      <label class="logo"><a href=""><img src="img/img-navbar.png" id="logocall"></a></label>
      <div class="mobile-menu">
        <div class="line1"></div>
        <div class="line2"></div>
        <div class="line3"></div>
      </div>
      <ul class="nav-list">
        <li class="dropdown"><a href="#">Internet</a>
          <div class="dropdown-menu">
            <a href="">Internet dedicada</a>
            <a href="">Banda larga</a>
            <a href="">Wi-fi</a>
          </div>
        </li>
        <li class="dropdown"><a href="#">Telefonia</a>
          <div class="dropdown-menu">
            <a href="">PABX IP Virtual</a>
            <a href="">E1/SIP TRUNK</a>
            <a href="">Número 0800 e 40 xx</a>
          </div>
        </li>
        <li class="dropdown"><a href="#">Redes</a>
          <div class="dropdown-menu">
            <a href="">Ponto-a-ponto</a>
            <a href="">MPLS</a>
            <a href="">Fibra apagada e dutos</a>
            <a href="">Co-locations</a>
          </div>
        </li>
        <li class="dropdown"><a href="#">Mobilidade</a>
          <div class="dropdown-menu">
            <a href="">Celular empresarial</a>
            <a href="">NVNA/E</a>
          </div>
        </li>
        <li class="darkmode"><input onclick="myFunction()" type="checkbox" id="mode">
          <div class="grid">
            <div class="item bg-light">
              <div class="flex">
        </li>

        <?php
        if (!empty($_SESSION['tipo'])) {
          echo " <li> <a href='../dados/dados.php' target='_blank'>Consulta de dados (master)</a> </li>";
        }
        if (isset($_SESSION['usuario'])) {
          echo " <li class='dropdown'><a href='#'>Olá, " . htmlspecialchars($_SESSION['usuario']) . "</a>
             <div class='dropdown-menu'>
             <a href='../Alterar Senha/AlterarSenha.php'>Alterar Senha</a>
             <a href='../modelo do bd/banco.php'>Modelo do BD</a>
            </div>
             </li>";
          echo "<li> <a href='../sair.php' class='nvcadastrar'>Sair</a> </li>";
        } else {
          echo "<li><a href='../Tela de login/login.php' class='navbtn'>Entrar</a></li>";
          echo "<li><a href='../Tela de cadastro/Cadastro.php' class='nvcadastrar'>Cadastrar</a></li>";
        }
        ?>

      </ul>
    </nav>
  </header>

  <main>
    <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/dudu1.png" class="d-block w-100">
        </div>
        <div class="carousel-item">
          <img src="img/dudu2.png" class="d-block w-100">
        </div>
        <div class="carousel-item">
          <img src="img/dudu3.png" class="d-block w-100">
        </div>
        <div class="carousel-item">
          <img src="img/dudu4.png" class="d-block w-100">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <br>
    <div class="CardContainer" id="darkbo">
      <div class="tab-container" id="darkbo">
        <div class="tab-filter-container" id="darkbo">
          <li class="filter-btn active" data-tab="web-design"> internet </li>
          <li class="filter-btn" data-tab="web-development">Telefonia</li>
          <li class="filter-btn" data-tab="ux-design">Mobilidade</li>
        </div>
        <div class="tab-filter-item-container" id="darkbo">
          <div class="tab-item web-design select_tab" id="darkbo">
            <div class="tab-content-left" id="darkbo">
              <ul>
                <li type="none"> <img src="img/icone-atendimento-diferenciado-1.png" class="imglista"> ATENDIMENTO DIFERENCIADO </li>
              </ul>
            </div>
            <div class="tab-content-right" id="darkbo">
              <h1 class="tab-heading">internet</h1>
              <p class="paragraph">Solução de internet em Fibra com alta qualidade e disponibilidade.</p>
            </div>
          </div>
          <div class="tab-item web-development" id="darkbo">
            <div class="tab-content-left" id="darkbo">
              <h1 class="tab-heading">Telefonia</h1>
              <p class="paragraph">Solução inteligente de PABX IP na nuvem para sua telefonia fixa.</p>
            </div>
            <div class="tab-content-right" id="darkbo">
              <ul>
                <li type="none"> <img src="img/prancheta.png" class="imglista"> PLANOS CUSTOMIZÁVEIS</li>
                <li type="none"> <img src="img/icone-traga-seu-celular-e-aparelho.png" class="imglista"> TRAGA SEU NÚMERO E APARELHO</li>
                <li type="none"> <img src="img/icone-receba-seu-chip-na-sua-empresa.png" class="imglista"> RECEBA SEU CHIP NA SUA EMPRESA</li>
                <li type="none"> <img src="img/brasil.png" class="imglista"> MAIOR REDE MÓVEL DO BRASIL</li>
              </ul>
            </div>
          </div>
          <div class="tab-item ux-design" id="darkbo">
            <div class="tab-content-left">
              <img src="img/Planos-de-celular-empresarial.png" class="tab-img" />
            </div>
            <div class="tab-content-right" id="darkbo">
              <h1 class="tab-heading">Mobilidade</h1>
              <p class="paragraph">Monte planos de celular personalizados para a sua empresa e pague apenas pelo que precisa.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <h1 class="textoh1center">Soluções</h1>
    <section class="solucoes">
      <div class="solucoesimg"> <a href="#2fa"> <img src="img/2faA.png"> </a> <br> 2FA</div>
      <div class="solucoesimg"> <a href="#nummasc"> <img src="img/nummasc.png"> </a> <br> Número Máscara</div>
      <div class="solucoesimg"> <a href="#gvc"> <img src="img/GVC.png"> </a> <br> Google Verified Calls</div>
      <div class="solucoesimg"> <a href="#smspro"> <img src="img/smspro.png"> </a> <br> SMS Programável</div>
    </section>
    <br><br><br>
    <section class="container">
      <div class="divtex">
        <h1 class="textoh1">Quem somos</h1>
        <p>
          A Telecall é uma operadora de telecomunicações brasileira que oferece a seus clientes o mais alto padrão de
          qualidade, velocidade e acessibilidade em soluções de comunicação. Serviços que incluem uma ampla gama de valores
          agregados, oferecendo aos clientes operações mais produtivas, inovadoras e eficazes.
          Com mais de 20 anos de experiência na indústria global, a Telecall hoje é sinônimo de qualidade e eficiência.
        </p>
      </div>
      <div class="divtex">
        <h4>Vantagens Telecall</h4>
        <li type="none"><strong>Confiança</strong> Empresa que já conhecem e confiam.</li>
        <li type="none"><strong>Agilidade</strong> Aplicativos de rápida implementação.</li>
        <li type="none"><strong>Garantia de Rede</strong> Rede própria de alta capacidade e controle total de ponta-a-ponta.</li>
        <li type="none"><strong>Suporte ao Cliente</strong> Representantes locais de vendas e suporte.</li>
        <li type="none"><strong>Preço</strong> Melhor custo benefício para um conjunto completo de recursos e serviços.</li>
      </div>
    </section>

    <section>
      <h1 class="textoh1">Presença em todo Rio de Janeiro...</h1>
      <img src="img/mapa-fibra-rj.png" class="imgrio">
    </section>
    <br>
    <section class="container">
      <div class="divtex">
        <h1 class="textoh1" id="cpaas">CPaaS: O que é?</h1>
        <p>
        <h4>Communications Platform as a Service</h4>
        <h5>Plataforma de Comunicação como Serviço</h5>
        É uma solução de software de comunicação que atua como uma base sobre a qual desenvolvedores podem
        integrar uma variedade de aplicativos.
        </p>
        <a href="../cpaas/cpaas.php" class="btn" target="_blank">Saiba Mais</a>
      </div>
      <div>
        <img src="img/cpaasimg.jpeg" width="500px">
      </div>
    </section>
    <br>
    <section class="container" id="2fa">
      <div class="divtex">
        <h1>2FA</h1>
        <h4>Two-Factor Authentication</h4>
        <h5>Autenticação de dois fatores</h5>
        <p>O 2FA é um procedimento de segurança que garante que serão necessários 2 fatores únicos para liberação de uma ação.</p>
        <a href="../2fa/2fa.php" class="btn" target="_blank">Saiba Mais</a>
      </div>
      <div>
        <img src="img/2fa.png">
      </div>
    </section>
    <br>
    <section class="container" id="nummasc">
      <div class="divtex">
        <h1 class="textoh1">Número Máscara</h1>
        <h5>Proteja identidades profissionais</h5>
        <p>Garanta aos seus clientes a capacidade de fazer chamadas e enviar mensagens sem expor seus números de telefone pessoais.</p>
        <a href="../numeromascara/num.php" class="btn" target="_blank">Saiba Mais</a>
      </div>
      <div>
        <img src="img/mascara.png">
      </div>
    </section>
    <section class="container" id="gvc">
      <div class="divtex">
        <h1 class="textoh1">Google Verified Calls</h1>
        <h5>Chamadas verificadas.</h5>
        <p>Esse novo recurso do Google, exclusivo para telefones Android, permite que empresas exibam para o cliente na hora da chamada sua marca, logotipo e até mesmo o motivo da chamada.</p>
        <a href="../gvc/gvc.php" class="btn" target="_blank">Saiba Mais</a>
      </div>
      <div>
        <img src="img/vericall2.png">
      </div>
    </section>
    <section class="container" id="smspro">
      <div class="divtex">
        <h1 class="textoh1">SMS PROGRAMÁVEL</h1>
        <h5>Conecte-se com seus clientes.</h5>
        <p>Com uma API, qualquer empresa pode enviar mensagens de texto e impactar clientes, prospects ou fornecedores como parte de seu processo comercial.</p>
        <a href="../smsprogramavel/sms.php" class="btn" target="_blank">Saiba Mais</a>
      </div>
      <div class="coluna">
        <img src="img/smsprogramavel.png">
      </div>
    </section>
  </main>

  <footer>
    <div class="container-footer">
      <div class="row-footer">
        <div class="footer-col">
          <h4>Empresa</h4>
          <ul>
            <li><a href="https://telecall.com/institucional/" target="_blank"> Quem somos </a></li>
            <li><a href="https://telecall.com/vendas/" target="_blank"> Nossos serviços </a></li>
            <li><a href="https://telecall.com/politica-e-privacidade/" target="_blank"> Política de privacidade </a></li>
            <li><a href="https://carreirastelecall.solides.jobs/" target="_blank"> Carreiras</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Obter ajuda</h4>
          <ul>
            <li><a href="https://telecall.com/faq/" target="_blank">FAQ</a></li>
            <li><a href="https://telecall.com/contato/" target="_blank">Contatos</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Internet</h4>
          <ul>
            <li><a href="https://telecall.com/internet-dedicada/" target="_blank">Link dedicado</a></li>
            <li><a href="https://telecall.com/banda-larga/" target="_blank">Banda larga</a></li>
            <li><a href="https://telecall.com/wi-fi-e-hotspot/" target="_blank">Wi-fi</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Digite seu email para receber promoções</h4>
          <div class="form-sub">
            <form>
              <input type="email" placeholder="Digite o seu e-mail" required>
              <button>Enviar</button>
            </form>
          </div>
          <div class="medias-socias">
            <a href="https://www.facebook.com/TelecallBr" target="_blank"> <i class="fa fa-facebook"></i> </a>
            <a href="https://www.instagram.com/telecallbr/" target="_blank"> <i class="fa fa-instagram"></i> </a>
            <a href="https://www.linkedin.com/company/telecall/" target="_blank"> <i class="fa fa-linkedin"></i> </a>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script src="script.js"></script>
</body>

</html>
