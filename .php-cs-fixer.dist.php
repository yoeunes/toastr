<?php

/*
 * This file is part of the PHPFlasher package.
 * (c) Younes KHOUBZA <younes.khoubza@gmail.com>
 */

if (!file_exists(__DIR__.'/src')) {
    exit(0);
}

$header = <<<'EOF'
This file is part of the yoeunes/toastr package.
(c) Younes KHOUBZA <younes.khoubza@gmail.com>
EOF;

$rules = array(
    '@PSR12' => true,
    '@PSR12:risky' => true,
    '@Symfony' => true,
    '@Symfony:risky' => true,
    '@PhpCsFixer' => true,
    '@PhpCsFixer:risky' => true,
    'header_comment' => array('header' => $header),
    'array_syntax' => array('syntax' => 'long'),
    'ordered_imports' => array(
        'sort_algorithm' => 'alpha',
        'imports_order' => array('const', 'class', 'function'),
    ),
    'no_extra_blank_lines' => array(
        'tokens' => array('case', 'continue', 'curly_brace_block', 'default', 'extra', 'parenthesis_brace_block', 'square_brace_block', 'switch', 'throw'),
    ),
    'function_to_constant' => false,
    'visibility_required' => array('elements' => array('property', 'method')),
    'self_accessor' => false,
    'single_trait_insert_per_statement' => true,
    'linebreak_after_opening_tag' => true,
    'no_php4_constructor' => true,
    'no_unreachable_default_argument_value' => true,
    'no_useless_else' => true,
    'no_useless_return' => true,
    'phpdoc_order' => true,
    'strict_comparison' => true,
    'strict_param' => true,
    'phpdoc_line_span' => true,
    'php_unit_internal_class' => false,
    'php_unit_test_class_requires_covers' => false,
    'multiline_whitespace_before_semicolons' => false,
    'method_chaining_indentation' => false,
    'phpdoc_no_empty_return' => false,
    'phpdoc_types_order' => array('null_adjustment' => 'always_last'),
    'php_unit_test_case_static_method_calls' => array('call_type' => 'this'),
    'php_unit_strict' => false,
    'native_constant_invocation' => array('scope' => 'namespaced'),
    'phpdoc_return_self_reference' => true,
);

$finder = new PhpCsFixer\Finder();
$finder->in(__DIR__)->exclude(__DIR__.'/vendor');

$config = new PhpCsFixer\Config();

return $config->setFinder($finder)
    ->setUsingCache(false)
    ->setRiskyAllowed(true)
    ->setRules($rules);
