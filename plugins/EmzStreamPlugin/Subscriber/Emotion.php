<?php

namespace EmzStreamPlugin\Subscriber;

use Enlight\Event\SubscriberInterface;
use Enlight_Controller_ActionEventArgs;


class Emotion implements SubscriberInterface 
{
    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Action_PostDispatchSecure_Widgets_Emotion' => 'extendsEmotionTemplates'
        ];
    }

    public function extendsEmotionTemplates(\Enlight_Event_EventArgs $args)
    {
        /** @var \Enlight_Controller_Action $controller */
        $controller = $args->getSubject();
        $view = $controller->View();

        $view->addTemplateDir(__DIR__ . '/../Resources/views/emotion_components/');
    }
}