# Desafio do Amigo Secreto

## Guia para Executar o Projeto "Amigo Secreto"

### Requisitos

- **Servidor Web**: Apache, Nginx, ou qualquer outro servidor web compatível com PHP.
- **PHP**: Versão 7.4 ou superior.
- **Banco de Dados**: MySQL ou SQLite.

### Configuração do Banco de Dados

- **MySQL**: Crie um banco de dados e configure o arquivo `config/database.php` com suas credenciais.
- Execute o arquivo `config/db.sql`.

### Acessar a Aplicação

1. Acesse `http://localhost/amigo_secreto/public/` para ver a página inicial.
2. Clique no botão “Ir para listagem de pessoas” para ir para a `home.php` e ver a lista de pessoas cadastradas.

### Cadastro e Sorteio

- **Cadastrar Pessoas**: Clique no botão “Cadastrar Pessoa” e adicione novas pessoas.
- **Realizar Sorteio**: Clique no botão “Sortear” e depois em “Realizar Sorteio” para gerar a lista.
