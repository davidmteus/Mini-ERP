# Mini-ERP

Sistema de gestão empresarial desenvolvido em PHP e MySQL, com autenticação, CRUD de usuários, produtos, clientes e vendas.

Projeto desenvolvido para praticar desenvolvimento de sistemas e integração com banco de dados.

## Tecnologias

- PHP
- MySQL
- HTML
- CSS
- JavaScript

## Funcionalidades

- Sistema de login e autenticação
- Cadastro, edição, listagem e exclusão de usuários
- Cadastro, edição, listagem e exclusão de produtos
- Cadastro, edição, listagem e exclusão de clientes
- Cadastro, edição, listagem e exclusão de vendas
- Controle de estoque relacionado às vendas
- Dashboard com informações do sistema
- Integração com banco de dados MySQL

## Estrutura do Projeto

O projeto está dividido em quatro áreas principais:

- Clientes — gerenciamento de clientes cadastrados no sistema.
- Produtos — gerenciamento de produtos e controle de estoque.
- Usuários — gerenciamento dos usuários que possuem acesso ao sistema.
- Vendas — cadastro e gerenciamento das vendas realizadas.

Além dessas áreas, o projeto possui as páginas de login, dashboard, controle de sessão e arquivo de estilos.

## Como executar

1. Instale o XAMPP.
2. Inicie o Apache e o MySQL.
3. Coloque a pasta do projeto dentro de `C:\xampp\htdocs\`.
4. Crie o banco de dados `mini_erp` no phpMyAdmin.
5. Configure a conexão com o banco de dados no arquivo `conexao.php`.
6. Acesse o sistema pelo navegador através de `http://localhost/mini_erp/`.

## Banco de Dados

O sistema utiliza o MySQL para armazenar e gerenciar os dados de usuários, produtos, clientes e vendas.

O arquivo `conexao_exemplo.php` pode ser utilizado como referência para configurar a conexão com o banco de dados.

## Observação

Este projeto foi desenvolvido para fins de estudo e prática em desenvolvimento web, utilizando PHP, MySQL, HTML, CSS e JavaScript.

## Autor

David Mateus
