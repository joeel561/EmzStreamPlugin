<?php

namespace EmzStreamPlugin\Services;

use Shopware\Components\Logger;
use Shopware\Components\Plugin\CachedConfigReader;
use Shopware\Components\Model\ModelManager;
use Shopware\Models\Shop\Shop;
use Shopware\Bundle\StoreFrontBundle\Service\ContextServiceInterface;

class ConfigLoggingService implements ConfigLoggingServiceInterface 
{
    /** 
     * @var string 
     */
    private $pluginName;

        /** 
     * @var string 
     */
    private $pluginDir;

    /** 
     * @var CachedConfigReader 
     */
    private $cacheConfigReader;

    /** 
     * @var ModelManager 
     */
    private $modelManager;

    /** 
     * @var ContextServiceInterface 
     */
    private $contextServiceInterface;

    /** 
     * @var logger 
     */
    private $logger;

    public function  __construct(
        string $pluginName,
        string $pluginDir,
        CachedConfigReader $cachedConfigReader,
        ModelManager $modelManager,
        ContextServiceInterface $contextService,
        Logger $logger
    ) {
        $this->pluginName = $pluginName; 
        $this->pluginDir = $pluginDir;
        $this->modelManager = $modelManager;
        $this->cachedConfigReader = $cachedConfigReader;
        $this->contextService  = $contextService;
        $this->logger = $logger;
    }

    public function getPluginConfig()
    {
        $context = $this->contextService->getShopContext();
        $shopRepo = $this->modelManager->getRepository(Shop::class);
        $shop = null;


        if (
            $context &&
            ($currentShop = $context->getShop()) &&
            ($currentShopId = $currentShop->getId())
        ) {
            $shop = $shopRepo->find($currentShopId);
        }

        if (!$shop) {
            $shop = $shopRepo->getActiveDefault();
        }

        $config = $this->cachedConfigReader->getByPluginName($this->pluginName, $shop);

        return $config;
    }

    /**
     * {@inheritDoc}
     */
    public function getPluginName()
    {
        return $this->pluginName;
    }

    /**
     * {@inheritDoc}
     */
    public function getPluginDir()
    {
        return $this->pluginDir;
    }

    /**
     * {@inheritDoc}
     */
    public function logError(\Exception $exception)
    {
        $errorMessage = "Caught Exception: " . $exception->getMessage() . "\r\n";
        $errorMessage .= "Error Source: " . $exception->getTraceAsString();

        $this->logger->error($this->pluginName . ': ' . $errorMessage);
    }

}