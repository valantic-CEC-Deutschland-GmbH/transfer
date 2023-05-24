# valantic-spryker/transfer

[![Minimum PHP Version](https://img.shields.io/badge/php-%3E%3D%208.1-8892BF.svg)](https://php.net/)
[![coverage report](https://gitlab.nxs360.com/packages/php/spryker/transfer/badges/main/pipeline.svg)](https://gitlab.nxs360.com/packages/php/spryker/transfer/-/pipelines?page=1&scope=all&ref=main)
[![coverage report](https://gitlab.nxs360.com/packages/php/spryker/transfer/badges/main/coverage.svg)](https://packages.gitlab-pages.nxs360.com/php/spryker/transfer)

# Description
 - adds file plugins to transfer:validate
 - adds blacklist plugins to configure filesnames that should be ignored on validation

# Install
- see https://gitlab.nxs360.com/groups/packages/php/spryker/-/packages

# HowTos Cli

PHP Container: `docker run -it --rm --name my-running-script -v "$PWD":/data spryker/php:latest bash`

Run Tests: `codecept run --env standalone`

Fixer: `vendor/bin/phpcbf --standard=phpcs.xml --report=full src/ValanticSpryker/`

Disable opcache: `mv /usr/local/etc/php/conf.d/docker-php-ext-opcache.ini /usr/local/etc/php/conf.d/docker-php-ext-opcache.iniold`

XDEBUG:
- `ip addr | grep '192.'`
- `$docker-php-ext-enable xdebug`
- configure phpstorm (add 127.0.0.1 phpstorm server with name valantic)
- `$PHP_IDE_CONFIG=serverName=valantic php -dxdebug.mode=debug -dxdebug.client_host=192.168.87.39 -dxdebug.start_with_request=yes ./vendor/bin/codecept run --env standalone`

- Run Tests with coverage: `XDEBUG_MODE=coverage vendor/bin/codecept run --env standalone --coverage --coverage-xml --coverage-html`

# use nodejs
 - docker run -it --rm --name my-running-script -v "$PWD":/data node:18 bash
