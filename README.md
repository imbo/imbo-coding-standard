# Imbo Coding Standard

This is the PHP coding standard for the Imbo project and all related tools. The ruleset is enforced using the [PHP Coding Standards Fixer
](https://github.com/PHP-CS-Fixer/PHP-CS-Fixer) tool.

## How to setup

First, add this package and [php-cs-fixer](https://github.com/PHP-CS-Fixer/PHP-CS-Fixer) as development dependencies:

    composer require --dev imbo/imbo-coding-standard ^2.0 friendsofphp/php-cs-fixer

then, create a configuration file named `.php-cs-fixer.php` local to your repository that includes the following:

```php
<?php declare(strict_types=1);
require 'vendor/autoload.php';

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
    ->append([__FILE__]);

return (new Imbo\CodingStandard\Config())
    ->setFinder($finder);
```

Adjust the paths if necessary. Now you can run the following command to check the coding standard in your project:

    vendor/bin/php-cs-fixer check --diff

## Add step in the GitHub workflow

All Imbo-related projects use GitHub workflows, and checking the coding standard should be a part of that workflow:

```yaml
name: CI
on: push
jobs:
  php-cs-fixer:
    runs-on: ubuntu-latest
    name: Check coding standard
    steps:
      - uses: actions/checkout@v6
      - uses: shivammathur/setup-php@v2
      - run: composer install
      - run: vendor/bin/php-cs-fixer check --diff
```

## Add scripts for Composer

All Imbo-related projects use [Composer](https://getcomposer.org), and checking / fixing coding standard violations should be done using Composer scripts in `composer.json`:

```json
{
  "scripts": {
    "cs": "vendor/bin/php-cs-fixer check --diff",
    "cs:fix": "vendor/bin/php-cs-fixer fix --diff"
  }
}
```

## License

MIT, see [LICENSE](LICENSE).
