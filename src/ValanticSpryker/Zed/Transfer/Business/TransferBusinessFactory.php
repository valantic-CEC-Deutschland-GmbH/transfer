<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\Transfer\Business;

use Spryker\Zed\Transfer\Business\Model\Generator\FinderInterface;
use Spryker\Zed\Transfer\Business\TransferBusinessFactory as SprykerTransferBusinessFactory;
use ValanticSpryker\Zed\Transfer\Business\Transfer\Definition\TransferDefinitionFinder;
use ValanticSpryker\Zed\Transfer\TransferDependencyProvider;

/**
 * @method \Spryker\Zed\Transfer\TransferConfig getConfig()
 */
class TransferBusinessFactory extends SprykerTransferBusinessFactory
{
    /**
     * @return \Spryker\Zed\Transfer\Business\Model\Generator\FinderInterface
     */
    protected function createFinder(): FinderInterface
    {
        return new TransferDefinitionFinder(
            $this->getFilePlugins(),
            $this->getConfig(),
            $this->getUtilGlobService(),
        );
    }

    /**
     * @return array
     */
    private function getFilePlugins(): array
    {
        return $this->getProvidedDependency(TransferDependencyProvider::VALIDATE_FILE_PLUGINS);
    }
}
