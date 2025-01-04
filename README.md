A "Laravel 11 base app" generally refers to a starter or boilerplate application set up with Laravel 11. It serves as a foundational template containing the necessary configurations, basic structure, and often includes some commonly used packages, tools, or features that simplify starting a new Laravel project.

Laravel=11
PHP=8.2
Composer=2.6
NODE=v18.20.4
NPM=10.7.0

https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js

# How to use Laravel with Socket.IO
`https://www.freecodecamp.org/news/how-to-use-laravel-with-socket-io-e7c7565cc19d/`

# Building Real-Time Applications with Laravel and WebSockets
`https://medium.com/@lfoster49203/building-real-time-applications-with-laravel-and-websockets-1f0e4465ef3a`

composer require beyondcode/laravel-websockets
composer require beyondcode/laravel-websockets:^2.0 --with-all-dependencies
php artisan vendor:publish --provider="BeyondCode\LaravelWebSockets\WebSocketsServiceProvider" --tag="websockets-config"
php artisan vendor:publish --provider="BeyondCode\LaravelWebSockets\WebSocketsServiceProvider" --tag="migrations"


php artisan reverb:start --host="0.0.0.0" --port=9000 --hostname="laravel.reverb"

https://www.freecodecamp.org/news/laravel-reverb-realtime-chat-app/

composer require pusher/pusher-php-server
npm install --save laravel-echo pusher-js

https://dev.to/zouhairghaidoud/laravel-echo-an-introduction-and-how-to-install-it-3foj
https://medium.com/@emreensr/real-time-chat-implementation-with-laravel-reverb-and-vue-3-03a16cf593ef

`https://redberry.international/laravel-reverb-real-time-communication/`

php artisan config:clear

# Real Time Chat Implementation Laravel 11
php artisan install:broadcasting

composer require laravel/reverb
php artisan reverb:install

composer require pusher/pusher-php-server

npm install --save-dev laravel-echo pusher-js

php artisan db:seed --class=UserSeeder

# Make a module
`php artisan make:module Web`

https://lostandfoundnetworks.com/

onerror="this.src=`{{ asset('assets/img/default/no-image-available.png') }}`"
php artisan db:seed --class=AreasSeeder