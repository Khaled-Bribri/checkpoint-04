# Variables
PROJECT_NAME=sms-express
DOCKER_COMPOSE=docker-compose
PHP_SERVICE=php
SYMFONY_CONSOLE=docker-compose run --rm $(PHP_SERVICE) php bin/console

# Commandes Docker Compose
up:
	$(DOCKER_COMPOSE) up -d

down:
	$(DOCKER_COMPOSE) down

restart:
	$(DOCKER_COMPOSE) restart

logs:
	$(DOCKER_COMPOSE) logs -f

# Commandes Symfony
start:
	$(SYMFONY_CONSOLE) serve:start -d

stop:
	$(SYMFONY_CONSOLE) serve:stop

cc:
	$(SYMFONY_CONSOLE) cache:clear

migrate:
	$(SYMFONY_CONSOLE) doctrine:migrations:migrate --no-interaction

# Build et déployement
build:
	$(DOCKER_COMPOSE) build

deploy:
	$(DOCKER_COMPOSE) down
	$(DOCKER_COMPOSE) pull
	$(DOCKER_COMPOSE) build
	$(DOCKER_COMPOSE) up -d

# Tests
test:
	$(DOCKER_COMPOSE) run --rm $(PHP_SERVICE) php ./vendor/bin/phpunit --stop-on-failure

# Nettoyage
clean:
	rm -rf var/cache/*
	rm -rf var/logs/*
	rm -rf var/sessions/*
