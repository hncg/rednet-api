install:
	curl -sS https://getcomposer.org/installer | php && sudo mv composer.phar /usr/bin

build:
	composer install -vvv

test:
	./vendor/bin/phpunit
