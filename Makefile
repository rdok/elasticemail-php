export UID = $(shell id -u)
export GID = $(shell id -g)
export PWD = $(shell pwd)

test: vendor
	docker-compose run --rm php-cli composer phpunit

test-watch: vendor
	docker-compose run --rm php-cli composer phpunit-watch-unit

vendor:
	docker-compose run --rm php-cli composer install

shell:
	docker-compose run --rm php-cli bash

update:
	docker-compose run --rm php-cli composer update

################################################################################
# CI
################################################################################
ci-vendor:
	docker-compose run --rm php-ci composer install

ci-validate: ci-vendor
	docker-compose run --rm php-ci composer validate

ci-test: ci-vendor
	docker-compose run --rm php-ci composer phpunit
