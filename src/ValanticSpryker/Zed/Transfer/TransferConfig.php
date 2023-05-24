<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\Transfer;

use Spryker\Zed\Transfer\TransferConfig as SprykerTransferConfig;

class TransferConfig extends SprykerTransferConfig
{
    public const TRANSFER_VALIDATE_MODULE_BLACKLIST = 'TRANSFER_VALIDATE_MODULE_BLACKLIST';

    /**
     * @return array
     */
    public function getFileNameBlacklist(): array
    {
        return $this->get(self::TRANSFER_VALIDATE_MODULE_BLACKLIST, ['process.transfer.xml']);
    }
}
