<?php declare(strict_types=1);

namespace Symplify\PHP7_CodeSniffer\DI;

use Nette\Configurator;
use Nette\DI\Container;
use Nette\Utils\FileSystem;

final class ContainerFactory
{
    public function create() : Container
    {
        $configurator = new Configurator();
        $configurator->setDebugMode(true);
        $configurator->setTempDirectory(self::createAndReturnTempDir());
        $configurator->addConfig(__DIR__ . '/../config/config.neon');

        return $configurator->createContainer();
    }

    public static function createAndReturnTempDir() : string
    {
        $tempDir = sys_get_temp_dir() . '/php7_codesniffer';
        FileSystem::createDir($tempDir);

        return $tempDir;
    }
}
