# 📌 Desafio Técnico Spassu

### 📚 Sistema de Cadastro de Livros
Aplicação web desenvolvida em **CodeIgniter 4** para gerenciamento de livros.  
Permite cadastrar, editar, listar e excluir livros de forma simples e organizada.  


---

## 🚀 Tecnologias Utilizadas

- CodeIgniter 4 
- PHP >= 7.4 (ou 8.x)  
- Composer  
- Banco de dados: MySQL
- jQuery
- Bootstrap

---

## 📂 Estrutura do Projeto

```bash
app/                # Código principal da aplicação
public/             # Pasta pública (raiz do servidor)
writable/           # Logs, cache, uploads e arquivos graváveis
env                 # Exemplo de variáveis de ambiente
composer.json       # Dependências do Composer
script_banco.sql    # Script de criação do banco de dados em MySQL/MariaDB
```

## 📃 Preparação para rodar o projeto
Antes de iniciar, você precisa ter instalado em sua máquina:
- PHP (>= 7.4 ou 8.x)
- Composer
- Servidor web (Apache / Nginx)
- Banco de dados (MySQL/MariaDB)

## 🔧 Instalação
- Clone o repositório:
```
git clone https://github.com/ebersc/cadastro_livros
cd cadastro_livros
```
- Instale as dependências:
```code
composer install
```
- Renomeie o arquivo de exemplo de ambiente e configure
```
mv env .env
```
- Edite o arquivo .env de acordo com suas configurações
```
app.baseURL = 'http://localhost/cadastro_livros'
database.default.hostname = localhost
database.default.database = nome_do_banco
database.default.username = usuario
database.default.password = senha
database.default.DBDriver = MySQLi
```

- Execute o script sql presente na pasta raiz do projeto para a criação das tabelas

- Acesse a aplicação pelo seu navegador usando a url indicada em "app.baseURL" no seu .env

## ✍🏾 Autor
Eberson dos Santos Cosme