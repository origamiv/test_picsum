$(eval env=$(shell sh -c "cat ./.env | grep -v ^# | xargs -0"))
$(eval user=$(shell sh -c "echo $$(id -u)"))

.PHONY: start stop update app nginx es exec

build:
	env $(env) UID=$(user) docker-compose --file ./docker-compose.yml up --build -d

start:
	env $(env) UID=$(user) docker-compose --file ./docker-compose.yml up -d

run:
	env $(env) UID=$(user) docker-compose --file ./docker-compose.yml up --build

stop:
	env $(env) UID=$(user) docker-compose --file ./docker-compose.yml down

update:
	env $(env) UID=$(user) docker-compose --file ./docker-compose.yml build --no-cache

install:
	env $(env) UID=$(user) docker-compose --file ./docker-compose.yml exec fpm composer install
	env $(env) UID=$(user) docker-compose --file ./docker-compose.yml exec fpm php artisan key:generate
	env $(env) UID=$(user) docker-compose --file ./docker-compose.yml exec fpm php artisan migrate:fresh --seed

fresh:
	env $(env) UID=$(user) docker-compose --file ./docker-compose.yml exec fpm php artisan migrate:fresh --seed

fresh_test:
	env $(env) UID=$(user) docker-compose --file ./docker-compose.yml exec fpm php artisan migrate:fresh --seed --env=testing

test:
	env $(env) UID=$(user) docker-compose --file ./docker-compose.yml exec fpm php artisan test

app:
	env $(env) UID=$(user) docker-compose --file ./docker-compose.yml exec fpm sh

app_root:
	env $(env) UID=$(user) docker-compose --file ./docker-compose.yml exec -u 0 fpm sh

fix:
	env $(env) UID=$(user) docker-compose --file ./docker-compose.yml exec fpm php ./vendor/bin/php-cs-fixer fix ./

nginx:
	env $(env) UID=$(user) docker-compose --file ./docker-compose.yml exec nginx sh

db:
	env $(env) UID=$(user) docker-compose --file ./docker-compose.yml exec db bash

exec:
	env $(env) UID=$(user) docker-compose --file ./docker-compose.yml exec fpm $(command)
