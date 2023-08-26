install:
	composer install
	npm run build
	touch database.sqlite
	php artisan migrate --seed

serve:
	php -S localhost:8080 -t public
