sport-calendar
==============

A Symfony project created on April 23, 2016, 1:08 pm.

Run project:

1. composer install

2. php bin/console doctrine:database:create

3. php bin/console doctrine:schema:create

4. php bin/console h:d:f:l

5. php bin/console assets:install

6. php bin/console server:run

PhpUnit:

1. ./vendor/bin/phpunit


Analysis Tools:

1. PHP_CodeSniffer: ./vendor/bin/phpcs --standard=psr2 src

2. PHP Mess Detector: ./vendor/bin/phpmd src html cleancode,codesize,controversial,design,naming,unusedcode --reportfile md-report.html

3. PHP Copy/Paste Detector: ./vendor/bin/phpcpd src