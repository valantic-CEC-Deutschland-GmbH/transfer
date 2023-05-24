<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\Transfer\Business\Generator;

use Spryker\Zed\Transfer\Business\Model\Generator\FinderInterface as SprykerFinderInterface;

interface FinderFilteredInterface extends SprykerFinderInterface
{
    /**
     * @return array<\Symfony\Component\Finder\SplFileInfo>
     */
    public function getXmlFilteredTransferDefinitionFiles(): array;
}
