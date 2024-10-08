<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\Whitespace\MethodChainingIndentationFixer;
use PhPhD\CodingStandard\ValueObject\Set\PhdSetList;
use Symplify\EasyCodingStandard\Config\ECSConfig;

return static function (ECSConfig $ecsConfig): void {
    $ecsConfig->sets([PhdSetList::ecs()->getPath()]);

    $ecsConfig->paths([__DIR__.'/']);
    $ecsConfig->skip([__DIR__.'/vendor']);

    $ecsConfig->skip([
        MethodChainingIndentationFixer::class => [
            __DIR__.'/src/Bundle/DependencyInjection/Configuration.php',
        ],
    ]);
};
