# AdminLTE 3 package for laravel

Easy to install AdminLTE 3 theme and implements Brezee Starter Kit

# Support Laravel Version

|Version|Support|
|---|---|
|Laravel 9.x|x|
|Laravel 8.x|x|
|Laravel 7.x| |
|Laravel 6.x| |

# Installation:

First, install package:

```console
composer require dattrink/adminlte3

```

And
```
php artisan adminlte3:install

php artisan migrate

php artisan storage:link

npm install && npm run dev
```

## For Laravel 8

- Remove argument `--hide-modules` in package.json:

Exam:

```json
  ...
      "scripts": {
        "dev": "npm run development",
        "development": "cross-env NODE_ENV=development node_modules/webpack/bin/webpack.js --progress --config=node_modules/laravel-mix/setup/webpack.config.js",
        "watch": "npm run development -- --watch",
        "watch-poll": "npm run watch -- --watch-poll",
        "hot": "cross-env NODE_ENV=development node_modules/webpack-dev-server/bin/webpack-dev-server.js --inline --hot --disable-host-check --config=node_modules/laravel-mix/setup/webpack.config.js",
        "prod": "npm run production",
        "production": "cross-env NODE_ENV=production node_modules/webpack/bin/webpack.js --no-progress --config=node_modules/laravel-mix/setup/webpack.config.js"
    },
  ...
```

# Aout this package
- Replace app and guest layout
- Install and implement laravel/breeze package with AdminLTE 3

I hope you enjoy it!
