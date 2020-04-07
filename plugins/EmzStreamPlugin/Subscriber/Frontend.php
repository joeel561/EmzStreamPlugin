<?php

namespace EmzStreamPlugin\Subscriber;

use Enlight\Event\SubscriberInterface;

class Frontend implements SubscriberInterface
{
    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            'Theme_Inheritance_Template_Directories_Collected' => 'onTemplateDirectoriesCollect'
        ];
    }

    /**
     * Listener-method for Theme_Inheritance_Template_Directories_Collected
     *
     * @param Enlight_Event_EventArgs $args
     * @return void
     */
    public function onTemplateDirectoriesCollect(\Enlight_Event_EventArgs $args)
    {
        $dirs   = $args->getReturn();
        $dirs[] = $this->pluginDirectory . '/Resources/views';

        $args->setReturn($dirs);
    }
}
