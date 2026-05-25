<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Invoices API

## Requisitos / Requirements

- PHP ^8.3
- Composer
- Node.js & npm
- SQLite (padrão) ou PostgreSQL

## Instalação / Setup

```bash
# Clone o repositório
git clone <repo-url>
cd api-laravel

# Instalar dependências PHP
composer install

# Configurar .env
cp .env.example .env
# Edite .env com suas configurações de banco de dados

# Gerar chave da aplicação
php artisan key:generate

# Rodar migrations e seeders
php artisan migrate --seed

# Instalar dependências frontend
npm install
npm run build
```

Ou use o comando de setup automático:

```bash
composer setup
```

## Executar / Run

```bash
# Desenvolvimento (servidor + queue + logs + vite)
composer dev

# Ou apenas o servidor
php artisan serve
```

## Testes / Tests

```bash
composer test
```

## Rotas da API / API Routes

| Método | Rota | Descrição |
|--------|------|-----------|
| GET | `/api/v1/users` | Listar usuários |
| GET | `/api/v1/users/{user}` | Detalhe do usuário |
| GET | `/api/v1/invoices` | Listar faturas |
| POST | `/api/v1/invoices` | Criar fatura |
| GET | `/api/v1/invoices/{invoice}` | Detalhe da fatura |
| PUT | `/api/v1/invoices/{invoice}` | Atualizar fatura |
| DELETE | `/api/v1/invoices/{invoice}` | Deletar fatura |
| POST | `/api/v1/login` | Login |

## Endpoints

---

**Português**

### Faturas - Filtros

A rota `GET /api/v1/invoices` aceita filtros por query string:

```
GET /api/v1/invoices?paid[eq]=1&value[gt]=5000
```

**Operadores disponíveis:** `eq`, `ne`, `gt`, `gte`, `lt`, `lte`, `in`

**Campos filtráveis:** `value`, `type`, `paid`, `payment_date`

---

**English**

### Invoices - Filters

The `GET /api/v1/invoices` endpoint accepts query string filters:

```
GET /api/v1/invoices?paid[eq]=1&value[gt]=5000
```

**Available operators:** `eq`, `ne`, `gt`, `gte`, `lt`, `lte`, `in`

**Filterable fields:** `value`, `type`, `paid`, `payment_date`


## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

In addition, [Laracasts](https://laracasts.com) contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

You can also watch bite-sized lessons with real-world projects on [Laravel Learn](https://laravel.com/learn), where you will be guided through building a Laravel application from scratch while learning PHP fundamentals.

## Agentic Development

Laravel's predictable structure and conventions make it ideal for AI coding agents like Claude Code, Cursor, and GitHub Copilot. Install [Laravel Boost](https://laravel.com/docs/ai) to supercharge your AI workflow:

```bash
composer require laravel/boost --dev

php artisan boost:install
```

Boost provides your agent 15+ tools and skills that help agents build Laravel applications while following best practices.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
