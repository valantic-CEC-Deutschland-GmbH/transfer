<?php

declare(strict_types = 1);

namespace ValanticSpryker\Zed\Transfer\Business\Model;

use Laminas\Config\Factory;
use Psr\Log\LoggerInterface;
use Spryker\Zed\Transfer\Business\Model\TransferValidator as SprykerTransferValidator;
use Spryker\Zed\Transfer\Business\XmlValidator\XmlValidatorInterface;
use Spryker\Zed\Transfer\TransferConfig;
use ValanticSpryker\Zed\Transfer\Business\Generator\FinderFilteredInterface;

class TransferValidator extends SprykerTransferValidator
{
    /**
     * @var \ValanticSpryker\Zed\Transfer\Business\Generator\FinderFilteredInterface
     */
    protected $finder;

    /**
     * @param \Psr\Log\LoggerInterface $messenger
     * @param \ValanticSpryker\Zed\Transfer\Business\Generator\FinderFilteredInterface $finder
     * @param \Spryker\Zed\Transfer\TransferConfig $transferConfig
     * @param \Spryker\Zed\Transfer\Business\XmlValidator\XmlValidatorInterface $xmlValidator
     */
    public function __construct(LoggerInterface $messenger, FinderFilteredInterface $finder, TransferConfig $transferConfig, XmlValidatorInterface $xmlValidator)
    {
        parent::__construct($messenger, $finder, $transferConfig, $xmlValidator);
    }

    /**
     * @param array $options
     *
     * @return bool
     */
    public function validate(array $options): bool
    {
        $files = $this->finder->getXmlFilteredTransferDefinitionFiles();

        $result = true;
        foreach ($files as $key => $file) {
            if ($this->transferConfig->isTransferXmlValidationEnabled()) {
                $result &= $this->validateXml($file);
            }

            if ($options['bundle'] && strpos($file, '/Shared/' . $options['bundle'] . '/Transfer/') === false) {
                continue;
            }

            /** @var \Laminas\Config\Config $configObject */
            $configObject = Factory::fromFile($file->getPathname(), true);
            $definition = $configObject->toArray();
            $definition = $this->normalize($definition);

            $module = $this->getModuleFromPathName($file->getFilename());

            if ($options['verbose']) {
                $this->messenger->info(sprintf('Checking %s module (%s)', $module, $file->getFilename()));
            }

            $result &= $this->validateDefinition($module, $definition, $options);
        }

        return (bool)$result;
    }
}
