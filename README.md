# Imbo Coding Standard
This is the [PHP_CodeSniffer](http://pear.php.net/package/PHP_CodeSniffer) coding standard used by [Imbo](https://github.com/imbo/imbo) and other related projects.

## Installation
Add the following to the `require(-dev)` part of your `composer.json` file:

    "imbo/imbo-phpcs-standard": "dev-master"

or any other [released version](https://packagist.org/packages/imbo/imbo-phpcs-standard). `dev-master` is always the latest stable release, and `dev-develop` is the latest unstable release, **use with caution**.

## Usage
Refer to the standard by using the `--standard` argument to the `phpcs` command:

    phpcs --standard=vendor/imbo/imbo-phpcs-standard/src /path/to/your/code
