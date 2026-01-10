<?php declare(strict_types=1);

namespace Imbo\CodingStandard;

use PhpCsFixer\Config as PhpCsConfig;
use PhpCsFixerCustomFixers\Fixer\DeclareAfterOpeningTagFixer;
use PhpCsFixerCustomFixers\Fixers;

final class Config extends PhpCsConfig
{
    public function __construct()
    {
        parent::__construct('Imbo');
        $this
            ->registerCustomFixers(new Fixers())
            ->setRiskyAllowed(true)
            ->setRules([
                // Inherit rules from Symfony
                '@Symfony' => true,
                '@Symfony:risky' => true,

                // Override select Symfony rules
                'global_namespace_import' => [
                    'import_classes' => true,
                    'import_constants' => true,
                    'import_functions' => true,
                ],
                'trailing_comma_in_multiline' => [
                    'after_heredoc' => true,
                    'elements' => [
                        'arguments',
                        'array_destructuring',
                        'arrays',
                        'match',
                        'parameters',
                    ],
                ],

                // Own / custom rules
                'phpdoc_to_comment' => false,
                'declare_strict_types' => true,
                'heredoc_indentation' => [
                    'indentation' => 'same_as_start',
                ],
                DeclareAfterOpeningTagFixer::name() => true,
            ]);
    }
}
