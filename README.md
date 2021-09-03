# Imbo Coding Standard

[![CI workflow](https://github.com/imbo/imbo-coding-standard/actions/workflows/ci.yml/badge.svg)](https://github.com/imbo/imbo-coding-standard/actions/workflows/ci.yml)

This is the PHP coding standard for the Imbo project and all related tools. The ruleset is enforced using the [PHP Coding Standards Fixer
](https://github.com/FriendsOfPHP/PHP-CS-Fixer) tool.

## How to setup

First, add this package as a development dependency:

    composer require --dev imbo/imbo-coding-standard ^2.0

then, create a PHP-CS-Fixer configuration file named `.php-cs-fixer.php` local to your repository that includes the following:

```php
<?php declare(strict_types=1);
require 'vendor/autoload.php';

$finder = (new Symfony\Component\Finder\Finder())
    ->files()
    ->name('*.php')
    ->in(__DIR__)
    ->exclude('vendor');

return (new Imbo\CodingStandard\Config())
    ->setFinder($finder);
```

Adjust the paths if necessary. Now you can run the following command to check the coding standard in your project:

    php-cs-fixer fix --dry-run --diff

You can install the `php-cs-fixer` tool globally with Composer if you so wish:

    composer global require friendsofphp/php-cs-fixer

Refer to the [documentation](https://github.com/FriendsOfPHP/PHP-CS-Fixer) for other installation alternatives.

## Add step in the GitHub workflow

All Imbo-related projects use GitHub workflows, and checking the coding standard should be a part of that workflow:

```yaml
name: CI workflow
on: push
jobs:
  php-cs-fixer:
    runs-on: ubuntu-20.04
    name: Check coding standard
    steps:
      - name: Checkout code
        uses: actions/checkout@v2

      - name: Setup PHP
        uses: shivammathur/setup-php@v2
        with:
          tools: php-cs-fixer

      - name: Install dependencies
        run: composer install --prefer-dist

      - name: Check coding standard
        run: php-cs-fixer fix --dry-run --diff
```
