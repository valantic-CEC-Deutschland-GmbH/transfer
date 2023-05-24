<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\Transfer\Business\Transfer\Definition;

use Spryker\Zed\Transfer\Business\Transfer\Definition\TransferDefinitionFinder as SprykerTransferDefinitionFinder;
use Spryker\Zed\Transfer\Dependency\Service\TransferToUtilGlobServiceInterface;
use Spryker\Zed\Transfer\TransferConfig;

class TransferDefinitionFinder extends SprykerTransferDefinitionFinder
{
    /**
     * @param array<\ValanticSpryker\Zed\Transfer\Communication\Plugin\FilePluginInterface> $finderFilePlugins
     * @param \Spryker\Zed\Transfer\TransferConfig $transferConfig
     * @param \Spryker\Zed\Transfer\Dependency\Service\TransferToUtilGlobServiceInterface $globService
     */
    public function __construct(private array $finderFilePlugins, TransferConfig $transferConfig, TransferToUtilGlobServiceInterface $globService)
    {
        parent::__construct($transferConfig, $globService);
    }

    /**
     * @return array<\Symfony\Component\Finder\SplFileInfo>
     */
    public function getXmlTransferDefinitionFiles(): array
    {
        $files = parent::getXmlTransferDefinitionFiles();

        foreach ($this->finderFilePlugins as $finderFilePlugin) {
            $files = $finderFilePlugin->validate($files);
        }

        return $files;
    }
}
