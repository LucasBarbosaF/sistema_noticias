# Sistema de Gerenciamento de Notícias

O **Sistema de Gerenciamento de Notícias** foi desenvolvido para facilitar a administração de notícias. A aplicação permite que os usuários visualizem, busquem e interajam com as notícias publicadas. Além disso, o sistema oferece funcionalidades para o cadastro de novas notícias e categorias, sendo necessário que o usuário esteja autenticado para realizar essas ações.

## Funcionalidades

- **Visualização de Notícias**: Permite que os usuários acessem e visualizem as notícias cadastradas no sistema.
- **Busca de Notícias**: O sistema disponibiliza um campo de pesquisa onde é possível procurar notícias por título ou descrição.
- **Cadastro de Notícias e Categorias**: Para registrar novas notícias ou categorias, o usuário precisa estar logado no sistema. 

## Como Realizar o Login

Para acessar as funcionalidades de cadastro de notícias e categorias, é necessário realizar o login. Siga os passos abaixo:

1. **Acesse a página de login**:  
   [http://127.0.0.1:8000/autenticacao/login](http://127.0.0.1:8000/autenticacao/login)

2. **Entre com suas credenciais** (usuário e senha).

3. Após o login bem-sucedido, você será redirecionado para o painel de administração, onde poderá cadastrar novas notícias e categorias.

### Criando uma Nova Conta

Caso ainda não tenha uma conta, basta clicar no botão "Cadastrar" na página de login. Você será redirecionado para o formulário de criação de conta, onde deverá preencher os dados necessários para se registrar no sistema.


## Instalação e Pré-requisitos

Antes de iniciar, você precisará ter as seguintes ferramentas instaladas:

- [Docker](https://www.docker.com/get-started)
- [Docker Compose](https://docs.docker.com/compose/install/)

Você pode verificar se essas ferramentas estão corretamente instaladas executando os seguintes comandos no terminal:

```bash
docker --version
docker-compose --version
```

Configuração do Ambiente

1. Clone o Repositório

2. Primeiro, clone o repositório do projeto para a sua máquina:

```bash
git clone https://github.com/LucasBarbosaF/teste-investidor10.git
cd teste-investidor10
```


2. Configuração do .env
 
Exemplo de um arquivo .env:

```bash
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=sistema_noticias
DB_USERNAME=develop
DB_PASSWORD=password
```

3. Iniciando o Docker Compose

```bash
docker-compose up -d
```

4. Acessando os Containers

```bash
docker-compose ps
docker-compose exec app php artisan migrate --seed
```

5. Acessando a Aplicação
```bash
http://localhost:8000
```


