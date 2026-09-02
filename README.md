Mini-ERP

Sistema de gestão empresarial desenvolvido em PHP e MySQL, com autenticação, CRUD de usuários, produtos, clientes e vendas.

Projeto desenvolvido para praticar desenvolvimento de sistemas e integração com banco de dados.

Tecnologias
PHP
MySQL
HTML
CSS
JavaScript
Funcionalidades
Sistema de login e autenticação
Cadastro, edição, listagem e exclusão de usuários
Cadastro, edição, listagem e exclusão de produtos
Cadastro, edição, listagem e exclusão de clientes
Cadastro, edição, listagem e exclusão de vendas
Controle de estoque relacionado às vendas
Dashboard com informações do sistema
Integração com banco de dados MySQL
Estrutura do Projeto

O projeto está organizado nas seguintes áreas:

clientes — gerenciamento de clientes
produtos — gerenciamento de produtos
usuarios — gerenciamento de usuários
vendas — gerenciamento de vendas
dashboard.php — painel principal do sistema
login.php — tela de login
verificar_login.php — validação do acesso
logout.php — encerramento da sessão
style.css — estilos das páginas
Como executar
Instale o XAMPP.
Inicie o Apache e o MySQL.
Coloque a pasta do projeto dentro de C:\xampp\htdocs\.
Crie o banco de dados mini_erp no phpMyAdmin.
Configure a conexão com o banco de dados no arquivo conexao.php.
Acesse o sistema pelo navegador em http://localhost/mini_erp/.
Banco de Dados

O sistema utiliza o MySQL para armazenar e gerenciar os dados de usuários, produtos, clientes e vendas.

O arquivo conexao_exemplo.php pode ser utilizado como referência para configurar a conexão com o banco de dados.

Observação

Este projeto foi desenvolvido para fins de estudo e prática em desenvolvimento web, utilizando PHP, MySQL, HTML, CSS e JavaScript.

Autor

David Mateus
