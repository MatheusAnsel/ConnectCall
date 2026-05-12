<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');



footer {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
  background-color: #31353B;
  padding: 50px 0;
}

.container-footer {
  max-width: 1400px;
  padding: 0 4%;
  margin: auto;
}

.row-footer {
  display: flex;
  flex-wrap: wrap;
}

.footer-col {
  width: 25%;
  padding: 0 15px;
}

.footer-col h4 {
  font-size: 22px;
  color: white;
  margin-bottom: 20px;
  font-weight: 500;
  position: relative;
  text-transform: uppercase;
}

.footer-col ul {
  list-style: none;
}

.footer-col ul li {
  margin: 10px 0;
}

.footer-col ul li a {
  font-size: 16px;
  text-transform: capitalize;
  color: white;
  text-decoration: none;
  font-weight: 300;
  display: block;
  transition: all 0.3s ease;
}

.footer-col ul li a:hover {
  color: #cecdcd;
  padding-left: 10px;
}

.footer-col .medias-socias {
  margin-top: 30px;
}

.footer-col .medias-socias a {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  height: 40px;
  width: 40px;
  margin: 0 10px 10px 0;
  text-decoration: none;
  border-radius: 50%;
  color: white;
  border: 1px solid white;
  transition: all 0.5s ease;
}

.footer-col .medias-socias a i {
  font-size: 20px;
}

.footer-col .medias-socias a:hover {
  color: #0a9fdf;
  background-color: white;
}

.footer-col .form-sub input {
  width: 100%;
  padding: 10px;
  font-size: 15px;
  outline: none;
  border: 1px solid white;
  color: white;
  background-color: #0b1b2231;

}

.footer-col .form-sub input::placeholder {
  color: white;
}

.footer-col .form-sub button {
  width: 100%;
  margin-top: 10px;
  padding: 10px;
  font-size: 17px;
  outline: none;
  border: none;
  cursor: pointer;
  color: white;
  border-radius: 3px;
  font-weight: bold;
  background-color: #0a9fdf;
}

/* Responsivo */
@media (max-width: 800px) {
  .footer-col {
    width: 50%;
    margin-bottom: 30px;
  }

}

@media (max-width:600px) {
  .footer-col {
    width: 100%;
  }
}
</style>






<body>
    <footer>
        <div class="container-footer">
          <div class="row-footer">
            <div class="footer-col">
              <h4>Empresa</h4>
              <ul>
                <li><a href="https://telecall.com/institucional/" target="_blank"> Quem somos </a></li>
                <li><a href="https://telecall.com/vendas/" target="_blank"> nossos serviços </a></li>
                <li><a href="https://telecall.com/politica-e-privacidade/" target="_blank"> política de privacidade </a>
                </li>
                <li><a href="https://carreirastelecall.solides.jobs/" target="_blank"> Carreiras</a></li>
              </ul>
            </div>
            <div class="footer-col">
              <h4>Obter ajuda</h4>
              <ul>
                <li><a href="https://telecall.com/faq/" target="_blank">FAQ</a></li>
                <li><a href="https://telecall.com/contato/" target="_blank">contatos</a></li>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
    crossorigin="anonymous"></script>


</body>
</html>