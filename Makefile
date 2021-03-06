export UID = $(shell id -u)
export GID = $(shell id -g)
export PWD = $(shell pwd)

test: vendor
	docker-compose run --rm php7.2 composer phpunit

test-watch: vendor
	docker-compose run --rm php7.2 composer phpunit-watch-unit

vendor:
	docker-compose run --rm php7.2 composer install

shell:
	docker-compose run --rm php7.2 sh

update:
	docker-compose run --rm php7.2 composer update

################################################################################
# CI
################################################################################
validate:
	docker-compose run --rm php7.2 sh -c 'composer install && composer validate'
test-php7-2:
	docker-compose run --rm php7.2 sh -c 'composer install && composer phpunit'
test-php7-3:
	docker-compose run --rm php7.3 sh -c 'composer install && composer phpunit'
test-php7-4:
	docker-compose run --rm php7.4 sh -c 'composer install && composer phpunit'
test-php8-0:
	docker-compose run --rm php8.0 sh -c 'composer install && composer phpunit'

################################################################################
# Integration tests
################################################################################
.env:
	cp .env.example .env

test-integration-send-email: .env
	docker-compose run --rm php7.2 sh -c '\
		composer install && \
		./vendor/bin/phpunit tests/Integration/Email/SendTest \
	'
