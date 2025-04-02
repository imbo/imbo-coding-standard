# Imbo Coding Standard

[![CI workflow](https://github.com/imbo/imbo-coding-standard/actions/workflows/ci.yml/badge.svg)](https://github.com/imbo/imbo-coding-standard/actions/workflows/ci.yml)

This is the PHP coding standard for the Imbo project and all related tools. The ruleset is enforced using the [PHP Coding Standards Fixer
](https://github.com/PHP-CS-Fixer/PHP-CS-Fixer) tool.

## How to setup

First, add this package and [php-cs-fixer](https://github.com/PHP-CS-Fixer/PHP-CS-Fixer) as development dependencies:

    composer require --dev imbo/imbo-coding-standard ^2.0 friendsofphp/php-cs-fixer

then, create a configuration file named `.php-cs-fixer.php` local to your repository that includes the following:

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

Refer to the [documentation](https://github.com/PHP-CS-Fixer/PHP-CS-Fixer) for other installation alternatives.

## Add step in the GitHub workflow

All Imbo-related projects use GitHub workflows, and checking the coding standard should be a part of that workflow:

```yaml
name: CI workflow
on: push
jobs:
  php-cs-fixer:
    runs-on: ubuntu-24.04
    name: Check coding standard
    steps:
      - name: Checkout code
        uses: actions/checkout@v4

      - name: Setup PHP
        uses: shivammathur/setup-php@v2

      - name: Install dependencies
        run: composer install

      - name: Check coding standard
        run: ./vendor/bin/php-cs-fixer fix --dry-run --diff
```
