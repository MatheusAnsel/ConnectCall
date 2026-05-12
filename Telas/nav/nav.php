<?php
// Inicia sessão apenas se ainda não foi iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<style>
  /*nav*/
  header a { color: #fff; text-decoration: none; transition: 0.3s; }
  a:hover { opacity: 0.7; }
  .logo { text-transform: uppercase; }
  nav {
    display: flex; justify-content: space-between; align-items: center;
    font-family: system-ui, -apple-system, Helvetica, Arial, sans-serif;
    background: rgb(255,255,255);
    background: linear-gradient(90deg, rgba(255,255,255,1) 10%, rgba(0,59,113,1) 35%, rgba(202,28,42,1) 100%);
    height: 11vh;
  }
  .dark-mode nav {
    background: linear-gradient(90deg, rgba(255,255,255,1) 18%, rgba(48,48,48,1) 51%, rgba(48,48,48,1) 100%);
  }
  .nav-list { list-style: none; display: flex; }
  .nav-list li { letter-spacing: 3px; margin-left: 25px; margin-top: 25px; }
  .mobile-menu { display: none; cursor: pointer; }
  .mobile-menu div { width: 32px; height: 2px; background: #fff; margin: 8px; transition: 0.3s; }
  @media (max-width: 999px) {
    body { overflow-x: hidden; }
    .nav-list {
      position: absolute; top: 8vh; right: 0; width: 50vw; height: 92vh;
      background: linear-gradient(0deg, rgba(0,59,113,1) 0%, rgba(202,28,42,1) 100%);
      flex-direction: column; align-items: center; justify-content: space-around;
      transform: translateX(100%); transition: transform 0.3s ease-in; z-index: 1;
    }
    .nav-list li { margin-left: 0; opacity: 0; }
    .mobile-menu { display: block; }
  }
  .nav-list.active { transform: translateX(0); }
  @keyframes navLinkFade {
    from { opacity: 0; transform: translateX(50px); }
    to   { opacity: 1; transform: translateX(0); }
  }
  .dropdown-menu { display: inline-block; color: #fff; text-decoration: none; padding: 15px; }
  .dropdown-menu {
    position: absolute; box-shadow: 0 0 2px #fff; display: none;
    background: linear-gradient(90deg, rgba(0,59,113,0.85) 27%, rgba(202,28,42,0.85) 100%);
  }
  .dropdown-menu a { color: white; text-decoration: none; flex-direction: column; font-size: 75%; }
  .dropdown:hover .dropdown-menu { display: block; }
  .logo img { width: 300px; height: 78px; }
  .nvcadastrar {
    font-family: sans-serif; height: 40px; width: 40px; padding: 10px 10px;
    color: white; text-decoration: none; font-weight: bold;
    background: radial-gradient(circle, rgba(202,28,42,1) 0%, rgba(0,59,113,1) 100%);
    border-radius: 5px; text-align: center; box-shadow: 0px 0px 2px rgb(46,46,46); font-size: 70%;
  }
  .nvcadastrar:hover { background: #fff; color: #050505; border-color: #0a9fdf; transform: scale(1.1); }
  .navbtn {
    font-family: sans-serif; height: 40px; width: 40px; padding: 7px 7px;
    color: white; text-decoration: none; font-weight: bold;
    background: #003b71; border-radius: 30px; text-align: center;
    box-shadow: 0px 0px 2px rgb(46,46,46); font-size: 70%;
  }
  .navbtn:hover { background: white; color: #0a0a0a; transform: scale(1.1); }
  @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
  body {
    --text-light: rgba(243,244,246,0.9); --primary-dark: rgb(0,0,0);
    --secondary-dark: rgba(55,65,81,0.7); --bg-light: rgba(243,244,246,0.3);
    --bg-btn: rgba(67,56,202,0.8);
    background-color: var(--text-light);
  }
  body.dark {
    --text-light: rgba(55,65,81,1); --primary-dark: rgb(255,255,255);
    --secondary-dark: rgba(243,244,246,0.3); --bg-btn: rgba(219,233,29,0.897);
    --bg-light: rgba(45,49,54,0.5);
  }
  input[type="checkbox"] {
    -webkit-appearance: none; position: relative; width: 40px; height: 20px;
    border-radius: 30px; outline: none; background-color: rgb(99,99,99); cursor: pointer;
  }
  input[type="checkbox"]::before {
    content: ""; position: absolute; top: 0; left: 0; height: 20px; width: 20px;
    background-color: var(--primary-dark); border-radius: 30px;
  }
  input[type="checkbox"]:checked:before { transform: translate(100%); }
  .dark-mode main { background-color: #303030; color: white; }
  .dark-mode a.btn { color: white; background: rgba(0,59,113,1); border-radius: 10px; margin: 9px; box-shadow: 0px 0px 5px rgba(206,206,206,0.692); }
  .dark-mode #darkbo { background-color: #303030; }
  .dark-mode h1 { color: #0a9fdf; }
  .dark-mode section { background-color: #303030; }
</style>

<script>
  class MobileNavbar {
    constructor(mobileMenu, navList, navLinks) {
      this.mobileMenu = document.querySelector(mobileMenu);
      this.navList    = document.querySelector(navList);
      this.navLinks   = document.querySelectorAll(navLinks);
      this.activeClass = "active";
      this.handleClick = this.handleClick.bind(this);
    }
    animateLinks() {
      this.navLinks.forEach((link, index) => {
        link.style.animation
          ? (link.style.animation = "")
          : (link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.3}s`);
      });
    }
    handleClick() {
      this.navList.classList.toggle(this.activeClass);
      this.mobileMenu.classList.toggle(this.activeClass);
      this.animateLinks();
    }
    addClickEvent() { this.mobileMenu.addEventListener("click", this.handleClick); }
    init() { if (this.mobileMenu) { this.addClickEvent(); } return this; }
  }
  const mobileNavbar = new MobileNavbar(".mobile-menu", ".nav-list", ".nav-list li");
  mobileNavbar.init();

  let toggle = document.getElementById("mode");
  if (toggle) {
    toggle.addEventListener('click', () => { document.body.classList.toggle('dark'); });
  }
  function myFunction() {
    document.body.classList.toggle("dark-mode");
  }
</script>

<header>
  <nav>
    <label class="logo">
      <a href="../Pagina principal/index.php">
        <img src="../img//img-navbar.png" id="logocall">
      </a>
    </label>
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
        <div class="grid"><div class="item bg-light"><div class="flex">
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
