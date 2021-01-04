# Laravel v8 com PHP8 e Laravel-Sail

````shell
# Instalando
docker run --rm \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php80-composer:latest \
    laravel new SoN05_PHP8_Laravel8_Sail
cd SoN05_PHP8_Laravel8_Sail
sudo chown -R $USER: .

# Env
sed -i.bak 's/DB_HOST=127.0.0.1/DB_HOST=mysql/g' .env
sed -i.bak 's/MEMCACHED_HOST=127.0.0.1/MEMCACHED_HOST=memcached/g' .env
sed -i.bak 's/REDIS_HOST=127.0.0.1/REDIS_HOST=redis/g' .env

# Sail
alias sail='bash vendor/bin/sail'

# Run docker containers `docker-compose up`
sail up
# Run docker containers in the background
# `docker-compose up -d`
sail up -d

# Stop containers and remove containers, networks, etc.
sail down

# Run PHP CLI commands and return output
sail php --version

# Node and NPM
sail node --version
sail npm --version

# EX: 
#   Runs php artisan queue:work in the container
#     sail artisan queue:work
#   Require a composer package
#     sail composer require laravel/sanctum

# Acesse http://localhost/

# Install laravel/breeze
sail composer require laravel/breeze --dev
sail php artisan breeze:install
sail npm install
sail npm run dev

# migrate
sail art migrate
````

````shell
# Cearte Model/Migration/Seeder
sail art make:model Account --migration
sail art make:model Bank --migration
sail art make:seed BanksTableSeeder

# Migrate & seed
sail art migrate
sail art db:seed

# Testing
sail art test
# or
sail shell
./run_tests.sh --fast
./run_tests.sh --art
./run_tests.sh
````


````shell
sail art make:controller ApiControllerTrait
sail art make:controller AccoountController
sail art make:controller BanksController
sail art make:controller UsersController

# http://localhost/api/banks
# http://localhost/api/banks?limit=3
# http://localhost/api/banks?like=title,itau
````

````shell
# Installing barryvdh/laravel-ide-helper
sail composer require --dev barryvdh/laravel-ide-helper
sail art ide-helper:generate
sail art ide-helper:meta
sail art ide-helper:models -W
````
