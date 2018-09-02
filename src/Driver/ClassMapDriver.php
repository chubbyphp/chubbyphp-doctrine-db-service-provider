<?php

declare(strict_types=1);

namespace Chubbyphp\DoctrineDbServiceProvider\Driver;

use Doctrine\Common\Persistence\Mapping\ClassMetadata as ClassMetadataInterface;
use Doctrine\Common\Persistence\Mapping\Driver\MappingDriver;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Mapping\MappingException;

class ClassMapDriver implements MappingDriver
{
    /**
     * @var array|string[]
     */
    private $classMap;

    /**
     * @param array|string[] $classMap
     */
    public function __construct(array $classMap)
    {
        $this->classMap = $classMap;
    }

    /**
     * @param string                 $className
     * @param ClassMetadataInterface $metadata
     *
     * @throws MappingException
     */
    public function loadMetadataForClass($className, ClassMetadataInterface $metadata)
    {
        if (false === $metadata instanceof ClassMetadata) {
            throw new MappingException(
                sprintf('Metadata is of class "%s" instead of "%s"', get_class($metadata), ClassMetadata::class)
            );
        }

        if (false === isset($this->classMap[$className])) {
            throw new MappingException(
                sprintf('No configured mapping for document "%s"', $className)
            );
        }

        $mappingClassName = $this->classMap[$className];

        if (false === ($mapping = new $mappingClassName()) instanceof ClassMapMappingInterface) {
            throw new MappingException(
                sprintf('Class "%s" does not implement the "%s"', $mappingClassName, ClassMapMappingInterface::class)
            );
        }

        $mapping->configureMapping($metadata);
    }

    /**
     * @return array
     */
    public function getAllClassNames(): array
    {
        return array_keys($this->classMap);
    }

    /**
     * @param string $className
     *
     * @return bool
     */
    public function isTransient($className): bool
    {
        if (isset($this->classMap[$className])) {
            return false;
        }

        return true;
    }
}