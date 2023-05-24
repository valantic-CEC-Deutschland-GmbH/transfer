<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace ValanticSpryker\Zed\Transfer;

use Spryker\Zed\Transfer\TransferConfig as SprykerTransferConfig;

class TransferConfig extends SprykerTransferConfig
{
    public const TRANSFER_VALIDATE_MODULE_BLACKLIST = 'TRANSFER_VALIDATE_MODULE_BLACKLIST';

    /**
     * @return array<string>
     */
    public function getEntitiesSourceDirectories(): array
    {
        return [
            APPLICATION_SOURCE_DIR . '/Orm/Propel/*/Schema/',
        ];
    }

    /**
     * We use strict name validation for core internal usage and enable this by default for all
     * new projects.
     *
     * @return bool
     */
    public function isTransferNameValidated(): bool
    {
        return true;
    }

    /**
     * We use strict validation for case sensitive declaration for all new projects.
     *
     * @return bool
     */
    public function isCaseValidated(): bool
    {
        return true;
    }

    /**
     * We use strict validation for collections and singular definition for all new projects.
     *
     * @return bool
     */
    public function isSingularRequired(): bool
    {
        return false;
    }

    /**
     * @return bool
     */
    public function isTransferXmlValidationEnabled(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function getFileNameBlacklist(): array
    {
        return $this->get(self::TRANSFER_VALIDATE_MODULE_BLACKLIST, ['process.transfer.xml']);
    }
}
