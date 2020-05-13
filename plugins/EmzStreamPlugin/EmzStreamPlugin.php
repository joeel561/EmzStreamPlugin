<?php

namespace EmzStreamPlugin;

use Shopware\Components\Plugin;
use Shopware\Components\Plugin\Context\InstallContext;
use Shopware\Components\Plugin\Context\UninstallContext;
use Shopware\Components\Plugin\Context\UpdateContext;
use Shopware\Components\Plugin\Context\ActivateContext;
use Shopware\Bundle\AttributeBundle\Service\CrudService;
use Shopware\Bundle\AttributeBundle\Service\TypeMapping;
use Shopware\Components\Emotion\ComponentInstaller;

/**
 * Shopware-Plugin EmzStreamPlugin.
 */
class EmzStreamPlugin extends Plugin
{

    /**
     * Install-method
     *
     * @param InstallContext $context
     *
     * @return void
     */
    public function install(InstallContext $context)
    {
        $this->createOrUpdateAttributes();
        $this->createEmotionElements();

        $context->scheduleClearCache(InstallContext::CACHE_LIST_ALL);
    }

    /**
     * Unistall-method
     *
     * @param UninstallContext $context
     *
     * @return void
     */
    public function uninstall(UninstallContext $context)
    {
        $this->removeAttributes();

        $context->scheduleClearCache(UninstallContext::CACHE_LIST_ALL);
    }

    /**
     * Install-method
     *
     * @param UpdateContext $context
     *
     * @return void
     */
    public function update(UpdateContext $context)
    {
        $this->createOrUpdateAttributes();
        $this->createEmotionElements();

        $context->scheduleClearCache(UpdateContext::CACHE_LIST_ALL);
    }

    /**
     * Activate-method
     *
     * @param ActivateContext $context
     *
     * @return void
     */
    public function activate(ActivateContext $context)
    {
        $context->scheduleClearCache(ActivateContext::CACHE_LIST_ALL);
    }

    private function createEmotionElements()
    {
        $this->emotionComponentInstaller = $this->container->get('shopware.emotion_component_installer');

        $emzEmotionElement = $this->emotionComponentInstaller->createOrUpdate(
            $this->getName(),
            'EmotionElement',
            [
                'name' => 'Emotion Element',
                'template' => 'emotion_element',
                'xtype' => 'emotion-components-base',
                'cls' => 'emotion-emz-element',
                'description' => 'Emotion Element for the detail page.'
            ]
        );

        $emzEmotionElement->createTextField([
            'name' => 'emz_headline',
            'fieldLabel' => 'Headline',
            'allowBlank' => true
        ]);

        $emzEmotionElement->createMediaField([
            'name' => 'emz_image',
            'fieldLabel' => 'Background Image',
            'allowBlank' => false
        ]);
    }

        /**
     * Creates or updates attributes used in this plugin.
     *
     * @return void
     */
    private function createOrUpdateAttributes()
    {
        /** @param CrudService $crudService */
        $crudService = $this->container->get('shopware_attribute.crud_service');

        $crudService->update(
            's_articles_attributes',
            'emz_infobox_01',
            TypeMapping::TYPE_STRING,
            [
                'label' => 'Info Box 1',
                'displayInBackend' => true,
                'position' => 10,
                'custom' => false,
            ]
        );

        $crudService->update(
            's_articles_attributes',
            'emz_infobox_02',
            TypeMapping::TYPE_STRING,
            [
                'label' => 'Info Box 2',
                'displayInBackend' => true,
                'position' => 10,
                'custom' => false,
            ]
        );

        $crudService->update(
            's_articles_attributes',
            'emz_infobox_03',
            TypeMapping::TYPE_STRING,
            [
                'label' => 'Info Box 3',
                'displayInBackend' => true,
                'position' => 10,
                'custom' => false,
            ]
        );

        $crudService->update(
            's_emotion_attributes',
            'emz_css_box',
            TypeMapping::TYPE_STRING,
            [
                'label' => 'CSS Class Emotion World',
                'displayInBackend' => true,
                'position' => 10,
                'custom' => false,
            ]
        );
    }

    private function removeAttributes()
    {
        /** @param CrudService $crudService */
        $crudService = $this->container->get('shopware_attribute.crud_service');

        $crudService->delete('s_articles_attributes', 'emz_infobox_01');
        $crudService->delete('s_articles_attributes', 'emz_infobox_02');
        $crudService->delete('s_articles_attributes', 'emz_infobox_03');
        $crudService->delete('s_emotion_attributes', 'emz_css_box');
    }
}
