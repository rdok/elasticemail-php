export UID = $(shell id -u)
export GID = $(shell id -g)
export PWD = $(shell pwd)

test: vendor
	docker-compose run --rm php-cli composer phpunit

vendor:
	docker-compose run --rm php-cli composer install

shell:
	docker-compose run --rm php-cli bash

