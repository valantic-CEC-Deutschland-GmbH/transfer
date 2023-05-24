<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\Transfer;

use Spryker\Zed\Kernel\Container;
use Spryker\Zed\Transfer\TransferDependencyProvider as SprykerTransferDependencyProvider;
use ValanticSpryker\Zed\Transfer\Communication\Plugin\AddBlacklistFilePlugin;

class TransferDependencyProvider extends SprykerTransferDependencyProvider
{
    public const VALIDATE_FILE_PLUGINS = 'VALIDATE_FILE_PLUGINS';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $container->set(static::VALIDATE_FILE_PLUGINS, fn (Container $container) => $this->getValidateFilePlugins());

        return $container;
    }

    /**
     * @return array<\ValanticSpryker\Zed\Transfer\Communication\Plugin\FilePluginInterface>
     */
    protected function getValidateFilePlugins(): array
    {
        return [
            new AddBlacklistFilePlugin(),
        ];
    }
}
