
# Cadastro de Cliente - Laravel e Bootstrap

Este projeto implementa uma aplicação de cadastro de clientes utilizando o framework **Laravel** para o backend e **Bootstrap** para o frontend. A aplicação permite cadastrar clientes com informações como nome, CPF, endereço, telefone e e-mail. A busca de endereço é feita automaticamente com a integração da **API ViaCEP**.

## Tecnologias Utilizadas

- **Laravel** (Backend)
- **Bootstrap** (Frontend)
- **API ViaCEP** (Para buscar endereços)
- **JavaScript** (Para manipulação da busca do endereço)
- **PHP** (Para lógica de backend)

## Requisitos

Antes de rodar o projeto, certifique-se de ter as seguintes ferramentas instaladas:

- [PHP](https://www.php.net/downloads.php) (versão 7.4 ou superior)
- [Composer](https://getcomposer.org/download/)
- [Laravel](https://laravel.com/docs)
- [Node.js e NPM](https://nodejs.org/) (para o frontend)
- [Banco de Dados] (MySQL ou SQLite, conforme sua preferência)
- [Git](https://git-scm.com/)

## Como Rodar o Projeto

### 1. Clone o repositório
Clone o repositório para a sua máquina local:

```bash
git clone https://github.com/seu-usuario/nome-do-repositorio.git
cd nome-do-repositorio
```

### 2. Instale as dependências do backend
No diretório raiz do projeto, execute o seguinte comando para instalar as dependências do Laravel via Composer:

```bash
composer install
```

### 3. Configure o ambiente
Crie o arquivo `.env` a partir do arquivo de exemplo:

```bash
cp .env.example .env
```

Abra o arquivo `.env` e configure as credenciais do banco de dados e outras variáveis necessárias.

Exemplo de configuração do banco de dados (MySQL):

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario
DB_PASSWORD=senha
```

### 4. Gere a chave do aplicativo
Execute o comando abaixo para gerar a chave da aplicação:

```bash
php artisan key:generate
```

### 5. Rodar as migrações 

```bash
php artisan migrate
```

### 6. Instalar dependências do frontend (opcional, para compilar assets)

```bash
npm install
npm run dev
```

### 7. Rodar o servidor
Agora, você pode rodar o servidor local com o comando:

```bash
php artisan serve
```

Isso vai iniciar o servidor localmente. O projeto estará disponível em `http://127.0.0.1:8000`.

## Funcionalidades

- **Cadastro de Cliente**: O formulário inclui campos como nome, CPF, endereço, telefone e e-mail.
- **Integração com a API ViaCEP**: Ao preencher o campo de CEP e pressionar Tab, os campos de endereço (logradouro, bairro, cidade e estado) são preenchidos automaticamente com os dados retornados pela API ViaCEP.
- **Interface Responsiva**: Utiliza o **Bootstrap** para garantir que a interface seja simples e responsiva em dispositivos móveis, tablets e desktops.

## Estrutura do Projeto

O projeto segue o padrão **Model-View-Controller (MVC)** do Laravel.

- **Controllers**: Controladores para processar as requisições e lógica de cadastro.
- **Models**: Modelos para interação com o banco de dados.
- **Views**: As páginas HTML renderizadas para o frontend, utilizando o Bootstrap para estilização.
- **Routes**: Arquivo de rotas para definir as URLs da aplicação.

## Exemplos de Requisição

### Requisição de busca de CEP

**URL**: `/cep`  
**Método**: `POST`

**Corpo** (JSON):

```json
{
  "cep": "01001000"
}
```

**Resposta** (JSON):

```json
{
  "logradouro": "Praça da Sé",
  "bairro": "Sé",
  "localidade": "São Paulo",
  "uf": "SP"
}
```

## Possíveis Erros

- **Erro 500**: Certifique-se de que a configuração do banco de dados no arquivo `.env` está correta.
- **Erro ao buscar o endereço**: Pode ocorrer caso o CEP informado seja inválido ou a API ViaCEP esteja fora do ar.


## Contribuindo

1. Faça o **fork** do repositório.
2. Crie uma **branch** para a sua modificação.
3. Faça suas mudanças e **commite**.
4. **Push** para a sua branch.
5. Abra um **pull request**.


