<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="img/icone.ico" type="image/x-icon">
    <title>2FA</title>
</head>

<body>
    <?php
    include "../nav/nav.php"
    ?>

    <main class="main1">
        <h1>2FA</h1>


        <h2>Two-Factor Authentication</h2>
        <h3>Autenticação de dois fatores</h3>
        <section class="sessao">
            <div class="div1">
                <p>
                    O 2FA é um procedimento de segurança que garante que serão
                    necessários 2 fatores únicos para liberação de uma ação. O
                    primeiro fator é a senha que o usuário e o segundo pode ser
                    autenticado via token, via detecção de impressão digital,
                    reconhecimento facial, código enviado via sms, entre outros.
                </p>
            </div>
            <div class="div2">
                <img src="img/2faimg.png" alt="">
            </div>
            <ul>
                <h4>O 2FA permite que você:</h4>
                <li><strong>Envie</strong> uma senha via SMS, voz ou e-mail para autenticação do usuário.</li>
                <li><strong>Adicione</strong> uma camada extra de segurança além da senha pessoal.</li>
                <li><strong>Ofereça</strong> maior segurança para usuários</li>
            </ul>
        </section>


        <h1>2FA</h1>
        <section>

            <h2><strong>Fortaleça a estratégia de segurança de seu negócio.</strong></h2>
            <p>Adicionar um número de telefone de recuperação a uma
                conta individual pode bloquear até:</p>
            <strong class="azul">100%</strong> dos bots automatizados,<br>
            <strong class="azul">99%</strong> dos ataques de phishing em massa,<br>
            e <strong class="azul">66%</strong> dos ataques direcionados.
            <br>
            <br>

            <a href="https://security.googleblog.com/2019/05/new-research-how-effective-is-basic.html"> <em class="link"> *Fonte: Google Security Blog </em> </a>
        </section>



        <h1>Como funciona?</h1>
        <section class="sessao2">
            <div class="divlista">
                <img src="img/comofun1.png" alt="">
                <p>Usuário acessa seu site o
                    aplicativo e digita a senha
                    cadastrada para entrar em
                    seu perfil ou completar uma
                    transação.</p>
            </div>

            <div class="divlista">
                <img src="img/comofun2.png" alt="">
                <p>A Telecall recebe a tentativa
                    de login e solicita que o
                    usuário insira seu número de
                    telefone para autorizar o
                    acesso.</p>
            </div>

            <div class="divlista">
                <img src="img/comofun3.png" alt="">
                <p>Após inserir seu número, a
                    Telecall envia para o usuário
                    por SMS, chamada ou e-mail
                    um código PIN de uso único.
                    Esse código PIN é também
                    conhecido como OTP (One
                    Time Password).
                </p>
            </div>

            <div class="divlista">
                <img src="img/comofun4.png" alt="">
                <p>O usuário insere o código no
                    site ou aplicativo para
                    concluir o processo de
                    verificação.
                </p>
            </div>
        </section>


        <h1>Beneficios</h1>
        <section class="sessao">
            <ul>
                <li>Ofereça segurança aprimorada para seus clientes.</li>
                <li>Reduza casos de fraude e invasões e evite o acesso a dados por invasores.</li>
                <li>Envio de OTP por meio de vários canais, incluindo SMS, voz ou e-mail.</li>
                <li>Flexibilidade de canais garante que o usuário conseguirá completar a tarefa desejada
                    mesmo quando tiver problema com um deles. Exemplo: Enviar OTP por SMS, em caso de
                    falha, enviar OTP por chamada de voz, em caso de outra falha, enviar por e-mail.</li>
                <li>API simples e de rápida implementação.</li>
                <li>Plataforma intuitiva que permite visualizar relatórios de uso por dia, mês ou ano e
                    pesquisar usando diversos critérios de filtro.</li>
            </ul>
        </section>
        <h1>Quem usa?</h1>
        <section class="sessao2">

            <div>
                <img src="img/finanças.png" alt="">
                <h3>Finanças</h3>
                <ul>
                    <li> Acesso ao portal/app</li>
                    <li>Autenticação para transações bancárias</li>
                    <li>Pagamentos Online(PicPay, PayPal)</li>
                    <li>Digital Wallets (GooglePay, Apple Pay, Samsung Pay)</li>
                </ul>
            </div>

            <div>
                <img src="img/saude.png" alt="">
                <h3>Saúde</h3>
                <ul>
                    <li>Acesso ao portal/app</li>
                    <li>Agendamentos</li>
                    <li>Tokens de autorização</li>
                    <li>Telemedicina</li>
                </ul>
            </div>

            <div>
                <img src="img/turismo.png" alt="">
                <h3>Turismo</h3>
                <ul>
                    <li>Acesso ao portal/app </li>
                    <li>Gestão de Reservas</li>
                    <li>Acesso ao histórico</li>
                    <li>Salvar dados de pagamentos</li>
                    <li>Recuperação de Senha </li>
                </ul>
            </div>

            <div>
                <img src="img/varejo.png" alt="">
                <h3>Varejo</h3>
                <ul>
                    <li>Acesso ao portal/app</li>
                    <li>Salvar dados de pagamentos</li>
                    <li>Acesso ao histórico</li>
                    <li>Recuperação de Senha</li>
                    <li>Recibo Eletrônico</li>
                </ul>
            </div>

            <div>
                <img src="img/governo.png" alt="">
                <h3>Governo</h3>
                <ul>
                    <li>Acesso ao portal/app</li>
                    <li>Gestão de informações Agendamentos </li>
                    <li>Recuperação de Senha</li>
                </ul>
            </div>
        </section>
        <h1>Quem usa?</h1>

        <section>
            <img src="img/quemusa.png" alt="" class="exemplo">
        </section>


    </main>

    <?php
    include "../footer/footer.php"
    ?>

</body>

</html>