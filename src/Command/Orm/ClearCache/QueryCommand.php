<?php

declare(strict_types=1);

namespace Chubbyphp\DoctrineDbServiceProvider\Command\Orm\ClearCache;

use Chubbyphp\DoctrineDbServiceProvider\Command\Orm\DoctrineOrmCommandTrait;
use Doctrine\ORM\Tools\Console\Command\ClearCache\QueryCommand as BaseQueryCommand;

final class QueryCommand extends BaseQueryCommand
{
    use DoctrineOrmCommandTrait;
}
