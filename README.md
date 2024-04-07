<p align="center"><a href="https://mohsen.sbs" target="_blank"><img src="https://mohsen.sbs/storage/uploads/q3nLFnp0O1f7CPwFVh62Fgmlnlmvkmz6B11hDykv.png" width="400" alt="Laravel Logo"></a></p>

## About project

This is a real-time web chat app with Laravel, Reverb & Redis.

- **PHP**
- **Laravel**
- **Reverb**
- **Redis**
- **Redis-server**
- **Js**
- **Alpine.js**
- **Tailwind - Flowbite**

## Getting Started

Clone the project repository by running the command below if you use SSH

```bash
git clone git@github.com:Mohsen-mhm/ChitLara.git
```

If you use https, use this instead

```bash
git clone https://github.com/Mohsen-mhm/ChitLara.git
```

After cloning, run:

```bash
composer install
```

and:

```bash
npm install
```

Duplicate `.env.example` and rename it `.env`

Then run:

```bash
php artisan key:generate
```

-------------------------

### Prerequisites

#### install Redis

- [For Linux](https://redis.io/docs/getting-started/installation/install-redis-on-linux/)
- [For Mac](https://redis.io/docs/getting-started/installation/install-redis-on-mac-os/)
- [For Windows](https://github.com/tporadowski/redis/releases) - Use This repo to download and install Redis on Windows

-------------------------

#### Database Migrations

Be sure to fill in your database details in your `.env` file before running the migrations:

```bash
php artisan migrate
```

Run Redis server in CLI :

```bash
redis-server
```

Run npm in CLI :

```bash
npm run dev #For development server
```
```bash
npm run build #For production server
```

And finally, start the application:

```bash
php artisan serve
```
```bash
php artisan reverb:start
```

visit [http://localhost:8000](http://localhost:8000) to see the application in action.
