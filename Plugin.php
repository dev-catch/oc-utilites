<?php namespace AspenDigital\Utilities;

use Backend;
use System\Classes\PluginBase;

/**
 * Utilities Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name' => 'Utilities',
            'description' => 'Useful OctoberCMS Helpers',
            'author' => 'AspenDigital',
            'icon' => 'icon-wrench'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConsoleCommand('create.migration', 'AspenDigital\Utilities\Console\CreateMigration');
        $this->registerConsoleCommand('user.unlock', 'AspenDigital\Utilities\Console\UserUnlock');
        $this->registerConsoleCommand('log.clear', 'AspenDigital\Utilities\Console\ClearLog');
    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'AspenDigital\Utilities\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'aspendigital.utilities.some_permission' => [
                'tab' => 'Utilities',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'utilities' => [
                'label' => 'Utilities',
                'url' => Backend::url('aspendigital/utilities/mycontroller'),
                'icon' => 'icon-leaf',
                'permissions' => ['aspendigital.utilities.*'],
                'order' => 500,
            ],
        ];
    }
}
