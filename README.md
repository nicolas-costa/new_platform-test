## Desafio técnico

Esse projeto foi criado em resposta ao desafio técnico.

## Requisitos:

* Composer
* PHP 7.4

## :fire: Getting Started

### Variaveis de ambiente

Crie uma cópia do .env.example, renomeando-o sem o 'example'

```bash
cp .env.sample .env
```

### Dependências

Instale as dependencias do projeto

```bash
composer install
```

## :robot: Endpoints

Há apenas um endpoint, público.

```bash
GET /api/swapi/starships
```

é necessário fornecer um argumento a esse endpoint, o megalight (mglt)

exemplo: 

```bash
GET /api/swapi/starships?mglt=150000
```

esse endpoint também suporta paginação:

```bash
GET /api/swapi/starships?mglt=150000&page=2
```

## :wrench: Rodando o app

A aplicação não foi containerizada, logo será necessário rodar o servidor do artisan.

```bash
php artisan serve
```

A api estará rodando em [localhost](localhost:8000)

## :gear: Testes

```bash
php artisan test
```

## :battery: Melhorias

- [ ] Mais testes automatizados (unit e feature)
- [ ] Containerização básica
- [ ] PHP 8
- [ ] Versionamento de api
- [ ] Autenticação
- [ ] PHP CS fixer
