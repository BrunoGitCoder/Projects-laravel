# Laravel Project Setup

1. Clone repo:
    ```bash
    git clone -b master https://github.com/BrunoGitCoder/Projects-laravel.git
    ```
    
2. Criar .env:
    ```bash
    cp .env.example .env
    ```
    
3. Editar `.env`:
    ```env
    DB_CONNECTION=pgsql
    DB_HOST=127.0.0.1
    DB_PORT=5432
    DB_DATABASE=nome_do_banco
    DB_USERNAME=seu_usuario
    DB_PASSWORD=sua_senha
    ```
4. Execute o script:
    ```bash
    npm run start-project
    ```