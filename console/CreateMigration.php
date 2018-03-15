<?php namespace AspenDigital\Utilities\Console;

use October\Rain\Scaffold\GeneratorCommand;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;
use Carbon\Carbon;

class CreateMigration extends GeneratorCommand
{
    /**
     * @var string The console command name.
     */
    protected $name = 'create:migration';

    /**
     * @var string The console command description.
     */
    protected $description = 'Creates a plugin migration file';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Migration';

    /**
     * A mapping of stub to generated file.
     *
     * @var array
     */
    protected $stubs = [
        'migration/migration.stub' => 'updates/',
    ];

    /**
     * Prepare variables for stubs.
     *
     * return @array
     */
    protected function prepareVars()
    {
        $pluginCode = $this->argument('plugin');

        $parts = explode('.', $pluginCode);
        $plugin = array_pop($parts);
        $author = array_pop($parts);

        $name = $this->argument('name');
        $pre_suf = $this->getDatePrefixSuffix();
        $filename = $pre_suf['prefix'] . $name . '.php';

        $this->stubs['migration/migration.stub'] .= $filename;

        return [
            'filename' => $filename,
            'classname' => $name,
            'suffix' => $pre_suf['suffix'],
            'author' => $author,
            'plugin' => $plugin
        ];
    }

    /**
     * Get the console command arguments.
     * @return array
     */
    protected function getArguments()
    {
        return [
            ['plugin', InputArgument::REQUIRED, 'The name of the plugin. Eg: AuthorName.PluginName'],
            ['name', InputArgument::REQUIRED, 'The name of the migration. Eg: update_users_table'],
        ];
    }

    /**
     * Get the console command options.
     * @return array
     */
    protected function getOptions()
    {
        return [];
    }

    /**
     * Get the date prefix & suffix for the migration.
     *
     * @return string
     */
    protected function getDatePrefixSuffix()
    {
        $now = Carbon::now();
        $prefix = $now->format('Y_m_d_His_');
        $suffix = str_replace('_', '', $prefix);

        return compact('prefix', 'suffix');
    }
}
