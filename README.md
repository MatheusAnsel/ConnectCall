<div align="center">

# Telecall / ConnectCall

**Aplicação corporativa de comunicação** — projeto acadêmico revisitado e submetido a uma auditoria completa de segurança.

[![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat-square&logo=php&logoColor=white)](#)
[![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=flat-square&logo=mysql&logoColor=white)](#)
[![AWS](https://img.shields.io/badge/AWS-232F3E?style=flat-square&logo=amazonaws&logoColor=white)](#)

</div>

---

## Sobre o projeto

O Telecall nasceu como projeto acadêmico (PHP + MySQL, comunicação empresarial: SMS programável, geração de PDF, cadastro/login). Meses depois, revisitei o código com outro olhar — o de quem já entende os riscos reais de uma aplicação web — e conduzi uma **auditoria e remediação completa de segurança**, documentada abaixo.

### O que foi encontrado e corrigido

| Vulnerabilidade encontrada | Correção aplicada |
|---|---|
| Consultas SQL montadas por concatenação de string | Migrado para **prepared statements** (mysqli) em todo o cadastro, login, edição e exclusão de dados |
| Senhas armazenadas em texto puro | Hash com **bcrypt** (`password_hash` / `password_verify`) |
| Credenciais de banco versionadas no código | Removidas do histórico; `config.php` documentado para uso de variáveis de ambiente em produção |
| Falhas de controle de sessão | Revisão do fluxo de login/logout e checagem de sessão nas páginas protegidas |
| Possível IDOR (acesso a registros de outros usuários via ID na URL) | Validação de propriedade do recurso antes de editar/excluir |

## Deploy

A aplicação foi publicada em ambiente cloud AWS (EC2 + Apache) para fins de demonstração:

**https://telecallpizzanet.s3.us-east-1.amazonaws.com/Pagina+principal/index.html**

> O deploy é mantido apenas para demonstração, por conta do custo recorrente da infraestrutura.

## Stack

**Backend:** PHP · **Banco:** MySQL · **Frontend:** HTML5, CSS3, JavaScript · **Cloud:** AWS EC2, Apache · **Libs:** DOMPDF

## Funcionalidades

- Cadastro e login de usuários (senha com hash bcrypt)
- Edição e exclusão de dados com verificação de propriedade do recurso
- Geração dinâmica de PDF (DOMPDF)
- Sistema de SMS programável
- Estrutura modular, separando páginas, PDF e SMS em módulos próprios

## Estrutura

```
BD/
 └── bdtelecall.sql        # schema do banco

Telas/
 ├── config.php            # conexão com o banco (env vars documentadas p/ produção)
 ├── Tela de login/
 ├── Tela de cadastro/
 ├── Editar/
 ├── PDF/
 ├── smsprogramavel/
 └── assets/
```

## Como executar localmente

```bash
git clone https://github.com/MatheusAnsel/ConnectCall.git
```

1. Instale **XAMPP** ou **Laragon**
2. Mova a pasta do projeto para `htdocs`
3. Abra o phpMyAdmin e importe `BD/bdtelecall.sql`
4. Ajuste `Telas/config.php` com as credenciais do seu banco local
5. Acesse `http://localhost/ConnectCall`

## Autor

**Matheus Ansel**

- GitHub: [@MatheusAnsel](https://github.com/MatheusAnsel)
- LinkedIn: [linkedin.com/in/matheusansel](https://linkedin.com/in/matheusansel)
