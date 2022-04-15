<?php

declare(strict_types=1);

use Ergebnis\PhpCsFixer\Config;

$header = <<<EOF
Copyright (c) 2022 Kai Sassnowski

For the full copyright and license information, please view
the LICENSE file that was distributed with this source code.

@see https://github.com/laravel-arcanist/arcanist
EOF;

$config = Config\Factory::fromRuleSet(new Config\RuleSet\Php80($header), [
    'php_unit_test_class_requires_covers' => false,
    'php_unit_internal_class' => false,
    'error_suppression' => [
        'noise_remaining_usages' => false,
    ],
    'final_class' => false,
    'final_public_method_for_abstract_class' => false,
    'protected_to_private' => false,
    'strict_comparison' => false,
    'static_lambda' => false,
]);

$config->getFinder()
    ->in([__DIR__ . '/src', __DIR__ . '/tests'])
    ->exclude('__snapshots__');
$config->setCacheFile(__DIR__ . '/.build/php-cs-fixer/.php-cs-fixer.cache');

return $config;
