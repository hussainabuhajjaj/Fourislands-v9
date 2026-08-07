.PHONY: build up down dev dev-build dev-up dev-down shell artisan migrate seed test logs

# Production
build:
	docker compose build

up:
	docker compose up -d

down:
	docker compose down

restart: down up

logs:
	docker compose logs -f

# Development
dev-build:
	docker compose -f docker-compose.yml -f docker-compose.dev.yml build

dev-up:
	docker compose -f docker-compose.yml -f docker-compose.dev.yml up -d

dev-down:
	docker compose -f docker-compose.yml -f docker-compose.dev.yml down

dev: dev-build dev-up

# Utility
shell:
	docker compose exec app bash

artisan:
	docker compose exec app php artisan $(cmd)

migrate:
	docker compose exec app php artisan migrate

seed:
	docker compose exec app php artisan db:seed

test:
	docker compose exec app php artisan test

# Assets
npm-install:
	docker compose exec app npm install

npm-dev:
	docker compose exec app npm run dev

npm-production:
	docker compose exec app npm run production
