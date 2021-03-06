<?php

declare(strict_types=1);

namespace Chubbyphp\DoctrineDbServiceProvider\Command\Orm;

use Doctrine\ORM\Tools\Console\Command\InfoCommand as BaseInfoCommand;

final class InfoCommand extends BaseInfoCommand
{
    use DoctrineOrmCommandTrait;
}
