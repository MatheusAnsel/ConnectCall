<div align="center">

# Telecall / ConnectCall

**Aplicação corporativa de comunicação** — projeto acadêmico revisitado e submetido a uma auditoria completa de segurança.

[![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat-square&logo=php&logoColor=white)](#)
[![MySQL](https://img.shields.io/badge/MySQL-4479A1?style=flat-square&logo=mysql&logoColor=white)](#)
[![AWS](https://img.shields.io/badge/AWS-232F3E?style=flat-square&logo=amazonaws&logoColor=white)](#)
[![CI](https://github.com/MatheusAnsel/ConnectCall/actions/workflows/ci.yml/badge.svg)](https://github.com/MatheusAnsel/ConnectCall/actions/workflows/ci.yml)

</div>

---

## Sobre o projeto

O Telecall nasceu como projeto acadêmico em grupo (PHP + MySQL, comunicação empresarial: SMS programável, geração de PDF, cadastro/login). Meses depois, revisitei o código sozinho, já com outro olhar — o de quem entende os riscos reais de uma aplicação web — e conduzi uma **auditoria e remediação completa de segurança**, documentada abaixo.

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
 ├── PDF/                  # geração de PDF (dependências via Composer em PDF/dompdf)
 ├── smsprogramavel/
 └── assets/
```

## Como executar localmente

```bash
git clone https://github.com/MatheusAnsel/ConnectCall.git
```

1. Instale **XAMPP** ou **Laragon**
2. Mova a pasta do projeto para `htdocs`
3. Instale as dependências do PDF (requer [Composer](https://getcomposer.org)):
   ```bash
   cd Telas/PDF/dompdf && composer install
   ```
4. Abra o phpMyAdmin e importe `BD/bdtelecall.sql`
5. Ajuste `Telas/config.php` com as credenciais do seu banco local
6. Acesse `http://localhost/ConnectCall`

## Verificação automática (CI)

O workflow em `.github/workflows/ci.yml` roda a cada push e pull request e protege o que a auditoria corrigiu:

- **Sintaxe** de todos os arquivos PHP próprios (o dompdf, de terceiros, fica de fora).
- **Nenhum SQL montado por concatenação**: a build falha se aparecer `query()` direta ou uma consulta com variável interpolada. Toda consulta deve usar `prepare()` com parâmetros.
- **Nenhuma credencial no repositório**: falha se um `.env` for versionado ou se a senha do banco for escrita em `Telas/config.php`.
- **O dump do banco** (`BD/bdtelecall.sql`) importa em um MariaDB limpo e cria as tabelas `dados` e `usuarios`, com a coluna da senha grande o bastante para um hash.
- **Fumaça**: as telas de login, cadastro e página principal respondem 200 no servidor embutido do PHP.

O projeto não tem testes automatizados de comportamento (login, cadastro e edição ainda não são exercitados de ponta a ponta).

## Autor

**Matheus Ansel**

- GitHub: [@MatheusAnsel](https://github.com/MatheusAnsel)
- LinkedIn: [linkedin.com/in/matheusansel](https://linkedin.com/in/matheusansel)
