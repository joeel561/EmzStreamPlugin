<?php

namespace EmzStreamPlugin\Services;

interface ConfigLoggingServiceInterface
{
    /**
     * Returns an array with the plugin-config dependent on the current contexts shop.
     *
     * @return array $config
     */
    public function getPluginConfig();

    /**
     * Returns the plugin name.
     *
     * @return string $pluginName
     */
    public function getPluginName();

    /**
     * Returns the plugin directory.
     *
     * @return string $pluginDir
     */
    public function getPluginDir();

    /**
     * Logs and errors.
     *
     * @param \Exception $exeption
     */
    public function logError(\Exception $exeption);
}
