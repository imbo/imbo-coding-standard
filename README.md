Imbo Coding Standard
====================

This is the coding standard used with [PHP_CodeSniffer](http://pear.php.net/package/PHP_CodeSniffer) by [Imbo](https://github.com/imbo/imbo), [ImboClient](https://github.com/imbo/imboclient-php) and all other Imbo-related projects (as well as most of my other OSS projects). Installable via [PEAR](http://pear.php.net), and referenced using `--standard=Imbo` when executing `phpcs`.

Installation
------------
The coding standard is installed using `pear`:

```
sudo pear config-set auto_discover 1
sudo pear install --alldeps pear.starzinger.net/ImboStandard
```

Usage
-----
After installing `PHP_CodeSniffer` and `ImboStandard` you can check your code against the standard by running the following command:

```
phpcs --standard=Imbo /path/to/your/code
```
