<?php

namespace EmzStreamPlugin\Subscriber;

use Enlight\Event\SubscriberInterface;
use Shopware\Components\Emotion\DeviceConfiguration;
use EmzStreamPlugin\Services\ConfigLoggingServiceInterface;

class Detail implements SubscriberInterface
{
    /** 
     * @var ConfigLoggingServiceInterface 
     */
    private $configLoggingService;

    /** 
     * @var DeviceConfiguration
     */
    private $emotionDeviceConfiguration;

     /**
     * @param DeviceConfiguration $emotionDeviceConfiguration
     * @param ConfigLoggingServiceInterface $configLoggingService 
     */
    public function __construct(
      DeviceConfiguration $emotionDeviceConfiguration,
      ConfigLoggingServiceInterface $configLoggingService
    ) {
        $this->emotionDeviceConfiguration = $emotionDeviceConfiguration;
        $this->configLoggingService = $configLoggingService;
    }

    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Action_PostDispatchSecure_Frontend_Detail' => 'onDetailPostDispatch'
        ];
    }


    public function onDetailPostDispatch(\Enlight_Event_EventArgs $args)
    {
        $this->addEmotion($args);
    }

    private function addEmotion(\Enlight_Event_EventArgs $args)
    {   
        $controller = $args->getSubject();

        $view = $controller->View();

        $config = $this->configLoggingService->getPluginConfig();

        if (!$config['EmotionWorldElement']) {
            return;
        }

        $detailEmotion = $this->emotionDeviceConfiguration->getById($config['EmotionWorldElement']);

        if (!$detailEmotion) {
            return;
        }

        $view->assign('detailEmotion', $detailEmotion);
    }

}