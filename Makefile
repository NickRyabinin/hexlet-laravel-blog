PORT ?= 8000
dev:
	npm run dev
build:
	npm run build
start:
	php artisan serve
install:
	composer install
	npm install
validate:
	composer validate
lint:
	composer exec --verbose phpcs -- --standard=PSR12 routes app
