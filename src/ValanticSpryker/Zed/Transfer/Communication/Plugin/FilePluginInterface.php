<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\Transfer\Communication\Plugin;

interface FilePluginInterface
{
    /**
     * Specification:
     * - This plugin is executed before validation process
     *
     * @api
     *
     * @param array<\Symfony\Component\Finder\SplFileInfo> $files
     *
     * @return array
     */
    public function validate(array $files): array;
}
