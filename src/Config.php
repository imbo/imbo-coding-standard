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
            ->setRiskyAllowed(true);
    }

    public function getRules(): array
    {
        return [
            // Inherit all rules from PSR12
            '@PSR12' => true,

            // Override / add own rules
            'array_indentation' => true,
            'array_syntax' => [
                'syntax' => 'short',
            ],
            'blank_line_after_opening_tag' => false,
            'blank_lines_before_namespace' => [
                'min_line_breaks' => 1,
                'max_line_breaks' => 1,
            ],
            'compact_nullable_type_declaration' => true,
            'declare_strict_types' => true,
            'global_namespace_import' => [
                'import_classes' => true,
                'import_constants' => true,
                'import_functions' => true,
            ],
            'heredoc_indentation' => [
                'indentation' => 'start_plus_one',
            ],
            'no_extra_blank_lines' => [
                'tokens' => ['extra'],
            ],
            'no_spaces_around_offset' => [
                'positions' => [
                    'inside',
                    'outside',
                ],
            ],
            'no_unused_imports' => true,
            'ordered_imports' => [
                'sort_algorithm' => 'alpha',
                'imports_order' => [
                    'const',
                    'class',
                    'function',
                ],
            ],
            'return_type_declaration' => [
                'space_before' => 'none',
            ],
            'trailing_comma_in_multiline' => [
                'elements' => [
                    'arrays',
                    'arguments',
                ],
            ],

            // Custom fixer rules
            DeclareAfterOpeningTagFixer::name() => true,
        ];
    }
}
