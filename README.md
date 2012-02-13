Imbo Coding Standard
====================

This is the coding standard used with [PHP_CodeSniffer](http://pear.php.net/package/PHP_CodeSniffer) by [Imbo](https://github.com/christeredvartsen/imbo) and [ImboClient](https://github.com/christeredvartsen/imboclient-php) (as well as most of my other OSS projects). Installable via [PEAR](http://pear.php.net), and referenced using `--standard=Imbo` when executing `phpcs`.

Installation
------------
The coding standard is installed using `pear`:

```
sudo pear config-set audo_discover 1
sudo pear install --alldeps pear.starzinger.net/ImboStandard
```

Usage
-----
After installing `PHP_CodeSniffer` and `ImboStandard` you can check your code against the standard by running the following command:

```
phpcs --standard=Imbo /path/to/your/code
```
