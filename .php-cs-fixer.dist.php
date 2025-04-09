<?php declare(strict_types=1);
require 'vendor/autoload.php';

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__)
    ->append([__FILE__]);

return (new Imbo\CodingStandard\Config())
    ->setFinder($finder);
