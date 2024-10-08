<?php

declare(strict_types=1);

use PhPhD\CodingStandard\ValueObject\Set\PhdSetList;
use Rector\Config\RectorConfig;
use Rector\ValueObject\PhpVersion;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->sets([PhdSetList::rector()->getPath()]);

    $rectorConfig->paths([__DIR__.'/src', __DIR__.'/tests']);

    $rectorConfig->phpVersion(PhpVersion::PHP_80);
};
