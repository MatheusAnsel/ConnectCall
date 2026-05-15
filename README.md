# Telecall Project

Aplicação web corporativa desenvolvida para demonstração de serviços de comunicação empresarial e integração digital, utilizando PHP, MySQL e arquitetura web modular.

O projeto foi desenvolvido com foco em organização estrutural, integração backend/frontend, manipulação de dados e deploy em ambiente cloud AWS.

---

# Deploy

A aplicação encontra-se publicada em ambiente cloud utilizando serviços da AWS.

O projeto foi publicado anteriormente em infraestrutura cloud da AWS para fins de demonstração e testes.

## Acesso ao Projeto
https://telecallpizzanet.s3.us-east-1.amazonaws.com/Pagina+principal/index.html

> Observação: o deploy na AWS está mantido apenas para demonstração, devido aos custos recorrentes da infraestrutura cobrados em dólar.

## Infraestrutura Utilizada

- AWS EC2
- Apache
- PHP
- MySQL
  
---

# Tecnologias Utilizadas

## Backend
- PHP

## Frontend
- HTML5
- CSS3
- JavaScript

## Banco de Dados
- MySQL
- SQL

## Cloud & Deploy
- AWS EC2
- Apache Server
- Linux

## Bibliotecas
- DOMPDF

## Ferramentas
- Git
- GitHub

---

# Funcionalidades

- Sistema web institucional
- Navegação dinâmica entre páginas
- Integração com banco de dados
- Sistema de SMS programável
- Geração dinâmica de PDF
- Estrutura modular em PHP
- Organização de assets e páginas
- Deploy em infraestrutura cloud

---

# Arquitetura do Projeto

```bash
BD/
 └── bdtelecall.sql

Telas/
 ├── PDF/
 ├── smsprogramavel/
 ├── assets/
 └── paginas/
```

---

# Estrutura Técnica

O projeto foi estruturado utilizando separação modular de responsabilidades, permitindo:

- Escalabilidade
- Melhor manutenção
- Organização de componentes
- Separação entre backend e frontend
- Facilidade de deploy e atualização

---

# Como Executar Localmente

## 1. Clone o repositório

```bash
git clone https://github.com/seuusuario/telecall.git
```

---

## 2. Configure ambiente local

Instale:

- XAMPP
ou
- Laragon

---

## 3. Configure o projeto

Mova a pasta para:

```bash
htdocs
```

---

## 4. Configure o banco de dados

Abra o:

```bash
phpMyAdmin
```

Importe:

```bash
BD/bdtelecall.sql
```

---

## 5. Execute

```bash
http://localhost/telecall
```

---

# Diferenciais Técnicos

- Deploy realizado na AWS
- Estrutura modular em PHP
- Integração MySQL
- Sistema web funcional
- Manipulação dinâmica de PDFs
- Organização escalável de arquivos
- Aplicação preparada para ambiente cloud



# Segurança

Boas práticas recomendadas para produção:

- Variáveis de ambiente `.env`
- Proteção contra SQL Injection
- HTTPS
- Validação de entradas
- Controle de autenticação
- Backup automatizado

---

# Autor

Matheus Ansel 

- GitHub: https://github.com/MatheusAnsel
- LinkedIn: https://linkedin.com/in/MatheusAnsel

