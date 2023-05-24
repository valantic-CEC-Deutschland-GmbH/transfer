<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\Transfer\Business;

use Psr\Log\LoggerInterface;
use Spryker\Zed\Transfer\Business\Model\TransferValidatorInterface;
use Spryker\Zed\Transfer\Business\TransferBusinessFactory as SprykerTransferBusinessFactory;
use ValanticSpryker\Zed\Transfer\Business\Generator\FinderFilteredInterface;
use ValanticSpryker\Zed\Transfer\Business\Model\TransferValidator;
use ValanticSpryker\Zed\Transfer\Business\Transfer\Definition\TransferDefinitionFinder;
use ValanticSpryker\Zed\Transfer\TransferDependencyProvider;

/**
 * @method \Spryker\Zed\Transfer\TransferConfig getConfig()
 */
class TransferBusinessFactory extends SprykerTransferBusinessFactory
{
    /**
     * @param \Psr\Log\LoggerInterface $messenger
     *
     * @return \Spryker\Zed\Transfer\Business\Model\TransferValidatorInterface
     */
    public function createValidator(LoggerInterface $messenger): TransferValidatorInterface
    {
        return new TransferValidator(
            $messenger,
            $this->createFinder(),
            $this->getConfig(),
            $this->createXmlValidator(),
        );
    }

    /**
     * @return \ValanticSpryker\Zed\Transfer\Business\Generator\FinderFilteredInterface
     */
    protected function createFinder(): FinderFilteredInterface
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
