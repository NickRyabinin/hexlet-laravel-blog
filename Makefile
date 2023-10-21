install:
	composer install
	npm install
dev:
	npm run dev
build:
	npm run build
start:
	php artisan serve --host 0.0.0.0
validate:
	composer validate
lint:
	composer exec --verbose phpcs -- --standard=PSR12 routes app
test:
	php artisan test
test-coverage:
	XDEBUG_MODE=coverage php artisan test --coverage-clover build/logs/clover.xml
