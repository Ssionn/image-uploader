# image-uploader

This repository contains an image uploader (Also works with videos). This has been made with Laravel and Tailwindcss. The package consists of using the FilePond CDN.

## Installation

Clone Repo:
```
https://github.com/Ssionn/image-uploader.git
```

Run composer and npm:
```
composer install
```
```
npm install
```

## How to Run

Clone example .env to .env and generate a key.
```
cp .env.example .env
```
```
php artisan key:generate
```

Adjust your database username and password.
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=image_uploader
DB_USERNAME=root
DB_PASSWORD=
```

Run this to activate TailwindCSS
```
npm run dev
```

## Apache not working?

Well it's not going to run on xampp. Use the built-in php server instead...
```
php -S localhost:8000 -t public/
```

⚠️ RUN THIS NEXT TO NPM RUN DEV


## Herd

If you don't want to use the built-in server, you can go for [Laravel Herd](https://herd.laravel.com/).
You then visit

```
{YourProjectName}.test/
```

# Storage

Don't forget to link storage
```
php artisan storage:link
```
