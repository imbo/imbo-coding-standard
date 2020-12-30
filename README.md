# Imbo Coding Standard

This is the PHP coding standard for the Imbo project and all related tools. The ruleset is enforced using the [PHP Coding Standards Fixer
](https://github.com/FriendsOfPHP/PHP-CS-Fixer) tool.

## How to setup

First, add this package as a development dependency:

    composer require --dev imbo/imbo-coding-standard

then, create a PHP-CS-Fixer configuration file named `.php_cs.dist` local to your repository that includes the following:

```php
<?php
return new Imbo\CodingStandard\Config();
```

Now you can run the following command to check the coding standard in your project:

    php-cs-fixer fix --dry-run --diff --diff-format udiff

Refer to the [documentation](https://github.com/FriendsOfPHP/PHP-CS-Fixer) on how to install php-cs-fixer locally.

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
        run: php-cs-fixer fix --dry-run --diff --diff-format udiff
```

## Custom configuration

By default the `Finder` instance used with the Imbo ruleset is configured to check all `*.php` files in your project directory, excluding the `vendor` directory. If you need to override this behaviour you will have to replace the `Finder` instance from your `.php_cs.dist` file:

```php
<?php declare(strict_types=1);
// Create your custom Finder
$finder = (new Symfony\Component\Finder\Finder())
    ->files()
    ->in('src', 'tests')
    ->name('*.php')
    ->exclude('vendor');

// Return the Imbo ruleset with the updated Finder instance
return (new Imbo\CodingStandard\Config())
    ->setFinder($finder);
```

