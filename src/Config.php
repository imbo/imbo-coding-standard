<?php declare(strict_types=1);
namespace Imbo\CodingStandard;

use PhpCsFixer\Config as PhpCsConfig;

final class Config extends PhpCsConfig
{
    public function __construct()
    {
        parent::__construct('Imbo');
        $this->setRiskyAllowed(true);
    }

    public function getRules(): array
    {
        return [
            '@PSR12' => true,
            'return_type_declaration' => [
                'space_before' => 'none',
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
            'global_namespace_import' => [
                'import_classes' => true,
                'import_constants' => true,
                'import_functions' => true,
            ],
            'declare_strict_types' => true,
            'trailing_comma_in_multiline' => [
                'elements' => [
                    'arrays',
                    'arguments',
                ],
            ],
            'array_indentation' => true,
            'array_syntax' => [
                'syntax' => 'short',
            ],
            'compact_nullable_type_declaration' => true,
            'no_spaces_around_offset' => [
                'positions' => [
                    'inside',
                    'outside',
                ],
            ],
            'blank_line_after_opening_tag' => false,
            'blank_lines_before_namespace' => [
                'min_line_breaks' => 1,
                'max_line_breaks' => 1,
            ],
        ];
    }
}
