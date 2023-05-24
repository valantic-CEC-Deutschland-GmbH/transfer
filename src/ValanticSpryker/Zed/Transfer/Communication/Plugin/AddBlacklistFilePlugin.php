<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\Transfer\Communication\Plugin;

use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \ValanticSpryker\Zed\Transfer\TransferConfig getConfig()
 *
 * phpcs:ignoreFile
 */
class AddBlacklistFilePlugin extends AbstractPlugin implements FilePluginInterface
{
    /**
     * @param array<\Symfony\Component\Finder\SplFileInfo> $files
     *
     * @return array
     */
    public function validate(array $files): array
    {
        foreach ($files as $filekey => $file) {
            if (in_array($file->getRelativePathname(), $this->getConfig()->getFileNameBlacklist())) {
                unset($files[$filekey]);
            }
        }

        return $files;
    }
}
