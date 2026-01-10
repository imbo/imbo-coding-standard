<?php declare(strict_types=1);
require 'vendor/autoload.php';

$finder = new PhpCsFixer\Finder();

return (new Imbo\CodingStandard\Config())
    ->setParallelConfig(PhpCsFixer\Runner\Parallel\ParallelConfigFactory::detect())
    ->setFinder($finder->in(__DIR__)->append([__FILE__]));
