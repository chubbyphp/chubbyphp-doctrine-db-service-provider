<?php

declare(strict_types=1);

namespace Chubbyphp\Tests\DoctrineDbServiceProvider\Unit\Command\Orm;

use Chubbyphp\DoctrineDbServiceProvider\Command\Orm\ValidateSchemaCommand;
use Chubbyphp\Mock\MockByCallsTrait;
use Doctrine\ORM\Tools\Console\Command\ValidateSchemaCommand as BaseValidateSchemaCommand;
use Doctrine\Persistence\ManagerRegistry;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Chubbyphp\DoctrineDbServiceProvider\Command\Orm\ValidateSchemaCommand
 *
 * @internal
 */
final class ValidateSchemaCommandTest extends TestCase
{
    use MockByCallsTrait;

    public function testInstanceOf(): void
    {
        /** @var ManagerRegistry $managerRegistry */
        $managerRegistry = $this->getMockByCalls(ManagerRegistry::class);

        self::assertInstanceOf(BaseValidateSchemaCommand::class, new ValidateSchemaCommand($managerRegistry));
    }
}
