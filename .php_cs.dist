<?php declare(strict_types=1);
require 'vendor/autoload.php';

$finder = (new Symfony\Component\Finder\Finder())
    ->files()
    ->in('src')
    ->name('*.php')
    ->exclude('vendor');

return (new Imbo\CodingStandard\Config())
    ->setFinder($finder);
