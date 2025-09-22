# Sistema de Gestão de Problemas e Ações (5W1H)


## Funcionalidades Principais

O sistema possui uma base completa e segura para o gerenciamento de problemas em um ambiente multiusuário.

* **Autenticação de Usuários:** Sistema completo de cadastro, login e logout.
* **Segurança de Rotas:** Utilização de middleware `auth` para proteger rotas internas e `guest` para rotas públicas.
* **Gerenciamento de Problemas (CRUD):**
    * **Criação:** Usuários podem cadastrar novos problemas com título, descrição e análise de causa.
    * **Leitura:** Listagem de todos os problemas na página inicial e uma página de detalhes para cada problema.
    * **Atualização:** Edição de problemas existentes.
    * **Exclusão:** Remoção de problemas do sistema.
* **Autorização com Policies:** Implementação de regras de permissão para garantir que apenas o criador de um problema possa editá-lo ou excluí-lo.
* **Plano de Ação (5W1H):**
    * Cadastro de ações detalhadas para cada problema, seguindo a metodologia: **O quê, Por quê, Onde, Quem, Quando, Como**.
    * Listagem de todas as ações na página de detalhes do problema.
* **Interface Responsiva:** Front-end estilizado com Bootstrap 5 e Bootstrap Icons para uma experiência de usuário limpa e moderna.
* **Internacionalização:** Mensagens de validação do Laravel traduzidas para Português do Brasil (pt-BR).

---

## Tecnologias Utilizadas

* **Back-end:** PHP 8+, Laravel 11+
* **Front-end:** HTML5, Blade Templates, Bootstrap 5, Bootstrap Icons
* **Banco de Dados:** MySQL
* **Gerenciador de Dependências:** Composer

---

## Instalação e Execução do Projeto

**Pré-requisitos:**
* PHP >= 8.2
* Composer
* Um servidor de banco de dados 

**Passos:**

1.  **Clone o repositório:**
    ```bash
    git clone [URL_DO_SEU_REPOSITORIO]
    cd nome-do-projeto
    ```

2.  **Instale as dependências do Composer:**
    ```bash
    composer install
    ```

3.  **Configure o arquivo de ambiente:**
    * Copie o arquivo de exemplo `.env.example` para `.env`.
        ```bash
        cp .env.example .env
        ```
    * Gere a chave da aplicação:
        ```bash
        php artisan key:generate
        ```

4.  **Configure o Banco de Dados:**
    * Abra o arquivo `.env` e configure as variáveis de conexão com o seu banco de dados:
        ```env
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=nome_do_seu_banco
        DB_USERNAME=seu_usuario
        DB_PASSWORD=sua_senha
        ```

5.  **Execute as Migrations:**
    * Este comando criará todas as tabelas necessárias no banco de dados (`users`, `problemas`, `actions`).
        ```bash
        php artisan migrate
        ```

6.  **Inicie o servidor de desenvolvimento:**
    ```bash
    php artisan serve
    ```

7.  **Acesse a aplicação:**
    * Abra seu navegador e acesse [http://127.0.0.1:8000](http://127.0.0.1:8000).
