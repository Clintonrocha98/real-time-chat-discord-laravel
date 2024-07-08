# Discord chat

Esse projeto foi um desafio proposto pelo [DanielHe4rt](https://twitter.com/danielhe4rt).

O principal intuito desse projeto foi entender um pouco mais do Laravel e ver mais de perto como é feito para usar uma estrutura da minha escolha nesse ecossistema, acabei usando `repository pattern` no projeto, confesso que é algo desnecessário, pois é um projeto pequeno, ainda mais usando o `Eloquent`, mas um pouco de `Overengineering` não machuca ninguem.

- [Link com todas as informações do desafio](https://gist.github.com/DanielHe4rt/4012e5bf9c612d9cee9efa654eb32f6d)
- [Link Tailwind clone](https://tailwindcomponents.com/component/discord-ui-clone)

## Requisitos do Projeto

### Funcionalidades Principais

1. **Autenticação de Usuários**
   - Implementação de cadastro e login de usuários com autenticação em Laravel Sanctum.
   - **Entidades**: User
   - **Rotas**:
     - `POST /register`: Cria um novo usuário.
     - `POST /login`: Faz login de um usuário.
     - `GET /user`: Retorna o usuário autenticado.

2. **Criação de Servidores**
   - Usuários podem criar servidores de chat.
   - **Entidades**: Guild
   - **Rotas**:
     - `GET /guilds`: Retorna todos os servidores disponíveis.
     - `POST /guilds`: Cria um novo servidor.
     - `DELETE /guilds/{guildId}`: Deleta um servidor específico.

3. **Canais de Texto**
   - Cada servidor pode ter múltiplos canais de texto.
   - Usuários podem enviar e receber mensagens em tempo real.
   - **Entidades**: Channel
   - **Rotas**:
     - `GET /guilds/{guildId}`: Lista os canais de um servidor.
     - `POST /guilds/{guildId}/channels`: Cria um novo canal dentro de um servidor.

4. **Mensagens em Tempo Real**
   - Implementação de mensagens em tempo real utilizando Laravel Echo e websockets.
   - **Entidades**: Message
   - **Rotas**:
     - `GET /guilds/{guildId}/channels/{channelId}`: Entra em um canal e começa a escutar as mensagens.
     - `POST /guilds/{guildId}/channels/{channelId}/messages`: Envia uma mensagem para um canal específico.

## Estrutura do Projeto

### Backend

- **Linguagem**: PHP 8.3
- **Framework**: Laravel 11
- **Banco de Dados**: SQLite
- **Pacotes Utilizados**:
  - Laravel Reverb para implementação de mensagens em tempo real

#### Configuração e Instalação
1. **Clone o repositório**:
    ```bash
    git clone git@github.com:Clintonrocha98/real-time-chat-discord-laravel.git

    cd real-time-chat-discord-laravel
    ```

2. **Instale as dependências**:
    ```bash
    composer install
    ```

3. **Configure o arquivo `.env`**:
  Copie o arquivo de exemplo:
      ```bash
      cp .env.example .env
      ```
    Em ´.env´, você precisa alterar essas variáveis ​​para produção

      ```
      REVERB_APP_ID=
      REVERB_APP_KEY=
      REVERB_APP_SECRET=
      ```
4. **Execute as migrações e seeders**:
    ```bash
    php artisan migrate
    ```

5. **Inicie o servidor de desenvolvimento**:
    ```bash
    php artisan serve
    ```
6. **Reverb**:
    ```bash
    php artisan reverb:start
    ```

### Frontend

#### **Tecnologias**: 

- Laravel Blade
- TailwindCSS
- Javascript

#### Configuração e Instalação
1. **Instale as dependências do frontend**:
    ```bash
    npm install
    ```

2. **Compile os assets**:
    ```bash
    npm run dev
    ```

## Rotas da Aplicação

| Método | Rota                                                        | Descrição                                         |
| ------ | ----------------------------------------------------------- | ------------------------------------------------- |
| GET    | /login                                                      | Página de Login/Senha                             |
| GET    | /register                                                   | Página de Registro                                |
| POST   | /register                                                   | Cria um usuário                                   |
| POST   | /login                                                      | Faz login de um usuário                           |
| GET    | /user                                                       | Retorna o usuário autenticado                     |
| GET    | /guilds                                                     | Retorna todos os servidores disponíveis           |
| POST   | /guilds                                                     | Cria um novo servidor                             |
| DELETE | /guilds/{guildId}                                           | Deleta um servidor                                |
| GET    | /guilds/{guildId}                                           | Lista os canais de um servidor                    |
| POST   | /guilds/{guildId}/channels                                  | Cria um novo canal dentro de um servidor          |
| GET    | /guilds/{guildId}/channels/{channelId}                      | Entra em um canal e começa a escutar as mensagens |
| POST   | /guilds/{guildId}/channels/{channelId}/messages             | Envia uma mensagem para um canal específico       |

